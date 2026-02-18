<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

/**
 * ContractController
 * ───────────────────
 * Full CRUD + expiring / draft views.
 * All routes protected by 'auth' middleware (see routes/web.php).
 */
class ContractController extends Controller
{
    // ── Index ───────────────────────────────────────────────────────────

    public function index(Request $request): View
    {
        $contracts = Contract::forUser(auth()->id())
            ->search($request->search)
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->type,   fn($q) => $q->where('type',   $request->type))
            ->orderByDesc('updated_at')
            ->paginate(20);

        return view('pages.contracts.index', compact('contracts'));
    }

    // ── Expiring soon ───────────────────────────────────────────────────

    public function expiring(): View
    {
        $contracts = Contract::forUser(auth()->id())
            ->expiringSoon(90)
            ->orderBy('end_date')
            ->get();

        return view('pages.contracts.expiring', compact('contracts'));
    }

    // ── Drafts ──────────────────────────────────────────────────────────

    public function drafts(): View
    {
        $contracts = Contract::forUser(auth()->id())
            ->draft()
            ->orderByDesc('updated_at')
            ->paginate(20);

        return view('pages.contracts.drafts', compact('contracts'));
    }

    // ── Create ──────────────────────────────────────────────────────────

    public function create(): View
    {
        return view('pages.contracts.create');
    }

    // ── Store ───────────────────────────────────────────────────────────

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateContract($request);

        // Handle file upload
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('contracts/' . auth()->id(), 'private');
        }

        $data['user_id'] = auth()->id();

        $contract = Contract::create($data);

        return redirect()->route('contracts.show', $contract)
            ->with('success', 'Contract "' . $contract->title . '" created successfully.');
    }

    // ── Show ────────────────────────────────────────────────────────────

    public function show(Contract $contract): View
    {
        $this->authorise($contract);
        return view('pages.contracts.show', compact('contract'));
    }

    // ── Edit ────────────────────────────────────────────────────────────

    public function edit(Contract $contract): View
    {
        $this->authorise($contract);
        return view('pages.contracts.edit', compact('contract'));
    }

    // ── Update ──────────────────────────────────────────────────────────

    public function update(Request $request, Contract $contract): RedirectResponse
    {
        $this->authorise($contract);

        $data = $this->validateContract($request);

        if ($request->hasFile('file')) {
            // Delete old file
            if ($contract->file_path) {
                Storage::disk('private')->delete($contract->file_path);
            }
            $data['file_path'] = $request->file('file')->store('contracts/' . auth()->id(), 'private');
        }

        $contract->update($data);

        return redirect()->route('contracts.show', $contract)
            ->with('success', 'Contract updated.');
    }

    // ── Destroy ─────────────────────────────────────────────────────────

    public function destroy(Contract $contract): RedirectResponse
    {
        $this->authorise($contract);

        if ($contract->file_path) {
            Storage::disk('private')->delete($contract->file_path);
        }

        $contract->delete();

        return redirect()->route('contracts.index')
            ->with('success', 'Contract deleted.');
    }

    // ── Private helpers ─────────────────────────────────────────────────

    private function validateContract(Request $request): array
    {
        return $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'counterparty'  => ['nullable', 'string', 'max:255'],
            'description'   => ['nullable', 'string', 'max:5000'],
            'type'          => ['nullable', 'string', 'max:100'],
            'status'        => ['required', 'in:draft,pending,active,expiring,expired'],
            'value'         => ['nullable', 'numeric', 'min:0'],
            'currency'      => ['nullable', 'string', 'size:3'],
            'start_date'    => ['nullable', 'date'],
            'end_date'      => ['nullable', 'date', 'after_or_equal:start_date'],
            'reminder_days' => ['nullable', 'integer', 'min:1', 'max:365'],
            'file'          => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:20480'],
        ]);
    }

    /** Ensures the current user owns the contract. */
    private function authorise(Contract $contract): void
    {
        abort_if($contract->user_id !== auth()->id(), 403, 'Forbidden');
    }
}

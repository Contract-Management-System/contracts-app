<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        $stats = [
            'active'   => Contract::forUser($userId)->where('status', 'active')->count(),
            'expiring' => Contract::forUser($userId)->expiringSoon(30)->count(),
            'expired'  => Contract::forUser($userId)->where('status', 'expired')->count(),
            'draft'    => Contract::forUser($userId)->draft()->count(),
        ];

        $recentContracts = Contract::forUser($userId)
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get();

        $expiringSoon = Contract::forUser($userId)
            ->expiringSoon(30)
            ->orderBy('end_date')
            ->limit(5)
            ->get();

        $expiringSoonCount = Contract::forUser($userId)->expiringSoon(30)->count();

        return view('pages.dashboard.index', compact(
            'stats', 'recentContracts', 'expiringSoon', 'expiringSoonCount'
        ));
    }
}

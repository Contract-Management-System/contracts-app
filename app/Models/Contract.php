<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;

    // ── Contract types —— add/remove as needed ─────────────────────────
    const TYPES = [
        'Client Agreement',
        'Vendor / Supplier',
        'Employment',
        'NDA',
        'SaaS / Subscription',
        'Partnership',
        'Lease / Property',
        'Consulting',
        'Service Agreement',
        'Other',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'counterparty',
        'description',
        'type',
        'status',       // draft | pending | active | expiring | expired
        'value',
        'currency',
        'start_date',
        'end_date',
        'reminder_days',
        'file_path',
    ];

    protected function casts(): array
    {
        return [
            'start_date'    => 'date',
            'end_date'      => 'date',
            'value'         => 'decimal:2',
            'reminder_days' => 'integer',
        ];
    }

    // ── Relationships ───────────────────────────────────────────────────

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ── Scopes ──────────────────────────────────────────────────────────

    public function scopeForUser(Builder $q, int $userId): void
    {
        $q->where('user_id', $userId);
    }

    public function scopeActive(Builder $q): void
    {
        $q->where('status', 'active');
    }

    public function scopeDraft(Builder $q): void
    {
        $q->where('status', 'draft');
    }

    public function scopeExpired(Builder $q): void
    {
        $q->where('status', 'expired')
          ->orWhere(fn($q) => $q->whereNotNull('end_date')->where('end_date', '<', now()));
    }

    /**
     * Contracts expiring within $days days.
     */
    public function scopeExpiringSoon(Builder $q, int $days = 90): void
    {
        $q->whereNotNull('end_date')
          ->where('end_date', '>', now())
          ->where('end_date', '<=', now()->addDays($days))
          ->where('status', '!=', 'expired')
          ->where('status', '!=', 'draft');
    }

    public function scopeSearch(Builder $q, ?string $term): void
    {
        if ($term) {
            $q->where(fn($q) =>
                $q->where('title', 'ilike', "%{$term}%")
                  ->orWhere('counterparty', 'ilike', "%{$term}%")
                  ->orWhere('description', 'ilike', "%{$term}%")
            );
        }
    }

    // ── Helper methods ──────────────────────────────────────────────────

    public function isExpiringSoon(int $days = 90): bool
    {
        return $this->end_date
            && $this->end_date->isFuture()
            && $this->end_date->diffInDays(now()) <= $days;
    }

    public function isExpired(): bool
    {
        return $this->status === 'expired'
            || ($this->end_date && $this->end_date->isPast());
    }

    /**
     * Auto-compute status based on dates.
     * Call before saving if you want dynamic status.
     */
    public function computeStatus(): string
    {
        if ($this->status === 'draft' || $this->status === 'pending') {
            return $this->status;
        }
        if ($this->end_date && $this->end_date->isPast()) {
            return 'expired';
        }
        if ($this->isExpiringSoon(30)) {
            return 'expiring';
        }
        return 'active';
    }
}

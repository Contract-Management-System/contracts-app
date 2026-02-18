<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Demo user ──────────────────────────────────────────────────
        $user = User::firstOrCreate(
            ['email' => 'demo@contractvault.com'],
            [
                'name'     => 'Alex Mensah',
                'password' => Hash::make('password'),
            ]
        );

        // ── Sample contracts ───────────────────────────────────────────
        $contracts = [
            [
                'title'         => 'AWS Enterprise Agreement',
                'counterparty'  => 'Amazon Web Services',
                'type'          => 'SaaS / Subscription',
                'status'        => 'active',
                'value'         => 48000.00,
                'currency'      => 'USD',
                'start_date'    => now()->subMonths(6),
                'end_date'      => now()->addMonths(6),
                'reminder_days' => 30,
                'description'   => 'Annual cloud infrastructure contract covering EC2, S3, and RDS.',
            ],
            [
                'title'         => 'Office Lease — Main HQ',
                'counterparty'  => 'Pinnacle Properties Ltd',
                'type'          => 'Lease / Property',
                'status'        => 'active',
                'value'         => 120000.00,
                'currency'      => 'USD',
                'start_date'    => now()->subYear(),
                'end_date'      => now()->addYear(),
                'reminder_days' => 90,
            ],
            [
                'title'         => 'NDA — Potential Acquisition',
                'counterparty'  => 'Redacted Corp',
                'type'          => 'NDA',
                'status'        => 'active',
                'value'         => null,
                'start_date'    => now()->subMonths(3),
                'end_date'      => now()->addDays(20),   // expiring soon!
                'reminder_days' => 30,
            ],
            [
                'title'         => 'Freelance Design Services',
                'counterparty'  => 'Studio Nomad',
                'type'          => 'Consulting',
                'status'        => 'active',
                'value'         => 8500.00,
                'currency'      => 'USD',
                'start_date'    => now()->subMonth(),
                'end_date'      => now()->addDays(10),   // expiring soon!
                'reminder_days' => 14,
            ],
            [
                'title'         => 'Salesforce CRM Subscription',
                'counterparty'  => 'Salesforce Inc',
                'type'          => 'SaaS / Subscription',
                'status'        => 'expired',
                'value'         => 18000.00,
                'currency'      => 'USD',
                'start_date'    => now()->subYears(2),
                'end_date'      => now()->subMonths(2),
                'reminder_days' => 30,
            ],
            [
                'title'         => 'Senior Developer Employment Contract',
                'counterparty'  => 'Kwame Asante',
                'type'          => 'Employment',
                'status'        => 'active',
                'value'         => 95000.00,
                'currency'      => 'USD',
                'start_date'    => now()->subMonths(8),
                'end_date'      => null,   // ongoing
                'reminder_days' => 30,
            ],
            [
                'title'         => 'Partnership MOU — TechBridge Africa',
                'counterparty'  => 'TechBridge Africa Ltd',
                'type'          => 'Partnership',
                'status'        => 'draft',
                'value'         => null,
                'start_date'    => null,
                'end_date'      => null,
                'reminder_days' => 30,
                'description'   => 'Memorandum of understanding for joint go-to-market activities. Awaiting legal review.',
            ],
            [
                'title'         => 'Website Maintenance SLA',
                'counterparty'  => 'DevOps Heroes',
                'type'          => 'Service Agreement',
                'status'        => 'pending',
                'value'         => 2400.00,
                'currency'      => 'USD',
                'start_date'    => now()->addWeek(),
                'end_date'      => now()->addYear(),
                'reminder_days' => 60,
            ],
        ];

        foreach ($contracts as $data) {
            Contract::firstOrCreate(
                ['user_id' => $user->id, 'title' => $data['title']],
                array_merge($data, ['user_id' => $user->id])
            );
        }

        $this->command->info('✅ ContractVault seeded.');
        $this->command->line('   Login: demo@contractvault.com / password');
    }
}

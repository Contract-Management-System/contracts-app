{{-- pages/home/sections/how-it-works.blade.php --}}

@php
$steps = [
    ['n' => '01', 'title' => 'Upload or create',    'desc' => 'Add contracts manually or upload PDF/DOCX files directly.'],
    ['n' => '02', 'title' => 'Set key dates',        'desc' => 'Enter start date, end date, and renewal window. We track the rest.'],
    ['n' => '03', 'title' => 'Get alerted on time',  'desc' => 'Receive timely reminders so you always renew, renegotiate, or end on your terms.'],
];
@endphp

<section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-6xl mx-auto">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-ink-500 mb-3">How it works</p>
                <h2 class="text-3xl sm:text-4xl font-display font-semibold text-slate-900 mb-12 leading-snug">
                    From upload to<br>renewal — handled.
                </h2>

                <div class="space-y-8">
                    @foreach ($steps as $step)
                    <div class="flex gap-5">
                        <div class="flex-none w-10 h-10 rounded-xl bg-ink-900 text-white flex items-center justify-center font-mono text-xs font-semibold">
                            {{ $step['n'] }}
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-1">{{ $step['title'] }}</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Stats panel --}}
            <div class="grid grid-cols-2 gap-4">
                @foreach([
                    ['$2.4M',   'Average value of contracts missed each year per company without tracking'],
                    ['94%',     'Of teams report catching renewals earlier after adopting a contract tool'],
                    ['< 5 min', 'Average time to add and categorise a new contract'],
                    ['30–90 days', 'Configurable reminder lead time so you\'re always ahead'],
                ] as $stat)
                <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                    <p class="text-2xl font-display font-semibold text-ink-800 mb-2">{{ $stat[0] }}</p>
                    <p class="text-xs text-slate-500 leading-snug">{{ $stat[1] }}</p>
                </div>
                @endforeach
            </div>

        </div>

    </div>
</section>

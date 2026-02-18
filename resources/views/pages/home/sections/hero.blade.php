{{-- pages/home/sections/hero.blade.php --}}

<section class="relative overflow-hidden bg-white pt-24 pb-32 px-4 sm:px-6 lg:px-8">

    {{-- Subtle grid background --}}
    <div class="absolute inset-0 -z-10"
         style="background-image: linear-gradient(to right, #f1f5f9 1px, transparent 1px), linear-gradient(to bottom, #f1f5f9 1px, transparent 1px); background-size: 40px 40px; mask-image: radial-gradient(ellipse 80% 70% at 50% 0%, black 40%, transparent 100%);"></div>

    <div class="max-w-6xl mx-auto">
        <div class="max-w-3xl">

            {{-- Eyebrow --}}
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-ink-50 border border-ink-100 text-ink-700 text-xs font-semibold mb-6 animate-fade-in">
                <span class="w-1.5 h-1.5 rounded-full bg-ink-500"></span>
                Contract lifecycle management
            </div>

            {{-- Headline --}}
            <h1 class="text-5xl sm:text-6xl font-display font-semibold text-slate-900 leading-tight mb-6 animate-fade-up">
                Every contract,<br>
                <span class="text-ink-gradient italic">always in view.</span>
            </h1>

            <p class="text-lg text-slate-500 leading-relaxed mb-10 max-w-xl animate-fade-up delay-100">
                ContractVault centralises your contracts, tracks renewal dates, and alerts your team before anything slips through the cracks.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 animate-fade-up delay-200">
                <a href="{{ route('register') }}" class="btn-primary btn-lg">
                    Start for free
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('login') }}" class="btn-secondary btn-lg">Sign in</a>
            </div>

            {{-- Trust signals --}}
            <div class="flex flex-wrap gap-6 mt-14 animate-fade-up delay-300">
                @foreach([
                    ['icon' => '🔒', 'text' => 'SOC2 compliant'],
                    ['icon' => '⚡', 'text' => 'Set up in 5 min'],
                    ['icon' => '🔔', 'text' => 'Auto reminders'],
                ] as $item)
                <div class="flex items-center gap-2 text-sm text-slate-400">
                    <span>{{ $item['icon'] }}</span>
                    <span>{{ $item['text'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Dashboard preview --}}
        <div class="mt-16 animate-fade-up delay-400">
            <div class="relative rounded-2xl border border-slate-200 shadow-panel overflow-hidden bg-white">
                {{-- Fake browser chrome --}}
                <div class="bg-slate-100 border-b border-slate-200 px-4 py-2.5 flex items-center gap-2">
                    <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-amber-400"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-green-400"></div>
                    <div class="flex-1 mx-4">
                        <div class="bg-white rounded border border-slate-200 px-3 py-1 text-xs text-slate-400 max-w-xs mx-auto text-center">
                            app.contractvault.com/dashboard
                        </div>
                    </div>
                </div>

                {{-- Mini dashboard mockup --}}
                <div class="p-6 bg-slate-50 flex gap-4 min-h-[280px]">
                    {{-- Sidebar mockup --}}
                    <div class="w-44 bg-white rounded-xl border border-slate-200 p-3 shrink-0 hidden sm:block">
                        <div class="h-5 w-28 bg-slate-100 rounded mb-4"></div>
                        @foreach([true, false, false, false] as $active)
                        <div class="flex items-center gap-2 mb-2 px-2 py-1.5 rounded-lg {{ $active ? 'bg-ink-50' : '' }}">
                            <div class="w-3.5 h-3.5 bg-{{ $active ? 'ink-200' : 'slate-100' }} rounded shrink-0"></div>
                            <div class="h-2.5 w-16 bg-{{ $active ? 'ink-100' : 'slate-100' }} rounded"></div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Main content mockup --}}
                    <div class="flex-1 space-y-4">
                        {{-- Stat cards --}}
                        <div class="grid grid-cols-3 gap-3">
                            @foreach(['ink-50','green-50','amber-50'] as $bg)
                            <div class="bg-{{ $bg }} rounded-xl border border-slate-200 p-3">
                                <div class="h-2 w-12 bg-slate-200 rounded mb-2"></div>
                                <div class="h-5 w-8 bg-slate-300 rounded"></div>
                            </div>
                            @endforeach
                        </div>
                        {{-- Table mockup --}}
                        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                            <div class="border-b border-slate-100 px-4 py-3 flex gap-3">
                                <div class="h-2.5 w-24 bg-slate-100 rounded"></div>
                                <div class="ml-auto h-2.5 w-16 bg-ink-100 rounded"></div>
                            </div>
                            @foreach([['green','Active'],['amber','Expiring'],['slate','Draft']] as $row)
                            <div class="border-b border-slate-50 px-4 py-3 flex items-center gap-3 last:border-0">
                                <div class="h-2.5 flex-1 bg-slate-100 rounded"></div>
                                <div class="h-2.5 w-16 bg-slate-100 rounded"></div>
                                <div class="px-2 py-0.5 rounded-full bg-{{ $row[0] }}-100 text-{{ $row[0] }}-600 text-xxs font-semibold">{{ $row[1] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- partials/public-footer.blade.php --}}
<footer class="border-t border-slate-100 bg-white py-8 mt-auto">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            @include('partials.logo')
        </a>
        <p class="text-xs text-slate-400">
            &copy; {{ date('Y') }} ContractVault. All rights reserved.
        </p>
    </div>
</footer>

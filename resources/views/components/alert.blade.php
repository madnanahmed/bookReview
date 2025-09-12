@if (session('success') || session('error'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 3000)"
        class="fixed top-5 right-5 z-50"
    >
        @if (session('success'))
            <div class="mb-2 rounded bg-green-500 text-white px-4 py-2 shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-2 rounded bg-red-500 text-white px-4 py-2 shadow-lg">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endif

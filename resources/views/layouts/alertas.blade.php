<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    @if (Session::has('error'))
        <x-card class="mt-4">
            <div class="mb-4 text-sm text-red-600 dark:text-red-400">
                {{ Session::get('error') }}
            </div>
        </x-card>
    @endif
    @if (Session::has('warning'))
        <x-card class="mt-4">
            <div class="mb-4 text-sm text-yellow-600 dark:text-yellow-400">
                {{ Session::get('warning') }}
            </div>
        </x-card>
    @endif
    @if (Session::has('success'))
        <x-card class="mt-4">
            <div class="mb-4 text-sm text-green-600 dark:text-green-400">
                {{ Session::get('success') }}
            </div>
        </x-card>
    @endif
    @if (Session::has('info'))
        <x-card class="mt-4">
            <div class="mb-4 text-sm text-blue-600 dark:text-white">
                {{ Session::get('info') }}
            </div>
        </x-card>
    @endif
</div>
<x-layouts.guest :title="__('Welcome')">

    <div
        class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif
        <div class="flex flex-col items-center justify-center p-6 mx-auto space-y-4 text-center max-w-7xl lg:p-8">
            <x-app-logo-icon class="w-30 h-30" />
            <flux:button variant="primary" xl href="{{ route('register') }}">Get Started</flux:button>
        </div>

</x-layouts.guest>

<x-layouts.app :title="__('Notes')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div>
            <div class="flex space-x-5 items-center">
                <a href={{ route('notes.index') }}>
                    <flux:button icon="arrow-left">Back to Notes</flux:button>
                </a>
                <h2 class="text-xl font-bold">Create a Note</h2>
            </div class="flex space=x-5">
            <livewire:notes.create-note />
        </div>
</x-layouts.app>

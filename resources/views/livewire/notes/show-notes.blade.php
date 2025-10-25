<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public function with()
    {
        $notes = Auth::user()->notes()->orderBy('send_date')->get();
        return ['notes' => $notes];
    }

    public function delete($noteId)
    {
        $note = Note::where('id', $noteId)->first();
        $note->delete();
    }
}; ?>

<div>
    <div class="flex justify-end">
        <a href={{ route('notes.create') }}>
            <flux:button variant="primary" icon="plus">Add Note</flux:button>
        </a>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-6">
        @foreach ($notes as $note)
            <div class="p-3 border rounded-xl border-rose-500 bg-rose-50 shadow-lg" wire:key='$note->id'>

                <p class="font-bold flex justify-between text-rose-900">
                    <span><a class="hover:underline hover:text-rose-700" href="">{{ $note->title }}</a></span>
                    <span class="text-sm  font-normal">
                        {{ \Carbon\Carbon::parse($note->send_date)->format('M/d/Y') }}</span>
                </p>
                <p class="mx-3 mt-1 mb-4 text-sm">{{ Str::limit($note->body, 50) }}</p>
                <div class="flex items-end justify-between mt-4 space-x-1">
                    <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                    <span>
                        <a href="{{ route('notes.show', $note->id) }}">
                            <flux:button variant="primary" color="teal" size="sm" icon="eye"></flux:button>
                        </a>
                        <flux:button variant="danger" size="sm" icon="trash"
                            wire:click="delete('{{ $note->id }}')">
                        </flux:button>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>

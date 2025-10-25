<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->note = $note;
    }
}; ?>

<div>
    Edit Note from volt
    <div class="space-y-2">

        <p>id: {{ $note->id }}</p>

        <p>title:{{ $note->title }}</p>
        <p>{{ $note->body }}</p>
        <p>{{ $note->recipient }}</p>

    </div>
</div>

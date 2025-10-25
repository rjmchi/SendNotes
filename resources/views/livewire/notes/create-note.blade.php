<?php

use Livewire\Volt\Component;

new class extends Component {
    public $title;
    public $body;
    public $recipient;
    public $sendDate;

    public function submit()
    {
        $validated = $this->validate([
            'title' => 'required',
            'body' => 'required',
            'sendDate' => 'required|date',
            'recipient' => 'required|email',
        ]);
        auth()
            ->user()
            ->notes()
            ->create(['title' => $this->title, 'body' => $this->body, 'send_date' => $this->sendDate, 'recipient' => $this->recipient]);
        redirect(route('notes.index'));
    }
}; ?>

<div class="p-5 border border-rose-900 rounded-xl mt-5 shadow-xl md:w-3/4 mx-auto">
    <form wire:submit='submit' class="space-y-3 mt-3">

        <flux:input label="Title:" wire:model='title' placeholder="Note Title" />
        <flux:textarea rows="2" label="Body:" wire:model='body' placeholder="Note body" />
        <flux:input label="Recipient:" type="email" wire:model='recipient' icon="user"
            placeholder="name@somewhere.com" />
        <flux:input type="date" label="Send Date:" wire:model='sendDate' icon="calendar" />
        <flux:button variant="primary" wire:click='submit'>Schedule Note</flux:button>

    </form>
</div>

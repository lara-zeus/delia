<?php

namespace LaraZeus\Delia\Livewire;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use LaraZeus\Delia\Enums\Operations;
use LaraZeus\Delia\Facades\Delia as DeliaFacades;
use LaraZeus\Delia\Models\Ticket;
use Livewire\Component;

/**
 * @property mixed $form
 */
class BookmarkComponent extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Ticket $ticket;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                //
            ]);
    }

    public function doSubmit(): void
    {
        $this->dispatch('add-comment', ticketId: $this->ticket->id);

        $this->ticket->comment($this->form->getState()['comment']);
    }

    public function render(): View | Application | Factory | ApplicationAlias
    {
        return view('zeus::filament.ticket-comments')
            ->with(
                'comments',
                $this->ticket->comments()->get()
            );
    }
}

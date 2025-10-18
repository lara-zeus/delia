<?php

namespace LaraZeus\Delia\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use LaraZeus\Delia\Filament\Actions\BookmarkHeaderAction;
use Livewire\Component;

/**
 * @property mixed $form
 */
class BookmarkComponent extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;
    use InteractsWithForms;

    public string $url;

    public string $title;

    public string $icon;

    public function bookmarkAction(): Action
    {
        return BookmarkHeaderAction::make('bookmark');
    }

    public function render(): View | Application | Factory | ApplicationAlias
    {
        return view('zeus-delia::components.bookmark');
    }
}

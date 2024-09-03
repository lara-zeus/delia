<?php

namespace LaraZeus\Delia\Filament\Actions;

use Filament\Actions\Action;
use LaraZeus\Delia\Delia;

trait BookmarkAction
{
    public function bookmarkAction(): Action
    {
        return Action::make('bookmark')
            ->iconButton()
            ->tooltip(__('zeus-delia::bookmark.add'))
            ->color('gray')
            ->icon(fn () => Delia::exist($this->resource) ? 'heroicon-s-bookmark' : 'heroicon-o-bookmark')
            ->action(fn (array $arguments) => Delia::toggle($arguments['resource']));
    }
}

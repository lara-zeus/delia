<?php

namespace LaraZeus\Delia\Filament\Actions;

use LaraZeus\Delia\Delia;
use Livewire\Component;

trait HasDefaultAttributes
{
    public static function getDefaultName(): ?string
    {
        return 'bookmark';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->iconButton()
            ->color('gray')
            ->tooltip(
                /** @phpstan-ignore-next-line */
                fn (Component $livewire) => Delia::exist($livewire->url ?? $livewire->getUrl())
                    ? __('zeus-delia::bookmark.remove')
                    : __('zeus-delia::bookmark.add')
            )
            ->icon(
                /** @phpstan-ignore-next-line */
                fn (Component $livewire) => Delia::exist($livewire->url ?? $livewire->getUrl())
                    ? 'heroicon-s-bookmark'
                    : 'heroicon-o-bookmark'
            )
            ->action(
                fn (Component $livewire) => Delia::toggle(
                    /** @phpstan-ignore-next-line */
                    $livewire->url ?? $livewire->getUrl(),
                    /** @phpstan-ignore-next-line */
                    $livewire->title ?? $livewire->getHeading(),
                    /** @phpstan-ignore-next-line */
                    $livewire->icon ?? $livewire->getNavigationIcon()
                )
            );
    }
}

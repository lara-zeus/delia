<?php

namespace LaraZeus\Delia\Filament\Actions;

use Filament\Actions\Action;
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
                function (Action $action, Component $livewire) {
                    return Delia::exist($this->getDeliaUrlData($livewire, $action->getRecord()))
                        ? __('zeus-delia::bookmark.remove')
                        : __('zeus-delia::bookmark.add');
                }
            )
            ->icon(
                /** @phpstan-ignore-next-line */
                function (Action $action, Component $livewire) {
                    return Delia::exist($this->getDeliaUrlData($livewire, $action->getRecord()))
                        ? 'heroicon-s-bookmark'
                        : 'heroicon-o-bookmark';
                }
            )
            ->action(
                function (Action $action, Component $livewire) {
                    Delia::toggle(
                        /** @phpstan-ignore-next-line */
                        $this->getDeliaUrlData($livewire, $action->getRecord()),
                        /** @phpstan-ignore-next-line */
                        $livewire->title ?? $livewire->getHeading(),
                        /** @phpstan-ignore-next-line */
                        $livewire->icon ?? $livewire->getNavigationIcon()
                    );
                }
            );
    }

    private function getDeliaUrlData(Component $livewire, mixed $record = null): string
    {
        // todo
        return '';

        /** @phpstan-ignore-next-line */
        return $livewire->url ?? $livewire->getUrl(
            ($record !== null) ? [
                'record' => $record,
            ] : []
        );
    }
}

<?php

namespace LaraZeus\Delia;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Contracts\View\View;
use LaraZeus\Delia\Filament\Resources\BookmarkResource;

final class DeliaPlugin implements Plugin
{
    use Configuration;
    use EvaluatesClosures;

    public function getId(): string
    {
        return 'zeus-delia';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->renderHook(
                config('zeus-delia.render-hooks.bookmark_toggle_icon'),
                fn (): View => view('zeus-delia::filament.hooks.table-column-bookmark'),
            )
            ->renderHook(
                config('zeus-delia.render-hooks.list'),
                fn (): View => view('zeus-delia::filament.hooks.topbar'),
            )
            ->resources([
                BookmarkResource::class,
            ]);
    }

    public static function make(): static
    {
        return new self;
    }

    public static function get(): static
    {
        // @phpstan-ignore-next-line
        return filament('zeus-delia');
    }

    public function boot(Panel $panel): void
    {
        //
    }
}

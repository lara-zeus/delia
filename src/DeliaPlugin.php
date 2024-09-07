<?php

namespace LaraZeus\Delia;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Contracts\View\View;
use LaraZeus\Delia\Filament\Resources\BookmarkResource;
use LaraZeus\FilamentPluginTools\Concerns\CanHideResources;
use LaraZeus\FilamentPluginTools\Concerns\HasModels;
use LaraZeus\FilamentPluginTools\Concerns\HasNavigationGroupLabel;
use LaraZeus\FilamentPluginTools\FilamentPluginTools;

final class DeliaPlugin extends FilamentPluginTools implements Plugin
{
    use CanHideResources;
    use EvaluatesClosures;
    use HasModels;
    use HasNavigationGroupLabel;

    protected string $pluginId = 'zeus-delia';

    protected string $navigationGroupLabel = 'Delia';

    // todo get rid of this!
    public static function make(): static
    {
        return new self;
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
}

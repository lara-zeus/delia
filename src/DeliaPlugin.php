<?php

namespace LaraZeus\Delia;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use LaraZeus\Core\Concerns\CanGloballySearch;
use LaraZeus\Delia\Filament\Resources\OfficeResource;
use LaraZeus\Delia\Filament\Resources\TicketResource;

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

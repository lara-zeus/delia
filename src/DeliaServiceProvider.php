<?php

namespace LaraZeus\Delia;

use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use LaraZeus\Core\CoreServiceProvider;
use LaraZeus\Delia\Console\InstallCommand;
use LaraZeus\Delia\Console\PublishCommand;
use LaraZeus\Delia\Enums\Abilities;
use LaraZeus\Delia\Livewire\BookmarkComponent;
use LaraZeus\Delia\Livewire\Comments;
use LaraZeus\Delia\Livewire\Office;
use LaraZeus\Delia\Livewire\ShowTicket;
use LaraZeus\Delia\Models\Ticket;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DeliaServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-delia';

    public function packageBooted(): void
    {
        Livewire::component('delia.bookmarks', BookmarkComponent::class);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations()
            ->hasViews(static::$name)
            ->hasConfigFile()
            ->hasMigrations([
                'create_bookmarks_table',
            ])
            ->hasCommands([
                InstallCommand::class,
            ]);
    }
}

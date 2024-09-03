<?php

namespace LaraZeus\Delia;

use LaraZeus\Delia\Console\InstallCommand;
use LaraZeus\Delia\Livewire\BookmarkComponent;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DeliaServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-delia';

    public function packageBooted(): void
    {
        Livewire::component('delia-bookmarks', BookmarkComponent::class);
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

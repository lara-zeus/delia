<?php

namespace LaraZeus\Delia\Tests;

use Filament\FilamentServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use LaraZeus\Delia\DeliaServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'LaraZeus\Delia\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            DeliaServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}

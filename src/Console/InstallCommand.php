<?php

namespace LaraZeus\Delia\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'delia:install';

    protected $description = 'install delia plugin';

    public function handle(): void
    {
        $this->info('publishing migrations...');
        $this->call('vendor:publish', ['--tag' => 'zeus-delia-migrations']);

        $this->info('publishing configuration...');
        $this->call('vendor:publish', ['--tag' => 'zeus-delia-config']);

        $this->call('vendor:publish', ['--tag' => 'zeus-config']);

        $this->info('publishing assets...');
        $this->call('vendor:publish', ['--tag' => 'zeus-assets']);

        if ($this->confirm('Do you want to run the migration now?', true)) {
            $this->info('running migrations...');
            $this->call('migrate');
        }

        $this->output->success('Zeus Delia has been Installed successfully, consider ⭐️ the package in filament site :)');
    }
}

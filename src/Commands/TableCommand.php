<?php


namespace ProviderMan\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use ProviderMan\ProviderManServiceProvider;

class TableCommand extends Command
{
    protected $name = 'provider:table';
    protected $description = 'Publish the migration for providers';

    public function handle()
    {
        Artisan::call('vendor:publish', [
            '--provider' => ProviderManServiceProvider::class,
            '--tag' => 'providers-migrations'
        ]);

        Artisan::call('vendor:publish', [
            '--provider' => ProviderManServiceProvider::class,
            '--tag' => 'providers-config'
        ]);

        $this->info("The migration was published, please run migration command");
    }
}

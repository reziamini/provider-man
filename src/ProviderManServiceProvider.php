<?php

namespace ProviderMan;

use Illuminate\Database\Connection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use ProviderMan\Commands\InstallCommand;
use ProviderMan\Http\Livewire\Create;
use ProviderMan\Http\Livewire\Read;
use ProviderMan\Http\Livewire\Single;

class ProviderManServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/provider.php', 'provider');

        if(Schema::hasTable('providers')) {
            $connection = $this->app->make(Connection::class);
            $data = $connection->table('providers')->select()->get();
            foreach ($data as $item) {
                if (class_exists($item->class)) {
                    App::register($item->class);
                }
            }
        }
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'provider');

        $array = array_merge(['web'], config('provider.middleware'));
        Route::middleware($array)
            ->name('provider.')
            ->prefix(config('provider.route'))
            ->group(__DIR__.'/routes.php');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'providers-migrations');

        $this->publishes([
            __DIR__.'/config' => config_path()
        ], 'providers-config');

        if($this->app->runningInConsole()){
            $this->commands([
                InstallCommand::class,
            ]);
        }

        Livewire::component('provider::livewire.single', Single::class);
        Livewire::component('provider::livewire.create', Create::class);
        Livewire::component('provider::livewire.read', Read::class);
    }

}

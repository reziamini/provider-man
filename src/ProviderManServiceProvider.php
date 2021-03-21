<?php

namespace ProviderMan;

use Illuminate\Database\Connection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use ProviderMan\Commands\TableCommand;
use ProviderMan\Http\Livewire\Create;
use ProviderMan\Http\Livewire\Read;
use ProviderMan\Http\Livewire\Single;

class ProviderManServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/provider.php', 'provider');

        $data = collect($this->app->make(Connection::class)->select("SELECT * FROM `providers` where `enable` = 1"));
        foreach ($data as $item) {
            if(class_exists($item->class)) {
                App::register($item->class);
            }
        }
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'provider');

        Route::middleware('web')
            ->name('provider.')
            ->prefix('provider')
            ->group(__DIR__.'/routes.php');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'providers-migrations');

        if($this->app->runningInConsole()){
            $this->commands([
                TableCommand::class,
            ]);
        }

        Livewire::component('provider::livewire.single', Single::class);
        Livewire::component('provider::livewire.create', Create::class);
        Livewire::component('provider::livewire.read', Read::class);
    }

}

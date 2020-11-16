<?php

namespace Alqudiry\FormBuilder;

use Illuminate\Support\ServiceProvider;
use Alqudiry\FormBuilder\Commands\CreateFormCommand;

class FormBuilderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/views', 'formBuilder');

        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateFormCommand::class,
            ]);
        }
    }
}

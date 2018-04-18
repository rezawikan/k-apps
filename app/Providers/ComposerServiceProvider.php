<?php

namespace App\Providers;

use App\Http\ViewComposer\ProjectFiltersComposer;
use App\Http\ViewComposer\ProjectCalculationsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
          'impact-tracker.index',
          'impact-tracker._form',
          'impact-tracker.partials._technology',
        ], ProjectFiltersComposer::class);

        View::composer([
          'impact-tracker.index',
          'home',
        ], ProjectCalculationsComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

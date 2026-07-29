<?php

namespace App\Providers;

use App\Http\Controllers\MetadataController;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewInstance;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function (ViewInstance $view) {
            $view->with('pageMeta', app(MetadataController::class)->resolve(request()));
        });
    }
}

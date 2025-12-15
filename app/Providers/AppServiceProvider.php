<?php

namespace App\Providers;

use App\Models\Property;
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
        //

        view()->composer('admin.AddDataForm', function($view) {
            $view->with('images', Property::select('photo')
            ->distinct()
            ->orderBy('photo')
            ->get()
            );
        });
    }
}

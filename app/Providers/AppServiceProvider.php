<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();


        Blade::directive('admin', function () {
            return "<?php if(Auth::user()->role == 9): ?>";
        });
        Blade::directive('endAdmin', function () {
            return "<?php endif; ?>";
        });


        Blade::directive('vendor', function () {
            return "<?php if(Auth::user()->role == 5 || Auth::user()->role == 9): ?>";
        });
        Blade::directive('endVendor', function () {
            return "<?php endif; ?>";
        });


        Blade::directive('repairer', function () {
            return "<?php if(Auth::user()->role == 1 || Auth::user()->role == 9 || Auth::user()->role == 5): ?>";
        });
        Blade::directive('endRepairer', function () {
            return "<?php endif; ?>";
        });
    }
}

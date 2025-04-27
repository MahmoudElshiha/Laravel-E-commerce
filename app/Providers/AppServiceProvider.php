<?php

namespace App\Providers;

use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;

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

        Gate::define('edit-product', function (User $user, Product $product) {
            // debug

            return $product->vendor->user->is($user);
        });

        //
    }
}

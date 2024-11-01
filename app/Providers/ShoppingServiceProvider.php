<?php

namespace App\Providers;

use App\DesingPatterns\Structrual\Facade\ShoppingFacade;
use Illuminate\Support\ServiceProvider;

class ShoppingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('shopping', function () {
            return new ShoppingFacade();
        });
    }
}

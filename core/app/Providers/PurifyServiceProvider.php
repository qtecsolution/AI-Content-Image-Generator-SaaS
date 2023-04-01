<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Stevebauman\Purify\Facades\Purify;
// use Stevebauman\Purify\Facades\Purify;

class PurifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('purify', function ($key) {
            return "<?php echo strip_tags($key); ?>";
        });
    }
}

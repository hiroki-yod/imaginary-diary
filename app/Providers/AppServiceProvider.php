<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;  

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
        if(config('app.env') === "production") {
            \URL::forceScheme('https');
        }
        
        //date型の表示形式変換
        Blade::directive('date_jp', function ($expression) {
            return "<?php echo ($expression)->format('m月d日'); ?>";
        });
    }
}

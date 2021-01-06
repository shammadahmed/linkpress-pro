<?php

namespace App\Providers;

use App\App;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('appData', App::first());
        });

        Validator::extend('uri', function ($attribute, $value, $parameters, $validator) {
            if (!filter_var($value, FILTER_VALIDATE_URL) === false) {
                $valid = true;
            } else {
                $valid = false;
            }

            $headers = @get_headers($value);

            $available = !strpos($headers[1], '404');

            return ($valid && $available);
        });

        Validator::extend('WebpageExists', function ($attribute, $value, $parameters, $validator) {
            // return strpos(@get_headers($url)[0],'200') === false ? false : true
            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

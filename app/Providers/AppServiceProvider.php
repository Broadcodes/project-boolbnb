<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;
use App\Providers\Braintree_Configuration;

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
        $this->app->singleton(Gateway::class, function ($app){
            return new Gateway(
                [
                    'environment' => env('BRAINTREE_ENV'),
                    'merchantId' => env('BRAINTREE_MERCHANT_ID'),
                    'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
                    'privateKey' => env('BRAINTREE_PRIVATE_KEY')
                ]
            );
        });

    }
}
/*
Braintree_Configuration::environment(env('BRAINTREE_ENV'));
Braintree_Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
Braintree_Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
Braintree_Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));
*/

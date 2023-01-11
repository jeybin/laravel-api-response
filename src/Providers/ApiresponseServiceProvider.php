<?php

namespace Jeybin\Apiresponse\Providers;

use Illuminate\Support\ServiceProvider;
use Jeybin\Apiresponse\Facades\ApiresponseFacades;
use Jeybin\Apiresponse\Console\PublishApiresponseProviders;

class ApiresponseServiceProvider extends ServiceProvider
{   

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        /**
         * Config file merging into the project
         */
        
        $configs = [
            __DIR__.'/../Config/jeybin-apiresponse.php' => config_path('jeybin-apiresponse.php') 
        ];

        $this->publishes($configs, 'apiresponse-config');


        /**
         * Checking if the app is 
         * running from console
         */
        if ($this->app->runningInConsole()) {

            /**
             * Adding custom commands class to the 
             * service provider
             */
            $this->commands([
                PublishApiresponseProviders::class
            ]);
        }

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(){

        $this->mergeConfigFrom(
            __DIR__.'/../Config/jeybin-apiresponse.php', 'apiresponse-config'
        );

        
        $this->app->bind('throwresponse',fn($app)=>new ApiresponseFacades($app));

        $this->app->alias('throwresponse', ApiresponseFacades::class);

    }
}
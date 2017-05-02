<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use DB;

class Net2ftpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        DB::listen(function ($query){
           $query->sql;
           $query->bindings;
           $query->time;
            //log.info($query->sql);

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        //

        $this->app->register('Collective\Html\HtmlServiceProvider');

        $loader = AliasLoader::getInstance();
        $loader->alias('Form','Collective\Html\FormFacade');
        $loader->alias('HTML','Collective\Html\HtmlFacade');
        $loader->alias('AssetBuilder', 'App\Libraries\Builder\AssetBuilder');
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [

            'Collective\Html\HtmlServiceProvider'
        ];
    }
}

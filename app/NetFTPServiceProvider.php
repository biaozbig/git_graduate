<?php
namespace App;
/**
 * Created by PhpStorm.
 * User: Biao
 * Date: 2017/2/28
 * Time: 23:37
 */
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Http\Kernel;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\GuestAuth;

class NetFTPServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application events.
     *
     * @param Router $router
     * @param Kernel $kernel
     * @return void
     */
    public function boot(Router $router, Kernel $kernel)
    {
        // add router middleware
        $routerMiddleware = [
            'admin' => AdminAuth::class,
            'guest' => GuestAuth::class
        ];
       // event($routerMiddleware);
        foreach ($routerMiddleware as $routerMiddlewareName => $routerMiddlewareClass) {
            $router->middleware($routerMiddlewareName, $routerMiddlewareClass);
        }



    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // register third party providers
        //$this->app->register('Bkwld\Croppa\ServiceProvider');
        //$this->app->register('Collective\Html\HtmlServiceProvider');

        // register aliases
        $loader = AliasLoader::getInstance();
        $loader->alias('FormMessage', 'App\Libraries\Builder\FormMessage');
        $loader->alias('AssetBuilder', 'App\Libraries\Builder\AssetBuilder');
    }

}
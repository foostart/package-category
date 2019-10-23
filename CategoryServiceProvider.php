<?php

namespace Foostart\Category;

use Illuminate\Support\ServiceProvider;
use Foostart\Acl\Authentication\Classes\Menu\SentryMenuFactory;
use URL,
    Route;
use Illuminate\Http\Request;

class CategoryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {

        //generate context key
//        $this->generateContextKey();

        // load view
        $this->loadViewsFrom(__DIR__ . '/Views', 'package-category');

        // include view composers
        require __DIR__ . "/composers.php";

        // publish config
        $this->publishConfig();

        // publish lang
        $this->publishLang();

        // publish views
        $this->publishViews();

        //public assets
        $this->publishAssets();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';
    }

    /**
     * Public config to system
     * @source: vendor/foostart/package-category/config
     * @destination: config/
     */
    protected function publishConfig() {
        $this->publishes([
            __DIR__ . '/config/package-category.php' => config_path('package-category.php'),
                ], 'config');
    }

    /**
     * Public language to system
     * @source: vendor/foostart/package-category/lang
     * @destination: resources/lang
     */
    protected function publishLang() {
        $this->publishes([
            __DIR__ . '/lang' => base_path('resources/lang'),
        ]);
    }

    /**
     * Public view to system
     * @source: vendor/foostart/package-category/Views
     * @destination: resources/views/vendor/package-category
     */
    protected function publishViews() {

        $this->publishes([
            __DIR__ . '/Views' => base_path('resources/views/vendor/package-category'),
        ]);
    }

    /** Public assets to system
    * @source: vendor/foostart/package-category/public/assets
    * @destination: public/package/foostart
    */
    protected function publishAssets()
    {
        $this->publishes([
                     __DIR__ . '/public/assets' => public_path('packages/foostart'),
        ]);

    }

}
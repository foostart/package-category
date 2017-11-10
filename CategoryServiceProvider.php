<?php

namespace Foostart\Category;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
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

    /**
     * Generate context key
     */
    private function generateContextKey(){
        $numbers_context = 10;
        $index = 0;
        $context_key = [];
        do {
            $index++;
            $context_key[] = $index.substr(md5(time().rand(1,99999)),0,11);

        } while ($index < $numbers_context);
        var_dump($context_key);
        die();
    }

}
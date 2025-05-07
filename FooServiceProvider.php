<?php namespace Foostart\Category;

use Illuminate\Support\ServiceProvider;
use URL,
    Route;
use Illuminate\Http\Request;

abstract class FooServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        //Service provider
    }

    /**
     * Public config to system
     * @source: vendor/foostart/package-category/config
     * @destination: config/
     */
    protected function publishConfig()
    {
        //Service provider
    }

    /**
     * Public language to system
     * @source: vendor/foostart/package-category/lang
     * @destination: resources/lang
     */
    protected function publishLang(string $dir = '')
    {
        $this->publishes([
            $dir . '/lang' => base_path('resources/lang'),
        ]);
    }

    /**
     * Public view to system
     * @source: vendor/foostart/package-category/Views
     * @destination: resources/views/vendor/package-category
     */
    protected function publishViews(string $dir = '')
    {
        //Service provider
    }

    /** Public assets to system
     * @source: vendor/foostart/package-category/public/assets
     * @destination: public/package/foostart
     */
    protected function publishAssets(string $dir = '')
    {
        $this->publishes([
            $dir . '/public/assets' => public_path('packages/foostart'),
        ]);

    }

    /**
     * Publish migrations
     * @source: foostart/package-category/database/migrations
     * @destination: database/migrations
     */
    protected function publishMigrations(string $dir = '')
    {
        $this->publishes([
            $dir . '/database/migrations' => $this->app->databasePath() . '/migrations',
        ]);
    }

    /**
     * Publish seeders
     * @source: foostart/package-category/database/seeders
     * @destination: database/seeders
     */
    protected function publishSeeders(string $dir = '')
    {
        $this->publishes([
            $dir . '/database/seeders' => $this->app->databasePath() . '/seeders',
        ]);
    }

}

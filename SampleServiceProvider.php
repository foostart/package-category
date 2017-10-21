<?php

namespace Foostart\Sample;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class SampleServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/sample_admin.php' => config_path('sample_admin.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'sample');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'sample');


        /**
         * Load view composer
         */
        $this->sampleViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Foostart\Sample\Controllers\Admin\SampleAdminController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'sample');
    }

    /**
     *
     */
    public function sampleViewComposer(Request $request) {

        view()->composer('sample::sample*', function ($view) {
            global $request;
            $sample_id = $request->get('id');
            $is_action = empty($sample_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * Samples
                 */
                //list
                trans('sample::sample_admin.page_list') => [
                    'url' => URL::route('admin_sample'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                //add
                trans('sample::sample_admin.'.$is_action) => [
                    'url' => URL::route('admin_sample.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],

                /**
                 * Categories
                 */
                //list
                trans('sample::sample_admin.page_category_list') => [
                    'url' => URL::route('admin_sample_category'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
            ]);
            //
        });
    }

}

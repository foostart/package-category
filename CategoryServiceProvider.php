<?php

namespace Foostart\Category;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class CategoryServiceProvider extends ServiceProvider {

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
            __DIR__.'/config/lang_package_category.php' => config_path('lang_package_category.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'category');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'category');


        /**
         * Load view composer
         */
        $this->categoryViewComposer($request);

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
        $this->app->make('Foostart\Category\Controllers\Admin\CategoryAdminController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'category');
    }

    /**
     *
     */
    public function categoryViewComposer(Request $request) {

        view()->composer('category::category*', function ($view) {
            global $request;
            $category_id = $request->get('id');
            $is_action = empty($category_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * Categorys
                 */
                //list
                trans('category::lang_package_category.page_list') => [
                    'url' => URL::route('admin_category'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                //add
                trans('category::lang_package_category.'.$is_action) => [
                    'url' => URL::route('admin_category.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],

                /**
                 * Categories
                 */
                //list
                trans('category::lang_package_category.page_category_list') => [
                    'url' => URL::route('admin_category_category'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
            ]);
            //
        });
    }

}

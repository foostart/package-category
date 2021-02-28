<?php

use Illuminate\Session\TokenMismatchException;

/*
|-----------------------------------------------------------------------
| CONTEXT
|-----------------------------------------------------------------------
| Manage context
| 1. List of context
| 2. Edit context
| 3. Delete context
| 4. Add new context
|
*/
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
                  'namespace' => 'Foostart\Category\Controllers\Admin',
        ], function () {


        /**
         * list
         */
        Route::get('admin/contexts/list', [
            'as' => 'contexts.list',
            'uses' => 'ContextAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/contexts/edit', [
            'as' => 'contexts.edit',
            'uses' => 'ContextAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/contexts/copy', [
            'as' => 'contexts.copy',
            'uses' => 'ContextAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/contexts/edit', [
            'as' => 'contexts.post',
            'uses' => 'ContextAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/contexts/delete', [
            'as' => 'contexts.delete',
            'uses' => 'ContextAdminController@delete'
        ]);

        /**
         * configs
        */
        Route::get('admin/contexts/config', [
            'as' => 'contexts.config',
            'uses' => 'ContextAdminController@config'
        ]);

        Route::post('admin/contexts/config', [
            'as' => 'contexts.config',
            'uses' => 'ContextAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/contexts/lang', [
            'as' => 'contexts.lang',
            'uses' => 'ContextAdminController@lang'
        ]);

        Route::post('admin/contexts/lang', [
            'as' => 'contexts.lang',
            'uses' => 'ContextAdminController@lang'
        ]);

    });
});


/*
|-----------------------------------------------------------------------
| CATEGORIES
|-----------------------------------------------------------------------
| Manage categories
|
|
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
                  'namespace' => 'Foostart\Category\Controllers\Admin',
        ], function () {

        /**
         * list
         */
        Route::get('admin/categories/list', [
            'as' => 'categories.list',
            'uses' => 'CategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/categories/edit', [
            'as' => 'categories.edit',
            'uses' => 'CategoryAdminController@edit'
        ]);

         /**
         * copy
         */
        Route::get('admin/categories/copy', [
            'as' => 'categories.copy',
            'uses' => 'CategoryAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/categories/edit', [
            'as' => 'categories.post',
            'uses' => 'CategoryAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/categories/delete', [
            'as' => 'categories.delete',
            'uses' => 'CategoryAdminController@delete'
        ]);

        /**
         * configs
        */
        Route::get('admin/categories/config', [
            'as' => 'categories.config',
            'uses' => 'CategoryAdminController@config'
        ]);

        Route::post('admin/categories/config', [
            'as' => 'categories.config',
            'uses' => 'CategoryAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/categories/lang', [
            'as' => 'categories.lang',
            'uses' => 'CategoryAdminController@lang'
        ]);

        Route::post('admin/categories/lang', [
            'as' => 'categories.lang',
            'uses' => 'CategoryAdminController@lang'
        ]);

    });
});
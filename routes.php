<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('category', [
    'as' => 'category',
    'uses' => 'Foostart\Category\Controllers\Front\CategoryFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context']], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage category
          |-----------------------------------------------------------------------
          | 1. List of categories
          | 2. Edit category
          | 3. Delete category
          | 4. Add new category
          |
        */

        /**
         * list
         */
        Route::get('admin/categories/list', [
            'as' => 'categories.list',
            'uses' => 'Foostart\Category\Controllers\Admin\CategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/categories/edit', [
            'as' => 'categories.edit',
            'uses' => 'Foostart\Category\Controllers\Admin\CategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/categories/edit', [
            'as' => 'categories.post',
            'uses' => 'Foostart\Category\Controllers\Admin\CategoryAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/categories/delete', [
            'as' => 'categories.delete',
            'uses' => 'Foostart\Category\Controllers\Admin\CategoryAdminController@delete'
        ]);

    });
});

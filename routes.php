<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('sample', [
    'as' => 'sample',
    'uses' => 'Foostart\Sample\Controllers\Front\SampleFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/sample', [
            'as' => 'admin_sample',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/sample/edit', [
            'as' => 'admin_sample.edit',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/sample/edit', [
            'as' => 'admin_sample.post',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/sample/delete', [
            'as' => 'admin_sample.delete',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/sample_category', [
            'as' => 'admin_sample_category',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/sample_category/edit', [
            'as' => 'admin_sample_category.edit',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/sample_category/edit', [
            'as' => 'admin_sample_category.post',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/sample_category/delete', [
            'as' => 'admin_sample_category.delete',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});

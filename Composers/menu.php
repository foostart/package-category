<?php

use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

/**
 * User sidebar
 */
View::composer([
    'category::admin.category-edit',
    'category::admin.category-form',
    'category::admin.category-item',
    'category::admin.category-list',
    'category::admin.category-search',
        ], function ($view) {

    /*
    |-----------------------------------------------------------------------
    | Sidebar Items
    |-----------------------------------------------------------------------
    |
    */
    $view->with('sidebar_items', [
        trans('category-admin.category-list') => [
            "url" => URL::route('categories.list'),
            "icon" => '<i class="fa fa-user"></i>'
        ],
        trans('category-admin.category-add') => [
            'url' => URL::route('categories.edit'),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ]
    ]);

    /*
    |-----------------------------------------------------------------------
    | Environment
    |-----------------------------------------------------------------------
    |
    */
    $env = config('package-category.load_from');
    $view->with('evn', $env);
});

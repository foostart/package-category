<?php

use Foostart\Acl\Authentication\Classes\Menu\SentryMenuFactory;
use Foostart\Category\Helpers\SortTable;


/*
|-----------------------------------------------------------------------
| GLOBAL VARIABLES
|-----------------------------------------------------------------------
|   $sidebar_items
|   $sorting
|   $order_by
|   $plang_admin = 'category-admin'
|   $plang_front = 'category-front'
*/
View::composer([
                'package-category::admin.context-edit',
                'package-category::admin.context-form',
                'package-category::admin.context-items',
                'package-category::admin.context-item',
                'package-category::admin.context-search',
                'package-category::admin.context-config',
                'package-category::admin.context-lang',
    ], function ($view) {

        /**
         * $plang-admin
         * $plang-front
         */
        $plang_admin = 'category-admin';
        $plang_front = 'category-front';

        /**
         * Get list of params
         */
        $params = Request::all();

        /**
         * $sidebar_items
         */
       /**
         * $sidebar_items
         */
        $sidebar_items = [
            trans('category-admin.sidebar.add') => [
                'url' => URL::route('contexts.edit', []),
                'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>'
            ],
            trans('category-admin.sidebar.list') => [
                "url" => URL::route('contexts.list', []),
                'icon' => '<i class="fa fa-list-ul" aria-hidden="true"></i>'
            ],
            trans('category-admin.sidebar.config') => [
                "url" => URL::route('contexts.config', []),
                'icon' => '<i class="fa fa-braille" aria-hidden="true"></i>'
            ],
            trans('category-admin.sidebar.lang') => [
                "url" => URL::route('contexts.lang', []),
                'icon' => '<i class="fa fa-language" aria-hidden="true"></i>'
            ],
        ];

        /**
         * $sorting
         * $order_by
         */
        $orders = [
            '' => trans($plang_admin.'.form.no-selected'),
            'context_name' => trans($plang_admin.'.fields.context-name'),
            'context_ref' => trans($plang_admin.'.fields.context-ref'),
            'status' => trans($plang_admin.'.fields.context-status'),
            'updated_at' => trans($plang_admin.'.fields.updated_at'),
        ];

        //Order by params
        $sortTable = new SortTable();
        $sortTable->setOrders($orders);
        $sorting = $sortTable->linkOrders();

        /**
         * $order_by
         */
        $order_by = [
            'asc' => trans('category-admin.order.by-asc'),
            'desc' => trans('category-admin.order.by-des'),
        ];

        /**
         * Send to view
         */
        $view->with('sidebar_items', $sidebar_items );
        $view->with('plang_admin', $plang_admin);
        $view->with('plang_front', $plang_front);
        $view->with('sorting', $sorting);
        $view->with('order_by', $order_by);
});

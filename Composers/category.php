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
                'package-category::admin.category-edit',
                'package-category::admin.category-form',
                'package-category::admin.category-items',
                'package-category::admin.category-item',
                'package-category::admin.category-search',
                'package-category::admin.category-config',
                'package-category::admin.category-lang',
    ], function ($view) {

        /**
         * $plang-admin
         * $plang-front
         */
        $plang_admin = 'category-admin';
        $plang_front = 'category-front';

        /**
         * $_key context key
         * $_token token for auth
         */
        $params = Request::all();
        $_key = @$params['_key'];
        $callback_item = [];
        $callback_url = empty($params['callback_url'])?'':base64_decode($params['callback_url']);
        $label = empty($params['label'])?'':base64_decode($params['label']);

        if ($callback_url && $label) {
            $callback_item = [
            trans($label) => [
                    'url' => $callback_url,
                    'icon' => '<i class="fa fa-undo" aria-hidden="true"></i>',
                ]
            ];
        }
        /**
         * $sidebar_items
         */
        $sidebar_items = $callback_item + [
            //add new
            trans('category-admin.sidebar.add') => [
                'url' => URL::route('categories.edit', [
                    '_key' => $_key,
                ]),
                'icon' => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
            ],

            //list
            trans('category-admin.sidebar.list') => [
                "url" => URL::route('categories.list', [
                    '_key' => $_key,
                ]),
                'icon' => '<i class="fa fa-list-ul" aria-hidden="true"></i>'
            ],

            //config
            trans('category-admin.sidebar.config') => [
                "url" => URL::route('contexts.config', []),
                'icon' => '<i class="fa fa-braille" aria-hidden="true"></i>'
            ],

            //language
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
            'id' => trans($plang_admin.'.fields.id'),
            'category_name' => trans($plang_admin.'.fields.name'),    
            'status' => trans($plang_admin.'.fields.status'),
            'updated_at' => trans($plang_admin.'.fields.updated_at'),
        ];

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

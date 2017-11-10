<?php

use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

/**
 * Category sidebar
 */
View::composer([
    'package-category::admin.category-contexts',
    'package-category::admin.category-context',
        ], function ($view) {

    /*
    |-----------------------------------------------------------------------
    | Sidebar Items
    |-----------------------------------------------------------------------
    |
    */
    $view->with('sidebar_items', [
        trans('category-admin.category_contexts') => [
            "url" => URL::route('categories.list'),
            "icon" => '<i class="fa fa-user"></i>'
        ]
    ]);
});


/**
 * Category sidebar
 */
View::composer([
    'package-category::admin.category-edit',
    'package-category::admin.category-form',
    'package-category::admin.category-item',
    'package-category::admin.category-items',
    'package-category::admin.category-search',
        ], function ($view) {

    /*
    |-----------------------------------------------------------------------
    | Sidebar Items
    |-----------------------------------------------------------------------
    |
    */

    $view->with('sidebar_items', [
        trans('category-admin.category_list') => [
            "url" => URL::route('categories.list', ['context' => $_GET['context']]),
            "icon" => '<i class="fa fa-user"></i>'
        ],
        trans('category-admin.category_add') => [
            'url' => URL::route('categories.edit', ['context' => $_GET['context']]),
            "icon" => '<i class="fa fa-plus-circle"></i>'
        ]
    ]);

    /*
    |-----------------------------------------------------------------------
    | Sorting
    |-----------------------------------------------------------------------
    |
    */
    //List of sorting
    $orders = [
        '' => trans('tailieuweb.no_selected'),
        'id' => trans('category-admin.id'),
        'category_name' => trans('category-admin.name'),
        'updated_at' => trans('tailieuweb.updated_at'),
    ];
    $sorting = [
        'label' => $orders,
        'items' => [],
        'url' => []
    ];
    //Order by params
    $params = Request::all();

    $order_by = explode(',', @$params['order_by']);
    $ordering = explode(',', @$params['ordering']);
    foreach ($orders as $key => $value) {
        $_order_by = $order_by;
        $_ordering = $ordering;
        if (!empty($key)) {
            //existing key in order
            if (in_array($key, $order_by)) {
                $index = array_search($key, $order_by);
                switch ($_ordering[$index]) {
                    case 'asc':
                        $sorting['items'][$key] = 'asc';
                        $_ordering[$index] = 'desc';
                        break;
                    case 'desc':
                         $sorting['items'][$key] = 'desc';
                        $_ordering[$index] = 'asc';
                        break;
                    default:
                        break;
                }
                $order_by_str = implode(',', $_order_by);
                $ordering_str = implode(',', $_ordering);

            } else {//new key in order
                $sorting['items'][$key] = 'none';//asc
                if (empty($params['order_by'])) {
                    $order_by_str = $key;
                    $ordering_str = 'asc';
                } else {
                    $_order_by[] = $key;
                    $_ordering[] = 'asc';
                    $order_by_str = implode(',', $_order_by);
                    $ordering_str = implode(',', $_ordering);
                }
            }
            $sorting['url'][$key]['order_by'] = $order_by_str;
            $sorting['url'][$key]['ordering'] = $ordering_str;
        }
    }
    foreach ($sorting['url'] as $key => $item) {
        $params['order_by'] = $item['order_by'];
        $params['ordering'] = $item['ordering'];
        $sorting['url'][$key] = Request::url().'?'.http_build_query($params);
    }
    $view->with('sorting', $sorting);

    //Order by
    $order_by = [
        'asc' => trans('tailieuweb.order_by.asc'),
        'desc' => trans('tailieuweb.order_by.desc'),
    ];
    $view->with('order_by', $order_by);
});

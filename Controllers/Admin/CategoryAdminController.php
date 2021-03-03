<?php namespace Foostart\Category\Controllers\Admin;

/*
|-----------------------------------------------------------------------
| CategoryAdminController
|-----------------------------------------------------------------------
| @author: Kang
| @website: http://foostart.com
| @date: 28/12/2017
|
*/


use Illuminate\Http\Request;
use URL, Route, Redirect;
use Illuminate\Support\Facades\App;

use Foostart\Category\Library\Controllers\FooController;
use Foostart\Category\Models\Context;
use Foostart\Category\Models\Category;
use Foostart\Category\Validators\CategoryValidator;

class CategoryAdminController extends FooController {

    public $obj_item = NULL;
    public $obj_context = NULL;

    public function __construct() {

        parent::__construct();
        // models
        $this->obj_item = new Category(array('perPage' => 10));
        $this->obj_context = new Context();

        // validators
        $this->obj_validator = new CategoryValidator();

        // set language files
        $this->plang_admin = 'category-admin';
        $this->plang_front = 'category-front';

        // package name
        $this->package_name = 'package-category';
        $this->package_base_name = 'category';

        // root routers
        $this->root_router = 'categories';

        // page views
        $this->page_views = [
            'admin' => [
                'items' => $this->package_name.'::admin.'.$this->package_base_name.'-items',
                'edit'  => $this->package_name.'::admin.'.$this->package_base_name.'-edit',
                'config'  => $this->package_name.'::admin.'.$this->package_base_name.'-config',
                'lang'  => $this->package_name.'::admin.'.$this->package_base_name.'-lang',
            ]
        ];

        // status of item
        $this->data_view['status'] = $this->obj_item->getPluckStatus();
        $this->statuses = $this->obj_item->config_status['list'];

    }

    /**
     * Show list of items by key
     * @return view list of items
     * @date 27/12/2017
    */
    public function index(Request $request) {

        $params = $request->all();
        $params['category_id_parent'] = NULL;
        $params['order'] = [
            'category_order' => 'ASC',
        ];
        $items = $this->obj_item->selectItems($params);

        // display view
        $this->data_view = array_merge($this->data_view, array(
            'items' => $items,
            'request' => $request,
            'params' => $params,
            'config_status' => $this->obj_item->config_status
        ));

        return view($this->page_views['admin']['items'], $this->data_view);
    }

    /**
     * Edit existing category by id - context
     * Add new category by context
     * @return screen
     */
    public function edit(Request $request) {

        $params = $request->all();

        $categories = $this->obj_item->pluckSelect($params);

        $item = NULL;
        $params['id'] = $request->get('id');

        if (!empty($params['id'])) {
            $item = $this->obj_item->selectItem($params);
        }

        $this->data_view = array_merge($this->data_view, array(
            'item' => $item,
            'categories' => $categories,
            'request' => $request,
            'statuses' => $this->statuses,
        ));

        return view($this->page_views['admin']['edit'], $this->data_view);
    }

    /**
     * Processing data from POST method: add new item, edit existing item
     * @return view edit page
     * @date 27/12/2017
     */
    public function post(Request $request) {

        $item = NULL;

        $params = array_merge($request->all(), $this->getUser());
        $_key = @$params['_key'];

        $is_valid_request = $this->isValidRequest($request);

        $id = (int) $request->get('id');

        if ($is_valid_request && $this->obj_validator->validate($params)) {

            // update existing item
            if (!empty($id)) {

                $item = $this->obj_item->find($id);

                if (!empty($item)) {

                    $item = $this->obj_item->updateItem($params);

                    // message
                    return Redirect::route($this->root_router.'.edit', [
                                                                        'id' => $item->id,
                                                                        '_key' => $_key,
                                                                    ])
                                    ->withMessage(trans($this->plang_admin.'.actions.edit-ok'));
                } else {

                    // message
                    return Redirect::route($this->root_router.'.list')
                                    ->withMessage(trans($this->plang_admin.'.actions.edit-error'));
                }

            // add new item
            } else {

                $item = $this->obj_item->insertItem($params);

                if (!empty($item)) {

                    //message
                    return Redirect::route($this->root_router.'.edit', [
                                                                        'id' => $item->id,
                                                                        '_key' => $_key,
                                                                    ])
                                    ->withMessage(trans($this->plang_admin.'.actions.add-ok'));
                } else {

                    //message
                    return Redirect::route($this->root_router.'.edit', [
                                                                        'id' => $item->id,
                                                                        '_key' => $_key,
                                                                    ])
                                    ->withMessage(trans($this->plang_admin.'.actions.add-error'));
                }

            }

        } else { // invalid data

            $errors = $this->obj_validator->getErrors();

            // passing the id incase fails editing an already existing item
            return Redirect::route($this->root_router.'.edit', $id ? [ 'id' => $id,
                                                                        '_key' => $_key,
                                                                    ] : [
                                                                        '_key' => $_key
                                                                    ])
                    ->withInput()->withErrors($errors);
        }
    }

/**
     * Delete existing item
     * @return view list of items
     * @date 27/12/2017
     */
    public function delete(Request $request) {

        $item = NULL;
        $flag = TRUE;
        $params = array_merge($request->all(), $this->getUser());
        $_key = @$params['_key'];

        $delete_type = isset($params['del-forever'])?'delete-forever':'delete-trash';
        $id = (int)$request->get('id');
        $ids = $request->get('ids');

        $is_valid_request = $this->isValidRequest($request);

        if ($is_valid_request && (!empty($id) || !empty($ids))) {

            $ids = !empty($id)?[$id]:$ids;

            foreach ($ids as $id) {

                $params['id'] = $id;

                if (!$this->obj_item->deleteItem($params, $delete_type)) {
                    $flag = FALSE;
                }
            }
            if ($flag) {
                return Redirect::route($this->root_router.'.list', [
                                                            '_key' => $_key,
                                                        ])
                                ->withMessage(trans($this->plang_admin.'.actions.delete-ok'));
            }
        }

        return Redirect::route($this->root_router.'.list', [
                                                            '_key' => $_key,
                                                        ])
                        ->withMessage(trans($this->plang_admin.'.actions.delete-error'));
    }


    /**
     * Edit existing item by {id} parameters OR
     * Add new item
     * @return view edit page
     * @date 26/12/2017
     */
    public function copy(Request $request) {

        $params = $request->all();

        $item = NULL;
        $params['id'] = $request->get('cid', NULL);

        if (!empty($params['id'])) {

            $item = $this->obj_item->selectItem($params, FALSE);

            if (empty($item)) {
                return Redirect::route($this->root_router.'.list')
                                ->withMessage(trans($this->plang_admin.'.actions.edit-error'));
            }

            $item->id = NULL;
        }

        $categories = $this->obj_item->pluckSelect($params);

        // display view
        $this->data_view = array_merge($this->data_view, array(
            'item' => $item,
            'categories' => $categories,
            'request' => $request,
        ));

        return view($this->page_views['admin']['edit'], $this->data_view);
    }
}
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

        $this->data_view['status'] = $this->obj_item->getPluckStatus();

    }

        /**
     * Show list of items
     * @return view list of items
     * @date 27/12/2017
     */
    public function index(Request $request) {

        $params = $request->all();
        $params['category_id_parent'] = NULL;

        $items = $this->obj_item->selectItems($params);

        // display view
        $this->data_view = array_merge($this->data_view, array(
            'items' => $items,
            'request' => $request,
            'params' => $params,
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

        $items = $this->obj_category->selectItems($params);

        $category = NULL;
        $params['id'] = $request->get('id');

        if (!empty($params['id'])) {
            $category = $this->obj_category->selectItem($params);
        }

        $this->data_view = array_merge($this->data_view, array(
            'category' => $category,
            'categories' => $items,
            'request' => $request,
            'categories' => $this->obj_category->pluckSelect($params)
        ));
        return view('package-category::admin.category-edit', $this->data_view);
    }

    /**
     * Processing data from POST method: add new item, edit existing item
     * @return edit page
     */
    public function post(Request $request) {

        $input = $request->all();

        $id = (int) $request->get('id');
        $category = NULL;

        $data = array();
        $context = $request->get('context', null);

        if ($this->obj_validator->validate($input)) {

            //Update existing item
            if (!empty($id) && is_int($id)) {

                $category = $this->obj_category->find($id);

                if (!empty($category)) {

                    $input['id'] = $id;
                    $category = $this->obj_category->updateItem($input);

                    //Message
                    return Redirect::route("categories.edit", ["id" => $category->id,
                                                               'context' => $context
                                                                ])
                                    ->withMessage('11');
                }

            //Add new item
            } else {

                $category = $this->obj_category->insertItem($input);

                if (!empty($category)) {

                    //Message
                    return Redirect::route("categories.edit", ["id" => $category->id,
                                                               'context' => $context
                                                            ])->withMessage('aa');
                }

            }
        } else {

            $errors = $this->obj_validator->getErrors();
            // passing the id incase fails editing an already existing item
            return Redirect::route("categories.edit", $id ? ["id" => $id,'context' => $context]: ['context' => $context])
                    ->withInput()->withErrors($errors);
        }

        $this->data_view = array_merge($this->data_view, array(
            'category' => $category,
            'request' => $request,
            'context' => $context
                ), $data);

        return view('package-category::admin.category-edit', $this->data_view);
    }

    /**
     * Delete category
     * @return type
     */
    public function delete(Request $request) {

        $category = NULL;
        $params = $request->all();
        $id = $request->get('id');

        if (!empty($id)) {
            $category = $this->obj_category->selectItem($params);

            if (!empty($category)) {
                if ($this->obj_category->deleteItem($params, $category)) {
                    return Redirect::route("categories.list", ['context' => $params['context']])->withMessage(trans('category-admin.delete-successful'));
                }
            }
        }
        return Redirect::route("categories.list",['context' => $params['context']])->withMessage(trans('category-admin.delete-unsuccessful'));
    }
}
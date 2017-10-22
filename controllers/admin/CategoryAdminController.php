<?php

namespace Foostart\Category\Controllers\Admin;

use Illuminate\Http\Request;
use Foostart\Category\Controllers\Admin\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Category\Models\Categories;
/**
 * Validators
 */
use Foostart\Category\Validators\CategoryAdminValidator;

class CategoryAdminController extends Controller {

    public $data_view = array();
    private $obj_categories = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_categories = new Categories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_category = $this->obj_categories->get_categorys($params);

        $this->data_view = array_merge($this->data_view, array(
            'categorys' => $list_category,
            'request' => $request,
            'params' => $params
        ));
        return view('category::category.admin.category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $category = NULL;
        $category_id = (int) $request->get('id');


        if (!empty($category_id) && (is_int($category_id))) {
            $category = $this->obj_categories->find($category_id);
        }

        $this->obj_categories = new Categories();

        $this->data_view = array_merge($this->data_view, array(
            'category' => $category,
            'request' => $request,
            'categories' => $this->obj_categories->pluckSelect()
        ));
        return view('category::category.admin.category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new CategoryAdminValidator();

        $input = $request->all();

        $category_id = (int) $request->get('id');
        $category = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($category_id) && is_int($category_id)) {

                $category = $this->obj_categories->find($category_id);
            }
        } else {
            if (!empty($category_id) && is_int($category_id)) {

                $category = $this->obj_categories->find($category_id);

                if (!empty($category)) {

                    $input['category_id'] = $category_id;
                    $category = $this->obj_categories->update_category($input);

                    //Message
                    $this->addFlashMessage('message', trans('category::lang_package_category.message_update_successfully'));
                    return Redirect::route("admin_category.edit", ["id" => $category->category_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('category::lang_package_category.message_update_unsuccessfully'));
                }
            } else {

                $category = $this->obj_categories->add_category($input);

                if (!empty($category)) {

                    //Message
                    $this->addFlashMessage('message', trans('category::lang_package_category.message_add_successfully'));
                    return Redirect::route("admin_category.edit", ["id" => $category->category_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('category::lang_package_category.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'category' => $category,
            'request' => $request,
                ), $data);

        return view('category::category.admin.category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $category = NULL;
        $category_id = $request->get('id');

        if (!empty($category_id)) {
            $category = $this->obj_categories->find($category_id);

            if (!empty($category)) {
                //Message
                $this->addFlashMessage('message', trans('category::lang_package_category.message_delete_successfully'));

                $category->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'category' => $category,
        ));

        return Redirect::route("admin_category");
    }
}
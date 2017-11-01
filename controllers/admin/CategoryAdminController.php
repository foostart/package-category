<?php namespace Foostart\Category\Controllers\Admin;

use Foostart\Category\Library\Controllers\FooController;
use Illuminate\Http\Request;
use URL;
use Route,
    Redirect;
use Foostart\Category\Models\Category;
/**
 * Validators
 */
use Foostart\Category\Validators\CategoryValidator;

class CategoryAdminController extends FooController {

    public $obj_category = NULL;

    public function __construct() {
        $this->obj_category = new Category(array('per_page' => config('package-category.per_page')));
        $this->obj_validator = new CategoryValidator();
    }

    /**
     *
     * @return view
     */
    public function index(Request $request) {
        $params = $request->all();

        $items = $this->obj_category->selectItems($params);
        $this->data_view = array_merge($this->data_view, array(
            'items' => $items,
            'request' => $request,
            'params' => $params
        ));
        return view('package-category::admin.category-items', $this->data_view);
    }

    /**
     * Edit existing category by id
     * Add new category
     * @return screen
     */
    public function edit(Request $request) {

        $params = $request->all();
        $this->required_params = [
            'id' => 1,
        ];

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
            'categories' => $this->obj_category->pluckSelect()
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

        if ($this->obj_validator->validate($input)) {

            //Update existing item
            if (!empty($id) && is_int($id)) {

                $category = $this->obj_category->find($id);

                if (!empty($category)) {

                    $input['id'] = $id;
                    $category = $this->obj_category->updateItem($input);

                    //Message
                    return Redirect::route("categories.edit", ["id" => $category->id])
                                    ->withMessage('11');
                }

            //Add new item
            } else {

                $category = $this->obj_category->insertItem($input);
                if (!empty($category)) {

                    //Message
                    return Redirect::route("categories.edit", ["id" => $category->id])
                                    ->withMessage('aa');
                }
            }
        } else {
            $errors = $this->obj_validator->getErrors();
            // passing the id incase fails editing an already existing item
            return Redirect::route("categories.edit", $id ? ["id" => $id]: [])->withInput()->withErrors($errors);
        }

        $this->data_view = array_merge($this->data_view, array(
            'category' => $category,
            'request' => $request,
                ), $data);

        return view('package-category::admin.category-edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $category = NULL;
        $id = $request->get('id');

        if (!empty($id)) {
            $category = $this->obj_category->find($id);

            if (!empty($category)) {
                $category->delete();
                return Redirect::route("categories.list")->withMessage(trans('category-admin.delete-successful'));
            }
        }
        return Redirect::route("categories.list")->withMessage(trans('category-admin.delete-unsuccessful'));
    }
}
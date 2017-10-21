<?php namespace Foostart\Sample\Controllers\Admin;

use Illuminate\Http\Request;
use Foostart\Sample\Controllers\Admin\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Sample\Models\SamplesCategories;
/**
 * Validators
 */
use Foostart\Sample\Validators\SampleCategoryAdminValidator;

class SampleCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_sample_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_sample_category = new SamplesCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_sample_category = $this->obj_sample_category->get_samples_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'samples_categories' => $list_sample_category,
            'request' => $request,
            'params' => $params
        ));
        return view('sample::sample_category.admin.sample_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $sample = NULL;
        $sample_id = (int) $request->get('id');


        if (!empty($sample_id) && (is_int($sample_id))) {
            $sample = $this->obj_sample_category->find($sample_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'sample' => $sample,
            'request' => $request
        ));
        return view('sample::sample_category.admin.sample_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new SampleCategoryAdminValidator();

        $input = $request->all();

        $sample_id = (int) $request->get('id');

        $sample = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($sample_id) && is_int($sample_id)) {

                $sample = $this->obj_sample_category->find($sample_id);
            }

        } else {
            if (!empty($sample_id) && is_int($sample_id)) {

                $sample = $this->obj_sample_category->find($sample_id);

                if (!empty($sample)) {

                    $input['sample_category_id'] = $sample_id;
                    $sample = $this->obj_sample_category->update_sample_category($input);

                    //Message
                    $this->addFlashMessage('message', trans('sample::sample_admin.message_update_successfully'));
                    return Redirect::route("admin_sample_category.edit", ["id" => $sample->sample_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('sample::sample_admin.message_update_unsuccessfully'));
                }
            } else {

                $sample = $this->obj_sample_category->add_sample_category($input);

                if (!empty($sample)) {

                    //Message
                    $this->addFlashMessage('message', trans('sample::sample_admin.message_add_successfully'));
                    return Redirect::route("admin_sample_category.edit", ["id" => $sample->sample_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('sample::sample_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'sample' => $sample,
            'request' => $request,
        ), $data);

        return view('sample::sample_category.admin.sample_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $sample = NULL;
        $sample_id = $request->get('id');

        if (!empty($sample_id)) {
            $sample = $this->obj_sample_category->find($sample_id);

            if (!empty($sample)) {
                  //Message
                $this->addFlashMessage('message', trans('sample::sample_admin.message_delete_successfully'));

                $sample->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'sample' => $sample,
        ));

        return Redirect::route("admin_sample_category");
    }

}
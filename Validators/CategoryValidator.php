<?php namespace Foostart\Category\Validators;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Foostart\Category\Models\Category;

use Illuminate\Support\MessageBag as MessageBag;

class CategoryValidator extends AbstractValidator
{

    protected static $rules = array(
        'category_name' => ["required"],
    );

    protected static $messages = [];

    protected $obj_category;

    public function __construct()
    {
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'required' => trans('category-admin.required'),
            ];
        });
        $this->obj_category = new Category();
    }

    public function validate($input) {

        $flag = parent::validate($input);

        $this->errors = $this->errors?$this->errors:new MessageBag();

        $flag = $this->isValidName($input)?$flag:FALSE;
        $flag = $this->isValidParent($input)?$flag:FALSE;

        return $flag;
    }


    /**
     * Validation inputed category name
     * @param type $input
     * @return boolean
     */
    public function isValidName($input) {

        $flag = TRUE;

        $min_lenght = config('package-category.name_min_length');
        $max_lenght = config('package-category.name_max_length');
        $category_name = @$input['category_name'];

        if ((strlen($category_name) < $min_lenght)  || ((strlen($category_name) > $max_lenght))) {
            $this->errors->add('category_name', trans('category-admin.required_length', ['minlength' => $min_lenght, 'maxlength' => $max_lenght]));
            $flag = FALSE;
        }

        return $flag;
    }

    /**
     * Check relation between child and parent
     * @param type $input
     * @return boolean
     */
    public function isValidParent($input) {

        $flag = TRUE;
        $child_id = (int) @$input['id'];
        $parent_id = (int) @$input['category_id_parent'];

        if ( ($child_id > 0) && ($child_id == $parent_id)) {

            $this->errors->add('category_name', trans('category-admin.loop_category', [
                                                                'category_child' =>  $input['category_name'],
                                                                'category_parent' => $input['category_name']]));
            $flag = FALSE;

        } elseif ( ($child_id > 0) && ($parent_id > 0)) {

            $category_parent = $this->obj_category->find($parent_id);

            if ($category_parent) {
                $category_parent_id_parent_list = json_decode($category_parent->category_id_parent_str);

                if (isset($category_parent_id_parent_list->$child_id)) {
                    $this->errors->add('category_name', trans('category-admin.loop_category', [
                                                                'category_child' => $input['category_name'],
                                                                'category_parent' => $category_parent['category_name']]));
                    $flag = FALSE;
                }
            }

        }
        return $flag;

    }
}
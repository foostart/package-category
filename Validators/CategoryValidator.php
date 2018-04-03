<?php namespace Foostart\Category\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;
use Foostart\Category\Models\Category;

use Illuminate\Support\MessageBag as MessageBag;

class CategoryValidator extends FooValidator
{

    protected $obj_item;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'category_name' => ["required"],
        ];

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'category_name.required' => trans('category-admin.errors.required', ['attribute' => 'category name']),
            ];
        });

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_item = new Category();
    }

    /**
     *
     * @param ARRAY $input is form data
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);
       
        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){
        $configs = [
            'min_lenght' => config('package-category.name_category_min_length'),
            'max_lenght' => config('package-category.name_category_max_length'),
        ];

        return $configs;
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
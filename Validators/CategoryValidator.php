<?php namespace Foostart\Category\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \Foostart\Acl\Library\Validators\AbstractValidator;
use Foostart\Category\Models\Category;

use Illuminate\Support\MessageBag as MessageBag;

class CategoryValidator extends FooValidator
{

    protected $obj_category;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'category_name' => ["required"],
            'category_overview' => ["required"],
            'category_description' => ["required"],
        ];

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_category = new Category();

        // language
        $this->lang_front = 'category-front';
        $this->lang_admin = 'category-admin';

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'category_name.required'          => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.name')]),
                'category_overview.required'      => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.overview')]),
                'category_description.required'   => trans($this->lang_admin.'.errors.required', ['attribute' => trans($this->lang_admin.'.fields.description')]),
            ];
        });


    }

    /**
     *
     * @param ARRAY $input is form data
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);
        $this->errors = $this->errors ? $this->errors : new MessageBag();

        //Check length
        $_ln = self::$configs['length'];

        $params = [
            'name' => [
                'key' => 'category_name',
                'label' => trans($this->lang_admin.'.fields.name'),
                'min' => $_ln['category_name']['min'],
                'max' => $_ln['category_name']['max'],
            ],
            'overview' => [
                'key' => 'category_overview',
                'label' => trans($this->lang_admin.'.fields.overview'),
                'min' => $_ln['category_overview']['min'],
                'max' => $_ln['category_overview']['max'],
            ],
            'description' => [
                'key' => 'category_description',
                'label' => trans($this->lang_admin.'.fields.description'),
                'min' => $_ln['category_description']['min'],
                'max' => $_ln['category_description']['max'],
            ],
        ];

        $flag = $this->isValidLength($input['category_name'], $params['name']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['category_overview'], $params['overview']) ? $flag : FALSE;
        $flag = $this->isValidLength($input['category_description'], $params['description']) ? $flag : FALSE;

        //is valid parent
        $flag = $this->isValidParent($input) ? $flag : FALSE;

        return $flag;
    }


    /**
     * Load configuration
     * @return ARRAY $configs list of configurations
     */
    public function loadConfigs(){

        $configs = config('package-category');
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

            $this->errors->add('category_id_parent', trans($this->lang_admin.'.errors.invalid-parent'));
            $flag = FALSE;

        } elseif ( ($child_id > 0) && ($parent_id > 0)) {

            $category_parent = $this->obj_category->find($parent_id);

            if ($category_parent) {
                $category_parent_id_parent_list = json_decode($category_parent->category_id_parent_str);

                if (isset($category_parent_id_parent_list->$child_id)) {
                    $this->errors->add('category_id_parent', trans($this->lang_admin.'.errors.invalid-parent'));
                    $flag = FALSE;
                }
            }

        }
        return $flag;

    }
}
<?php namespace Foostart\Category\Validators;

use Foostart\Category\Library\Validators\FooValidator;
use Event;
use \Foostart\Acl\Library\Validators\AbstractValidator;
use Foostart\Category\Models\Context;

use Illuminate\Support\MessageBag as MessageBag;

class ContextValidator extends FooValidator
{

    protected $obj_item;

    public function __construct()
    {
        // add rules
        self::$rules = [
            'context_name' => ["required"],
        ];

        // event listening
        Event::listen('validating', function($input)
        {
            self::$messages = [
                'context_name.required' => trans('category-admin.errors.required', ['attribute' => 'category name']),
            ];
        });

        // set configs
        self::$configs = $this->loadConfigs();

        // model
        $this->obj_item = new Context();
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
            'min_lenght' => config('package-category.name_context_min_length'),
            'max_lenght' => config('package-category.name_context_max_length'),
        ];

        return $configs;
    }
}
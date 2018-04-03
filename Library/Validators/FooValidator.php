<?php namespace Foostart\Category\Library\Validators;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

use Illuminate\Support\MessageBag as MessageBag;

class FooValidator extends AbstractValidator
{

    protected static $rules = [];

    protected static $configs = '';

    protected static $messages = [];


    /**
     *
     * @param type $input
     * @return type
     */
    public function validate($input) {

        $flag = parent::validate($input);

        $this->errors = $this->errors?$this->errors:new MessageBag();
        
        return $flag;
    }


    /**
     * Check valid length string
     * @param STRING $str
     * @return BOOLEAN
     */
    public function isValidLength($element) {

        $flag = TRUE;

        $min_lenght = self::$configs['min_length'];
        $max_lenght = self::$configs['min_length'];

        if ((strlen($str) < $min_lenght)  || ((strlen($str) > $max_lenght))) {
            $this->errors->add($element['key'], trans($elment['context'].'.required_length', ['minlength' => $min_lenght, 'maxlength' => $max_lenght]));
            $flag = FALSE;
        }

        return $flag;
    }
}
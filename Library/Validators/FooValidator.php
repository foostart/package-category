<?php namespace Foostart\Category\Library\Validators;

use Event;
use \Foostart\Acl\Library\Validators\AbstractValidator;

use Illuminate\Support\MessageBag as MessageBag;

class FooValidator extends AbstractValidator
{

    protected static $rules = [];

    protected static $configs = '';

    protected static $messages = [];

    //language
    protected $lang_admin = '';

    protected $lang_front = '';

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
     * Check valid length string of element
     * Can check on: input text, textarea
     * @param STRING $str
     * @return BOOLEAN
     */
    public function isValidLength($str, $params) {

        $flag = TRUE;

        if ($params['max'] == 0) {
            if (strlen($str) < $params['min']) {

                $this->errors->add($params['key'], trans($this->lang_admin.'.errors.required_min_length', [
                                                                                    'attribute ' => $params['label'],
                                                                                    'minlength' => $params['min'],
                                                                                ]));
                $flag = FALSE;
            }
        } elseif ((strlen($str) < $params['min'])  || (strlen($str) > $params['max'])) {

            $this->errors->add($params['key'], trans($this->lang_admin.'.errors.required_length', [
                                                                                    'attribute ' => $params['label'],
                                                                                    'minlength' => $params['min'],
                                                                                    'maxlength' => $params['max'],
                                                                                ]));
            $flag = FALSE;
        }

        return $flag;
    }
}
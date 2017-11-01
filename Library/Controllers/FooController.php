<?php namespace Foostart\Category\Library\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;

class FooController extends Controller {

    //save data
    public $data_view = array();

    //validator form data
    protected $obj_validator = NULL;

    //required params
    protected $required_params = array();

}
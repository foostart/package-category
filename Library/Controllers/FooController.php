<?php namespace Foostart\Category\Library\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;

use Illuminate\Support\Facades\App;

class FooController extends Controller {

    //send data to view
    public $data_view = array();

    //validator form data
    protected $obj_validator = NULL;

    //required params
    protected $required_params = array();

    //language file
    protected $plang_admin = NULL;
    protected $plang_front = NULL;

    //package info
    protected $package_name = NULL;

    //root router
    protected $root_router = NULL;

    //package base name
    protected $package_base_name = NULL;

    //page views
    protected $page_views = [];

    //user
    protected $user = NULL;

    //category
    protected $category_ref_name = NULL;
    protected $category_ref_type = NULL;
    protected $category_ref_level = NULL;

    public function __construct() {

    }

    /**
     * //TODO: cache user info
     * Get current logged user info
     * @return ARRAY user info
     * @date 28/12/2017
     */
    public function getUser() {

        $authentication = \App::make('authenticator');
        $profile_repository = \App::make('profile_repository');

        $this->user = $authentication->getLoggedUser()->toArray();
        $this->user['user_id'] = $this->user['id'];

        $user_profile = $profile_repository->getFromUserId($this->user['id'])->toArray();

        $this->user['user_full_name'] = $user_profile['first_name'].' '.$user_profile['last_name'];

        unset($this->user['id']);
        unset($this->user['created_at']);
        unset($this->user['updated_at']);

        return $this->user;
    }

    /**
     * Check valid token
     * @param Request $request
     * @return boolean
     */
    public function isValidRequest(Request $request) {
        $flag = TRUE;
        $valid_token = csrf_token();

        $token = $request->get('_token');

        if (!strcmp($valid_token, $token) == 0) {

            $flag = FALSE;

        }
        return $flag;
    }
}
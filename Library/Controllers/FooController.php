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
    public $user_id = NULL;
    public $user_full_name = NULL;
    public $user_email = NULL;
    public $token_api = NULL;

    //category
    protected $category_ref_name = NULL;
    protected $category_ref_type = NULL;
    protected $category_ref_level = NULL;

    public $breadcrumb_1 = [];
    public $breadcrumb_2 = [];
    public $breadcrumb_3 = [];



    public function __construct() {
        /**
         * Breadcrumb
         */
        //1
        $this->breadcrumb_1 = [
            'url' => url('/'.request()->segment(1)),
        ];
        //2
        if (request()->segment(1)) {
            $this->breadcrumb_2 = [
                'url' => $this->breadcrumb_1['url'].'/'.request()->segment(2),
            ];
        }
        //3
        if (request()->segment(2)) {
            $this->breadcrumb_3 = [
                'url' =>$this->breadcrumb_2['url'].'/'.request()->segment(3),
            ];
        }
        
        /**
         * Data view
         */
        $this->data_view = array_merge($this->data_view, [
            'pagination_view' => 'pagination::bootstrap-4'
        ]);
    }

    public function setUserInfo($user) {

        $user = is_array($user) ? (object)$user : $user;

        $this->user_id = !empty($user->user_id) ? $user->user_id : NULL;
        $this->user_full_name = !empty($user->user_full_name) ? $user->user_full_name : 'Unknow';
        $this->user_email = !empty($user->user_email) ? $user->user_email : 'Unknow';
        $this->token_api = !empty($user->token_api) ? $user->token_api : NULL;

        $this->data_view = array_merge($this->data_view, array(
            'user_id' => $this->user_id,
            'user_full_name' => $this->user_full_name,
            'user_email' => $this->user_email,
            'token_api' => $this->token_api,            
        ));

        return $this->data_view;
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
     * //TODO: cache user info
     * Get current logged user info
     * @return ARRAY user info
     * @date 28/12/2017
     */
    public function hasPermissions(array $permissions) {

        $authentication = \App::make('authentication_helper');

        $flag = $authentication->hasPermission($permissions);

        return $flag;
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
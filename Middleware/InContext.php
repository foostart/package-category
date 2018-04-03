<?php namespace Foostart\Category\Middleware;

use Closure;

use Config;
use Route;
use Illuminate\Support\Facades\App;

class InContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){ return $next($request);
        //load context config
        $configs = Config::get('package-category');

        //get context_key
        $context_key = $request->get('context', NULL);

        //get route name
        $routeName = Route::currentRouteName();

        //check list page
        if (!$this->authList($routeName, $context_key, $configs)) {
            App::abort('401');
        }

        //check edit page
        if (!$this->authEdit($routeName, $context_key, $configs)) {
            App::abort('401');
        }

        //check post page
        if (!$this->authPost($routeName, $context_key, $configs)) {
            App::abort('401');
        }

        return $next($request);
    }

    /**
     * Check on list of categories
     * @param type $routeName
     * @return boolean
     */
    private function authList($routeName, $context_key, $configs){
        $flag = TRUE;
        if (strcmp($routeName, 'categories.list') == 0) {
            //check permission
            if (empty($context_key)) {

                //Just Super Admin view list of context key
                $authentication_helper = App::make('authentication_helper');

                if (!$authentication_helper->hasPermission($configs['permissions']['list_all'])) {
                    $flag = FALSE;
                }
            } else {
                $flag = $this->isValidContextKey($context_key, $configs);
            }
        }
        return $flag;
    }

    /**
     * Check on list of categories
     * @param type $routeName
     * @return boolean
     */
    private function authEdit($routeName, $context_key, $configs){
        $flag = TRUE;
        $authentication_helper = App::make('authentication_helper');

        //is edit page
        if (strcmp($routeName, 'categories.edit') == 0) {

            //check permission
            if (empty($context_key)) {

                $flag = FALSE;

            } elseif (!$this->isValidContextKey($context_key, $configs)) {
                    //check valid context key
                    $flag = FALSE;

            } elseif (!$authentication_helper->hasPermission($configs['permissions']['edit'])) {

                    $flag = FALSE;
            }
        }
        return $flag;
    }

    /**
     * Check on list of categories
     * @param type $routeName
     * @return boolean
     */
    private function authPost($routeName, $context_key, $configs){

        $flag = TRUE;
        $authentication_helper = App::make('authentication_helper');

        //is edit page
        if (strcmp($routeName, 'categories.post') == 0) {

            //check permission
            if (empty($context_key)) {

                $flag = FALSE;

            } elseif (!$this->isValidContextKey($context_key, $configs)) {
                    //check valid context key
                    $flag = FALSE;

            } elseif (!$authentication_helper->hasPermission($configs['permissions']['edit'])) {

                    $flag = FALSE;
            }
        }

        return $flag;
    }


    /**
     *
     * @param type $key
     * @param type $contexts
     */
    private function isValidContextKey($key, $configs) {

        //valid context key
        $flag = TRUE;
        $validKeys = [];
        $contexts = $configs['contexts'];

        foreach ($contexts as $context) {
            $validKeys[] = $context['key'];
        }
        if (!in_array($key, $validKeys)) {
            $flag = FALSE;
        }

        return $flag;
    }
}
<?php namespace Foostart\Category\Helpers;

use Foostart\Category\Models\Category;
use Config;

class FooCategory {

    private $obj_category;

    public function __construct() {
        $this->obj_category = new Category();
    }

    /**
     * Get list of categories
     * @param type $params
     * @return type
     */
    public function pluckSelect($params){

        $select_category_list = $this->obj_category->pluckSelect($params);
        $select_category_list = $select_category_list->toArray();
        $select_category_list[''] = trans('category-admin.all');
        return $select_category_list;

    }

    /**
     * Get key of context
     * @param type $context
     * @return boolean
     */
    public function getContextKey($context) {

        $configs =  Config::get('package-category');
        $contexts = $configs['contexts'];

        if ( (!empty($contexts[$context])) && (!empty($contexts[$context]['key']))) {
            return $contexts[$context]['key'];
        }

        return FALSE;
    }
}
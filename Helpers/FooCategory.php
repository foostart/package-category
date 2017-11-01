<?php namespace Foostart\Category\Helpers;

use Foostart\Category\Models\Category;

class FooCategory {

    private $obj_category;

    public function __construct() {
        $this->obj_category = new Category();
    }

    public function pluckSelect(){
        $select_category_list = $this->obj_category->pluckSelect();
        $select_category_list = $select_category_list->toArray();
        $select_category_list[''] = trans('category-admin.all');
        return $select_category_list;
    }

}
<?php namespace Foostart\Category\Helpers;

use Foostart\Category\Models\Category;
use Foostart\Category\Models\Context;
use Config;

class FooCategory {

    //Object categories
    private $obj_category;

    //Object contexts
    private $obj_context;

    /**
     * Constructor
     */
    public function __construct() {

        //Object categories
        $this->obj_category = new Category();

        //Object contexts
        $this->obj_context = new Context();
    }

    /**
     * Get list of categories
     * @param ARRAY $params array of conditions
     * @return OBJECT list of categories in select format
     */
    public function pluckSelect($params){

        $select_category_list = $this->obj_category->pluckSelect($params);

        $select_category_list = array('' => trans('category-admin.columns.any')) + $select_category_list->toArray();

        return $select_category_list;
    }

    /**
     * Get key of context by reference name
     * @param STRING reference name
     * @return STRING context key
     */
    public function getContextKeyByRef($ref) {

        $params = ['ref' => $ref];
        $context = $this->obj_context->selectItem($params);
        $key = NULL;
        if ($context) {
            $key = $context->context_key;
        }
        return $key;
    }

    /**
     *
     * @param STRING $ref context reference name
     * @return ELOQUENT OBJECT category
     */
    public function getCategoriesByRef($ref, $params = array()) {

        $categories = [];

        //get context by context ref
        $_params = [
            'ref' => $ref
        ];
        $context = $this->obj_context->selectItem($_params);

        if (!empty($context)) {
            //get categories by context id
            $_params = [
                'context_id' => $context->context_id,
                'category_status' => $this->obj_category->status['publish']
            ];

            //category slug
            if (!empty($params['category_slug'])) {
                $_params['category_slug'] = $params['category_slug'];
            }

            //order
            if (!empty($params['order'])) {
                $_params['order'] = $params['order'];
            }
            $categories = $this->obj_category->selectItems($_params);
        }

        return $categories;
    }

    /**
     *
     * @param INT $category_id_parent
     * @return OBJECT list of childs of parent category
     */
    public function getCategoriesByIdParent($category_id_parent, $params = array()) {
        return $this->obj_category->getCategoriesByIdParent($category_id_parent, $params);
    }
}
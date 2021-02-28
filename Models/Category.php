<?php namespace Foostart\Category\Models;

use Foostart\Category\Library\Models\FooModel;
use Illuminate\Database\Eloquent\Model;
use Foostart\Category\Models\Context;

class Category extends FooModel {

     public $courses = NULL;

    public $isTree;
    /**
     * @table Categories
     * @param ARRAY $attributes
     */
    public function __construct(array $attributes = array()) {
        //set configurations
        $this->setConfigs();

        parent::__construct($attributes);

    }

    public function setConfigs() {

        //table name
        $this->table = 'categories';

        //list of field in table
        $this->fillable = array_merge($this->fillable, [            
            'category_name',
            'category_order',
            'category_url',
            'category_icon',
            'category_slug',
            'category_overview',
            'category_description',
            'category_image',            
            'category_id_parent',
            'category_id_parent_str',
            'category_id_child_str',
            //Relation
            'created_user_id',
            'updated_user_id',
            'context_id',
        ]);


        //list of fields for inserting
        $this->fields = array_merge($this->fields, [
            'category_name' => [
                'name' => 'category_name',
                'type' => 'Text',
            ],
            'category_order' => [
                'name' => 'category_order',
                'type' => 'Int',
            ],
            'category_url' => [
                'name' => 'category_url',
                'type' => 'Text',
            ],
            'category_overview' => [
                'name' => 'category_overview',
                'type' => 'Text',
            ],
            'category_description' => [
                'name' => 'category_description',
                'type' => 'Text',
            ],
            'category_slug' => [
                'name' => 'category_slug',
                'type' => 'Text',
            ],
            'category_icon' => [
                'name' => 'category_icon',
                'type' => 'Text',
            ],
            'category_id_parent' => [
                'name' => 'category_id_parent',
                'type' => 'Int',
            ],
            'category_image' => [
                'name' => 'category_image',
                'type' => 'Text',
            ],
            //Relation
            'context_id' => [
                'name' => 'context_id',
                'type' => 'Int',
            ],
        ]);

        //check valid fields for inserting
        $this->valid_insert_fields = array_merge($this->valid_insert_fields, [
            //category info
            'category_name',
            'category_order',
            'category_url',
            'category_icon',
            'category_slug',
            'category_overview',
            'category_description',
            'category_image',
            'category_id_parent',
            'category_id_parent_str',
            //relation
            'context_id',
        ]);

        //check valid fields for ordering
        $this->valid_ordering_fields = [
            'category_name',
            'category_key',
            $this->field_status,
        ];

        //check valid fields for filter
        $this->valid_filter_fields = [
            'keyword',
            'context_id',
            'status',
            'order',
            'category_slug',
            '_key',
        ];

        //primary key
        $this->primaryKey = 'category_id';

        //build category tree
        $this->isTree = TRUE;

    }

    /**
     * Gest list of items
     * @param type $params
     * @return object list of categories
     */
    public function selectItems($params = array(), $key = NULL, $value = NULL) {

        //join to another tables
        $elo = $this->joinTable($params);

        //search filters
        $elo = $this->searchFilters($params, $elo);

        if ($key && $value) {
            $elo = $elo->where($key, $value);
        }

        //select fields
        $elo = $this->createSelect($elo);

        //order filters
        $elo = $this->orderingFilters($params, $elo);

        //paginate items
        $items = $this->paginateItems($params, $elo);

        //build category tree structure
        if ($this->isTree) {
            $items = $this->getChilds($items, $params);
        }

        return $items;
    }

    /**
     * Get a category by {id, context}
     * @param ARRAY $params
     * @return object category
     */
    public function selectItem($params = array(), $key = NULL, $value = NULL) {

        $this->isTree = FALSE;
        if (empty($key)) {
            $key = $this->primaryKey;
        }
       //join to another tables
        $elo = $this->joinTable($params);

        //search filters
        $elo = $this->searchFilters($params, $elo);

        //select fields
        $elo = $this->createSelect($elo);

        //id
        if (!empty($params['id'])) {

            $elo = $elo->where($key, $value?$value:$params['id']);

        } elseif ($key && $value) {

            $elo = $elo->where($key, $value);
        }

        //first item
        $item = $elo->first();

        return $item;
    }

    /**
     *
     * @param ARRAY $params
     * @return ELOQUENT OBJECT
     */
    protected function joinTable(array $params = []){

        $elo = $this;

        if (!empty($params['_key'])) {
            $elo = $elo->join('contexts', 'categories.context_id','=', 'contexts.context_id');
        }

        return $elo;
    }

    /**
     *
     * @param ARRAY $params
     * @return ELOQUENT OBJECT
     */
    protected function searchFilters($params = [], $elo){

        if($this->isValidFilters($params))
        {
            foreach($params as $column => $value)
            {
                if($this->isValidValue($value))
                {
                    switch($column)
                    {
                        case 'id':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.id', '=', $value);
                            }
                            break;
                        case 'context_id':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.context_id', '=', $value);
                            }
                            break;

                        case 'category_name':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.category_name', '=', $value);
                                $this->isTree = FALSE;
                            }
                            break;
                        case 'category_slug':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.category_slug', '=', $value);
                                $this->isTree = FALSE;
                            }
                            break;
                        case 'status':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.category_status', '=', $value);
                            }
                            break;
                        case 'keyword':
                            if (!empty($value)) {
                                $elo = $elo->where(function($elo) use ($value) {
                                    $elo->where($this->table . '.category_name', 'LIKE', "%{$value}%");
                                });
                                $this->isTree = FALSE;
                            }
                            break;
                        case '_key':
                            if (!empty($value)) {
                               $elo = $elo->where('contexts.context_key', '=', $value);
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
            //build category tree
            if ($this->isTree) {
                $elo = $elo->whereNull($this->table . '.category_id_parent');
            }
        }

        return $elo;
    }

    /**
     *
     * @param ELOQUENT OBJECT
     * @return ELOQUENT OBJECT
     */
    public function createSelect($elo) {

        $elo = $elo->select($this->table . '.*',
                            $this->table . '.category_id as id'
                );

        return $elo;
    }

    /**
     *
     * @param ARRAY $params
     * @return ELOQUENT OBJECT
     */
    public function paginateItems($params = [], $elo) {
        $items = $elo->paginate($this->perPage);

        //build category tree
        if ($this->isTree) {
            foreach ($items as $key => $item) {
                $items[$key]->val = 1;
            }
        }
        return $items;
    }

    /**
     * Update item
     * @param ARRAY $params
     * @return ELOQUENT OBJECT category
     */
    public function updateItem($params = []) {

        $_params = [];
        $item = $this->find($params['id']);

        if (!empty($item) && !empty($item->toArray())) {

            $dataFields = $this->getDataFields($params, $this->fields);

            //update category id parent string
            $dataFields['category_id_parent_str'] = $this->_getIdParentStr($_params, $params['category_id_parent']);

            //unset unnessesary index
            unset($dataFields['context_id']);

            if(empty($dataFields['category_order'])) {
                $dataFields['category_order'] = $item->category_id;
            }

            foreach ($dataFields as $key => $value) {
                $item->$key = $value;
            }

            $item->save();

            //update child
            $this->_updateItemChild($params, $item);

            //add new attribute
            $item->id = $item->category_id;

            return $item;

        }

        return FALSE;
    }

    /**
     * Return list of category id parent of item
     * @param ARRAY $params
     * @param INT $category_id_parent
     * @return JSON list of category id
     */
    private function _getIdParentStr($params, $category_id_parent) {

        $category_id_parent_str = NULL;

        if (!empty($category_id_parent)) {

            $this->isTree = false;
            $_params = [];
            $parent = $this->selectItem($_params, 'category_id', $category_id_parent);

            if ($parent && !empty($parent->toArray())) {
                $category_id_parent_str = array($parent->category_id => 1);

                if ($parent->category_id_parent_str) {

                    $category_id_parent_str_sub = json_decode($parent->category_id_parent_str);
                    $category_id_parent_str += (array) $category_id_parent_str_sub;
                }

                $category_id_parent_str = json_encode($category_id_parent_str);
            }
        }

        return $category_id_parent_str;
    }

    /**
     * Update category_id_parent_str of list of childs of item
     * @param ELOQUENT OBJECT $parent
     */
    private function _updateItemChild($params, $parent) {

        if (!empty($parent)) {
            $childs = self::where('category_id_parent', $parent->category_id)->get();

            if (!empty($childs->toArray())) {

                foreach ($childs as $category) {

                    $category_id_parent_str = array($parent->category_id => 1);

                    if ($parent->category_id_parent_str) {

                        $category_id_parent_str_sub = json_decode($parent->category_id_parent_str);
                        $category_id_parent_str += (array) $category_id_parent_str_sub;

                    }
                    $category->category_id_parent_str = json_encode($category_id_parent_str);

                    $category->save();

                    $this->_updateItemChild($params, $category);

                }
            }
        }
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return OBJECT category
     */
    public function insertItem($params = []) {

        $dataFields = $this->getDataFields($params, $this->fields);

        //update category id parent string of item
        $dataFields['category_id_parent_str'] = $this->_getIdParentStr($params, $params['category_id_parent']);

        //get context id from key
        $context = $this->getContext($params);

        //set context id
        if ($context) {
            $dataFields['context_id'] = $context->context_id;
        }

        //create new record
        $item = self::create($dataFields);

        if (empty($dataFields['category_order'])) {
            $item->category_order = $item->category_id;
            $item->save();
        }
        $key = $this->primaryKey;
        $item->id = $item->$key;

        //set childs for category parent
        if ($params['category_id_parent']) {
            $this->setChilds($params['category_id_parent']);
        }

        return $item;
    }

    /**
     * Get list of categories into select
     * @return OBJECT PLUCK SELECT
     */
     public function pluckSelect($params) {

         $elo = self::orderBy('category_name', 'ASC');

         //context
         $context = $this->getContext($params);

         if ($context) {
             $elo = $elo->where($this->table.'.context_id', $context->context_id);
         }

         $items = $elo->pluck('category_name', $this->primaryKey);

        return $items;
    }

    /**
     *
     * @param ARRAY $input list of parameters
     * @param ELOQUENT OBJECT $category
     * @return BOOLEAN
     */
    public function deleteItem($input = []) {

        $category = $this->selectItem($input);

        if ($category) {
            return $category->delete();
        }
        return FALSE;
    }

    /**
     * Get list of childs of item
     * @param ELOQUENT OBJECT $categories
     * @return ELOQUENT OBJECT
     */
    public function getChilds($items, $params = array()) {

        foreach ($items as $key => $item) {

            $parent_pattern = '"'.$item->id.'":1';

            $elo = self::select($this->table . '.*',
                                $this->table . '.category_id as id')
                            ->where('category_id_parent_str', 'LIKE',  "%{$parent_pattern}%");

            //by category
            if (!empty($params['status'])) {
                $elo->where('category_status', '=', $params['status']);
            }

            //order by order
            if (!empty($params['order'])) {
                foreach ($params['order'] as $_key => $_value) {

                    $elo->orderBy($_key, $_value);

                }
            }

            $childs = $elo->get();


            if ($childs) {
                $items[$key]->childs =  $this->buildTree($item->id, $childs);
            }
        }

        return $items;
    }

    /**
     *
     * @param INT $category_id
     * @param ELOQUENT OBJECT $categories list of categories
     * @return ELOQUENT OBJECT list of category structure
     */
    public function buildTree($category_id, $categories) {
        $childs = array();
        foreach ($categories as $category) {
            if ($category->category_id_parent == $category_id) {
                $category->childs = $this->buildTree($category->id, $categories);
                $childs[] = $category;
            }
        }
        return $childs;
    }

    /**
     * Get list of child id category of item
     * @param STRING $category_id_parent
     * @return ARRAY list of ids
     */
    public function getIdChilds($category_id_parent) {

        $parent_pattern = '"'.$category_id_parent.'":1';
        $obj_category = self::where('category_id_parent_str', 'LIKE',  "%{$parent_pattern}%")->get();

        $id_childs = [$category_id_parent];
        if ($obj_category) {
            foreach ($obj_category as $category) {
                $id_childs[] = $category->id;
            }
        }
        return $id_childs;
    }

    /**
     * Get context by key from `contexts` table
     * @param STRING $key
     * @return ELOQUENT OBJECT context
     */
    public function getContext($params) {
        $obj_context = new Context();

        $context = $obj_context->selectItem($params);

        return $context;
    }

    /**
     * Get categories by category id parent
     * @param INT $category_id_parent
     * @return OBJECT list of categories
     */
    public function getCategoriesByIdParent($category_id_parent, $params = array()) {

        $parent = self::find($category_id_parent);

        if ($parent) {
            $parent->id = $parent->category_id;
            $parent = $this->getChilds([$parent], $params);
            if (isset($parent[0])) {
                $parent = $parent[0];
            }
        }

        return $parent;
    }

    public function getCategoryById($id) {
        $category = self::find($id);

        return $category;
    }

    /**
     * Recurse function
     * Set childs for parent category
     * @param type $category_id
     */
    public function setChilds($category_id) {

        $category = self::find($category_id);
        if ($category) {
            //get list of childs
            $childs = self::where('category_id_parent', $category_id)->get();

            if (!empty($childs)) {
                $list_id_childs = [];
                foreach ($childs as $child) {
                    $_id_childs = [$child->category_id => 1];
                    if (!empty($child->category_id_child_str)) {
                        $_id_childs_sub = json_decode($child->category_id_child_str);
                        $_id_childs += (array) $_id_childs_sub;
                    }

                    $list_id_childs += $_id_childs;
                }

                if (!empty($list_id_childs)) {
                    $category->category_id_child_str = json_encode($list_id_childs);
                    $category->save();
                }
            }
            //recurse parent of category
            if (!empty($category->category_id_parent)) {
                $parent = self::find($category->category_id_parent);
                if (!empty($parent)) {
                    $this->setChilds($parent->category_id);
                }
            }
        }
        return $category;
    }

}
<?php namespace Foostart\Category\Models;

use Foostart\Category\Library\Models\FooModel;
use Illuminate\Database\Eloquent\Model;

class Category extends FooModel {

    //table name
    protected $table = 'categories';

    //update record
    public $timestamps = false;

    //list of field in table
    protected $fillable = [
        'category_name',
        'category_id_parent',
        'category_id_parent_str',
        'user_id',
        'category_context',
        'link',
        'status',
        'del_flag',
    ];

    //list of field in form
    protected $fields = [
        'category_name' => 'category_name',
        'category_id_parent' => 'category_id_parent',
        'category_id_parent_str' => 'category_id_parent_str',
        'user_id' => 'user_id',
        'category_context' => 'category_context',
        'link' => 'link',
        'status' => 'status',
        'del_flag' => 'del_flag',
    ];


    protected $valid_ordering_fields = ['id', 'category_name'];

    //Check filter name is valid
    protected $valid_fields_filter = ['id', 'category_name'];
    //primary key
    protected $primaryKey = 'id';

    //the number of items on page
    protected $perPage = 100;

    //is building category tree
    protected $isTree = TRUE;


    /**
     * @table categories
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);

    }

    /**
     * Gest list of items
     * @param type $params
     * @return array
     */
    public function selectItems($params = array()) {

        //join to another tables
        $elo = $this->joinTable();

        //search filters
        $elo = $this->searchFilters($params, $elo);

        //select fields
        $elo = $this->createSelect($elo);

        //order filters
        $elo = $this->orderingFilters($params, $elo);

        //paginate items
        $items = $this->paginateItems($params, $elo);

        //build category tree (parent-child)
        if ($this->isTree) {
            $items = $this->getChilds($items);
        }
        return $items;
    }

    public function selectItem($params = array()) {

        $item = $this->find($params['id']);
        return $item;
    }

    /**
     *
     * @param array $params
     * @return eloquent object
     */
    protected function joinTable(array $params = []){
        return $this;
    }

    /**
     *
     * @param array $params
     * @return eloquent object
     */
    protected function searchFilters(array $params = [], $elo){

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

                        case 'category_name':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.category_name', '=', $value);
                                $this->isTree = FALSE;
                            }
                            break;
                        case 'keyword':
                            if (!empty($value)) {
                                $elo = $elo->where(function($elo) use ($value) {
                                    $elo->where($this->profile_table_name . '.id', 'LIKE', "%{$value}%")
                                    ->orWhere($this->profile_table_name . '.category_name','LIKE', "%{$value}%");
                                });
                                $this->isTree = FALSE;
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
     * @param eloquent object
     * @return eloquent object
     */
    public function createSelect($elo) {

        $elo = $elo->select(
               $this->table . '.*'
        );

        return $elo;
    }

    /**
     *
     * @param array $params
     * @return eloquent object
     */
    public function paginateItems(array $params = [], $elo) {
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
     *
     * @param type $input
     * @param type $id
     * @return type
     */
    public function updateItem($input = []) {

        if (empty($id)) {
            $id = $input['id'];
        }

        $category = self::find($id);

        if (!empty($category)) {

            $category->category_name = $input['category_name'];
            $category->category_id_parent = $input['category_id_parent'];

            if (!empty($input['category_id_parent'])) {

                $category_parent = self::find($input['category_id_parent']);

                $category_id_parent_list = array($category_parent->id => 1);

                if ($category_parent->category_id_parent_str) {
                    $category_id_parent_list_sub = json_decode($category_parent->category_id_parent_str);
                    $category_id_parent_list += (array)$category_id_parent_list_sub;
                }
                $category->category_id_parent_str = json_encode($category_id_parent_list);
            } else {
                $category->category_id_parent_str = null;
            }
            $category->save();

            //update child
            $this->updateItemChild($category);
            return $category;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $category_parent
     */
    public function updateItemChild($category_parent) {

        $obj_category = self::where('category_id_parent', $category_parent->id)->get();

        if ($obj_category) {
            foreach ($obj_category as $category) {

                $category_id_parent_list = array($category_parent->id => 1);

                if ($category_parent->category_id_parent_str) {
                    $category_id_parent_list_sub = json_decode($category_parent->category_id_parent_str);
                    $category_id_parent_list += (array) $category_id_parent_list_sub;
                }
                $category->category_id_parent_str = json_encode($category_id_parent_list);
                $category->save();

                $this->updateItemChild($category);
            }
        }
    }


    /**
     *
     * @param type $input
     * @return type
     */
    public function insertItem($input = []) {
        $category = self::create([
                    'category_name' => $input['category_name'],
        ]);
        return $category;
    }

    /**
     * Get list of categorys categories
     * @param type $id
     * @return type
     */
     public function pluckSelect($id = NULL) {
        if ($id) {
            $categories = self::where('id', '!=', $id)
                    ->orderBy('category_name', 'ASC')
                ->pluck('category_name', 'id');
        } else {
            $categories = self::orderBy('category_name', 'ASC')
                ->pluck('category_name', 'id');
        }
        return $categories;
    }

    public function deleteItem($input = []) {

    }

    /**
     *
     * @param type $categories
     * @return type
     */
    public function getChilds($categories) {

        foreach ($categories as $key => $category) {

            $parent_pattern = '"'.$category->id.'":1';

            $obj_category = self::where('category_id_parent_str', 'LIKE',  "%{$parent_pattern}%")->get();

            if ($obj_category) {
                $categories[$key]->childs =  $this->buildTree($category->id, $obj_category);
            }
        }
        
        return $categories;
    }

    /**
     *
     * @param type $category_id
     * @param type $categories
     * @return type
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
}

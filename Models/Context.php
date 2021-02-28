<?php namespace Foostart\Category\Models;

use Foostart\Category\Library\Models\FooModel;
use Illuminate\Database\Eloquent\Model;

class Context extends FooModel {

    /**
     * @table Contexts
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {
        //set configurations
        $this->setConfigs();

        parent::__construct($attributes);

    }

    public function setConfigs() {

        //table name
        $this->table = 'contexts';

        //list of field in table
        $this->fillable = [
            'context_name',
            'context_key',
            'context_ref',            
            'context_notes',
            'status',
            'created_user_id',
            'updated_user_id',
            'created_at',
            'updated_at',
        ];

        //list of fields for inserting
        $this->fields = [
            'context_name' => [
                'name' => 'context_name',
                'type' => 'Text',
            ],
            'context_key' => [
                'name' => 'context_key',
                'type' => 'Text',
            ],
            'context_ref' => [
                'name' => 'context_ref',
                'type' => 'Text',
            ],
            'status' => [
                'name' => 'context_status',
                'type' => 'Int',
            ],
            'context_notes' => [
                'name' => 'context_notes',
                'type' => 'Text',
            ],
            'created_user_id' => [
                'name' => 'user_id',
                'type' => 'Int',
            ],
            'updated_user_id' => [
                'name' => 'user_id',
                'type' => 'Int',
            ],
        ];

        //check valid fields for inserting
        $this->valid_insert_fields = [
            'context_name',
            'context_key',
            'context_ref',
            'status',
            'created_user_id',       
            'updated_user_id',       
            'updated_at',
        ];

        //check valid fields for ordering
        $this->valid_ordering_fields = [
            'context_name',
            'context_key',
            'context_ref',
            'status',
            $this->field_status,
        ];

        //check valid fields for filter
        $this->valid_filter_fields = [
            'keyword',
            'name',
            'context_id',
            'ref',
            '_key',
            'status',
        ];

        //primary key
        $this->primaryKey = 'context_id';

        //the number of items on page
        $this->perPage = 10;

        //item status
        $this->field_status = 'status';
    }

    /**
     * Gest list of items
     * @param type $params
     * @return object list of categories
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

        return $items;
    }

    /**
     * Get a category by {id}
     * @param ARRAY $params list of parameters
     * @return OBJECT category
     */
    public function selectItem($params = array(), $key = NULL) {

        if (empty($key)) {
            $key = $this->primaryKey;
        }
        //id and context_id are the same
        if (!empty($params['id']) && (!empty($params['context_id']))) {
            unset($params['id']);
        }
        //id and _key are the same
        if (!empty($params['id']) && (!empty($params['_key']))) {
            unset($params['id']);
        }
        //id is NULL, unset status
        if (empty($params['id'])) {
            unset($params['status']);
        }

       //join to another tables
        $elo = $this->joinTable();

        //search filters
        $elo = $this->searchFilters($params, $elo);

        //select fields
        $elo = $this->createSelect($elo);

        //id
        if (!empty($params['id'])) {
            $elo = $elo->where($this->primaryKey, $params['id']);
        }

        //first item
        $item = $elo->first();
        return $item;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    protected function joinTable(array $params = []){
        return $this;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    protected function searchFilters(array $params = [], $elo){

        //filter
        if ($this->isValidFilters($params) && (!empty($params)))
        {
            foreach($params as $column => $value)
            {
                if($this->isValidValue($value))
                {
                    switch($column)
                    {
                        case 'context_id':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.context_id', '=', $value);
                            }
                            break;
                        case 'context_name':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.context_name', '=', $value);
                            }
                            break;

                        case 'ref':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.context_ref', 'LIKE', "%{$value}%");
                            }
                            break;
                        case '_key':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.context_key', '=', $value);
                            }
                            break;

                        case 'status':
                            if (!empty($value)) {
                                $elo = $elo->where($this->table . '.'.$this->field_status, '=', $value);
                            }
                            break;

                        case 'keyword':
                            if (!empty($value)) {
                                $elo = $elo->where(function($elo) use ($value) {
                                    $elo->where($this->table . '.context_name', 'LIKE', "%{$value}%")
                                    ->orWhere($this->table . '.context_key','LIKE', "%{$value}%");
                                });
                            }
                            break;

                        default:
                            break;
                    }
                }
            }//end foreach
        }

        return $elo;
    }

    /**
     * Select list of columns in table
     * @param ELOQUENT OBJECT
     * @return ELOQUENT OBJECT
     */
    public function createSelect($elo) {

        $elo = $elo->select($this->table . '.*',
                            $this->table . '.context_id as id'
                );

        return $elo;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ELOQUENT OBJECT
     */
    public function paginateItems(array $params = [], $elo) {
        $items = $elo->paginate($this->perPage);

        return $items;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @param INT $id is primary key
     * @return type
     */
    public function updateItem($params = [], $id = NULL) {

        $field_status = $this->field_status;

        $item = $this->selectItem($params);

        if (!empty($item)) {
            $dataFields = $this->getDataFields($params, $this->fields);

            if(isset($dataFields['context_key'])) {
                $dataFields['context_key'] = $this->generateContextKey();
            }else {
                unset($dataFields['context_key']);
            }

            foreach ($dataFields as $key => $value) {
                $item->$key = $value;
            }

            $item->save();

            return $item;
        } else {
            return NULL;
        }
    }


    /**
     *
     * @param ARRAY $params list of parameters
     * @return OBJECT category
     */
    public function insertItem($params = []) {

        $dataFields = $this->getDataFields($params, $this->fields);
        $dataFields['context_key'] = $this->generateContextKey();
        
        $item = self::create($dataFields);

        $key = $this->primaryKey;
        $item->id = $item->$key;
        return $item;
    }


    /**
     *
     * @param ARRAY $input list of parameters
     * @return boolean TRUE incase delete successfully otherwise return FALSE
     */
    public function deleteItem($input = [], $delete_type) {

        $item = $this->find($input['id']);

        if ($item) {
            switch ($delete_type) {
                case 'delete-trash':
                    return $item->fdelete($item);
                    break;
                case 'delete-forever':
                    return $item->delete();
                    break;
            }

        }

        return FALSE;
    }

    /**
     * Generate context key
     */
    private function generateContextKey(){
        $context_key = substr(md5(time().rand(1,99999)),rand(1,10),29);
        return $context_key;
    }

}
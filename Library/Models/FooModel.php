<?php

namespace Foostart\Category\Library\Models;

use App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

use Foostart\Category\Models\Context;

class FooModel extends Model {


    protected $prefix_table = '';

    protected $prefix_column = '';

    protected $table = NULL;

    public $timestamps = TRUE;

    protected $fillable = [];

    protected $fields = [];

    protected $valid_insert_fields = [];

    protected $valid_ordering_fields = [];
    protected $valid_filter_fields = [];

    protected $primaryKey = [];

    protected $perPage = 10;

    public static $multiple_ordering_separator = ",";

    protected $field_status = 'status';

    protected $status = NULL;

    protected $obj_context = NULL;

    /**
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->status = config('foostart.item.status');
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @return ARRAY OBJECT list of items
     */
    public function selectItems($params = []) {
        $items = [];
        return $items;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @param OBJECT $item
     */
    public function selectItem($params = [], $key = NULL) {

    }



    /**
     * @return mixed
     */
    protected function createTableJoins($params)
    {
    }

    /**
     * @param array $input_filter
     * @param       $q
     * @param       $user_table
     * @param       $profile_table
     * @pram        $group_table
     * @return mixed
     */
    private function applySearchFilters(array $input_filter = null, $q)
    {

        return $q;
    }

    /**
     * TODO: UN-DONE
     * Prevent attacher for changing column name
     * @param array $filters
     * @return array list of valid filters
     */
    protected function isValidFilters(&$filters = []) {

        $flag = TRUE;

        foreach ($filters as $key => $value) {
            if (!in_array($key, $this->valid_filter_fields)) {
                unset($filters[$key]);
            }
        }

        return $flag;
    }


    /**
     * @param $value
     * @return bool
     */
    protected function isValidValue($value) {
        $flag = TRUE;
        return $flag;
    }

    /**
     * @param array $params
     * @param eloquent $elo
     * @return eloquent object
     */
    protected function orderingFilters(array $params, $elo) {

        //check empty filter
        if ($this->isNotOrderingFilter($params)) {
            return $elo;
        }

        foreach ($this->makeOrderingFilterArray($params) as $field => $ordering) {
            if ($this->isValidOrderingField($field)) {
                $elo = $this->orderByField($field, $this->guessOrderingType($ordering), $elo);
            }
        }
        return $elo;
    }

    /**
     *
     * @param string $field
     * @param string $ordering
     * @param string $elo
     * @return eloquent object
     */
    private function orderByField($field, $ordering, $elo)
    {
        return $elo->orderBy($field, $ordering);
    }

    /**
     * @param array $input_filter
     * @return bool
     */
    private function isNotOrderingFilter(array $input_filter) {
        return empty($input_filter['order_by']) || empty($input_filter['ordering']);
    }

    /**
     * @param array $params
     * @return array
     */
    private function makeOrderingFilterArray(array $params)
    {
        $order_by = explode(static::$multiple_ordering_separator, $params["order_by"]);
        $ordering = explode(static::$multiple_ordering_separator, $params["ordering"]);

        return array_combine($order_by, $ordering);
    }

    /**
     * @param $filter
     * @return bool
     */
    public function isValidOrderingField($ordering_field)
    {
        return in_array($ordering_field, $this->valid_ordering_fields);
    }

    /**
     * @param array $input_filter
     * @return string
     */
    private function guessOrderingType($ordering)
    {
        return ($ordering == 'desc') ? 'DESC' : 'ASC';
    }


    /**
     * @param int $per_page
     */
    public function setPerPage($per_page)
    {
        $this->per_page = $per_page;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->per_page;
    }

    /**
     * Get integer from parameters
     * @param ARRAY $params list of parameters
     * @return INT value
     */
    public function getInt($params, $key) {

        $value = NULL;

        if (isset($params[$key])) {
            $value = (int)$params[$key];
        }

        return $value;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @param STRING $key is field name
     * @return DATE value
     */
    public function getDate($params, $key) {
        $value = NULL;

        if (isset($params[$key])) {
            $value = (int)$params[$key];
        }

        return $value;
    }

    /**
     *
     * @param ARRAY $params list of parameters
     * @param STRING $key is field name
     * @return TEXT value
     */
    public function getText($params, $key) {
        $value = NULL;

        if (isset($params[$key])) {
            $value = $params[$key];
        }

        return $value;
    }

    /**
     *
     * @param ARRAY $params
     * @param ARRAY $fields
     * @return ARRAY fields data
     */
    public function getDataFields($params, $fields) {

        $data_fields = [];

        foreach ($fields as $key => $field) {

            $funGet = 'get'.$field['type'];
            $data_fields[$key] = $this->$funGet($params, $field['name']);
        }

        return $data_fields;
    }

    /**
     * Change status item to trash
     * @param ELOQUENT OBJECT $item
     * @return ELOQUENT OBJECT
     */
    public function fdelete($item) {

        $field_status = $this->field_status;
        $item->$field_status = $this->status['in_trash'];

        return $item->save();
    }

    /**
     * Get list of statuses to push to select
     * @return ARRAY list of statuses
     */
    public function getPluckStatus() {
       $pluck_status = config('foostart.item.pluck_status');
       return $pluck_status;
    }

    /**
     *
     * @param STRING $ref context
     * @return ELOQUENT OBJECT context
     */
    public function getContext($ref) {
        $obj_context = new Context();
        $params = [
            'ref' => $ref
        ];

        $item = $obj_context->selectItem($params);
        return $item;
    }

}

<?php

namespace Foostart\Category\Library\Models;

use App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class FooModel extends Model {


    protected $prefix_table = '';
    protected $prefix_column = '';

    public $timestamps = true;

    public static $multiple_ordering_separator = ",";


    protected $valid_ordering_fields = ['id', 'category_name'];

    //Check filter name is valid
    protected $valid_fields_filter = ['id', 'category_name'];

    public function selectItem($param = []) {

    }

    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
    }

    public function selectItems($params = []) {
        $items = [];
        return $items;
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
    protected function isValidFilters(array $filters = []) {

        $flag = TRUE;

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

}

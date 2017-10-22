<?php

namespace Foostart\Category\Models;

use Illuminate\Database\Eloquent\Model;

abstract class FooModel extends Model {

    protected $table = '';
    protected $prefix_table = '';
    protected $prefix_column = '';
    public $timestamps = false;
    protected $fillable = [];
    protected $primaryKey = '';

    public function selectItem($param = []) {

    }

    public function selectItems($params = []) {
        $items = [];
        return $items;
    }

    public function deleteItem() {

    }

    public function deleteItems() {

    }

    public function insertItem() {

    }

    public function insertItems() {

    }

    public function updateItem() {

    }

    public function updateItems() {

    }

    public function isValidColumn() {

    }

}

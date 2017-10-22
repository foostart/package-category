<?php

namespace Foostart\Category\Models;

use Foostart\Category\Models\FooModel;

class Categories extends FooModel {

    protected $table = 'categories';
    protected $prefix = 'category_';
    protected $fillable = [
        'category_name, category_description, category_status, category_del_flg, category_id_parent'
    ];
    protected $primaryKey = 'category_id';

    public function selectItems($params = array()) {
        $eloquent = self::orderBy('category_id');

        if (!empty($params['category_name'])) {
            $eloquent->where('category_name', 'like', '%'. $params['category_name'].'%');
        }
        $items = $eloquent->paginate(10);
        return $items;
    }

    /**
     *
     * @param type $input
     * @param type $category_id
     * @return type
     */
    public function updateItem($input = []) {

        if (empty($category_id)) {
            $category_id = $input['category_id'];
        }

        $category = self::find($category_id);

        if (!empty($category)) {

            $category->category_name = $input['category_name'];

            $category->save();

            return $category;
        } else {
            return NULL;
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
     * @param type $category_id
     * @return type
     */
     public function pluckSelect($category_id = NULL) {
        if ($category_id) {
            $categories = self::where('category_id', '!=', $category_id)
                    ->orderBy('category_name', 'ASC')
                ->pluck('category_name', 'category_id');
        } else {
            $categories = self::orderBy('category_name', 'ASC')
                ->pluck('category_name', 'category_id');
        }
        return $categories;
    }

}

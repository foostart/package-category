<?php

namespace Foostart\Category\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

    protected $table = 'categories';
    protected $prefix = 'category_';
    public $timestamps = false;
    protected $fillable = [
        'category_name, category_description, category_status, category_del_flg, category_id_parent'
    ];
    protected $primaryKey = 'category_id';

    public function get_categorys_categories($params = array()) {
        $eloquent = self::orderBy('category_category_id');

        if (!empty($params['category_category_name'])) {
            $eloquent->where('category_category_name', 'like', '%'. $params['category_category_name'].'%');
        }
        $categorys_category = $eloquent->paginate(10);
        return $categorys_category;
    }

    /**
     *
     * @param type $input
     * @param type $category_id
     * @return type
     */
    public function update_category_category($input, $category_id = NULL) {

        if (empty($category_id)) {
            $category_id = $input['category_category_id'];
        }

        $category = self::find($category_id);

        if (!empty($category)) {

            $category->category_category_name = $input['category_category_name'];

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
    public function add_category_category($input) {

        $category = self::create([
                    'category_category_name' => $input['category_category_name'],
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
            $categories = self::where('category_category_id', '!=', $category_id)
                    ->orderBy('category_category_name', 'ASC')
                ->pluck('category_category_name', 'category_category_id');
        } else {
            $categories = self::orderBy('category_category_name', 'ASC')
                ->pluck('category_category_name', 'category_category_id');
        }
        return $categories;
    }

}

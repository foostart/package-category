<?php

namespace Foostart\Category\Controlers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Category\Models\Categories;

class CategoriesFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_categories = new Categorys();
        $categories = $obj_categories->get_categorys();
        $this->data = array(
            'request' => $request,
            'categorys' => $categories
        );
        return view('category::category.index', $this->data);
    }

}
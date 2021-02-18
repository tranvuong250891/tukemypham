<?php 
namespace main\controllers\api;

use main\core\Controller;
use main\core\Request;
use main\models\ProductModel;

class ProductApi extends Controller
{
    public function __construct(Request $request)
    {   
        $this->model = new ProductModel();
    }

    public function index()
    {
        
    }


}
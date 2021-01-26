<?php
namespace main\controllers;

use main\core\Controller;
use main\core\Test;
use main\models\ProductModel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->model = new ProductModel();
        $this->model->getAll();
    }

    public function index()
    {
        // Test::show($this->model->getAll());

        echo json_encode($this->model->getAll());
    }
}

<?php

namespace Src\Controllers;

use Src\Models\ProductModel;

class ProductController
{

    private $productModel;

    public function __construct($router)
    {
        
        $this->router = $router;
        $this->productModel = new ProductModel();

    }

    public function home(): void
    {

        echo "<h1>Home</h1>";

    }

    public function list()
    {

        echo json_encode($this->productModel->list());

    }

    public function create()
    {
        
        $data = file_get_contents("php://input");
        $obj = json_decode($data);
        $this->productModel->create($obj);

    }

    public function findId($id) {

       echo json_encode($this->productModel->findId($id));

    }

    public function update($id)
    {

        $data = file_get_contents("php://input");
        $obj = json_decode($data);
        $this->productModel->update($id, $obj);

    }
}

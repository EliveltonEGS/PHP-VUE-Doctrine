<?php

namespace Src\Models;

use Src\Entities\Product;

class ProductModel extends Model {
    
    private $product;

    public function __construct() {
        
        $this->product = new Product();
        
    }
    
    public function list() {
     
        $sql = $this->entityManager()->createQueryBuilder();
        $sql->select("p")->from(Product::class, "p");
        $query = $sql->getQuery();
        $products = $query->getArrayResult();
        return $products;     
          
    }

    public function create($data) {
        
        $em = $this->entityManager();
        $this->product->setName($data->name);
        $this->product->setPrice($data->price);
        $em->persist($this->product);
        $em->flush();
        echo json_encode("Create with success");
        
    }

    public function findId($id) {
        
        $em = $this->entityManager();

        $sql = $em->createQueryBuilder();
        $sql->select("p")->from(Product::class, "p")->where("p.id = :id");
        $sql->setParameter("id", $id);
        $query = $sql->getQuery();
        $product = $query->getResult();
        
        foreach ($product as $item) {
            
            $result = ["id" => $item->getId(), "name" => $item->getName(), "price" => $item->getPrice()];

        }

        return $result;

    }

    public function update($id, $obj) {

        $em = $this->entityManager();
        $this->product = $em->getRepository(Product::class)->find($id);
        $this->product->setName($obj->name);
        $this->product->setPrice($obj->price);
        $em->flush();
        echo json_encode("Update with success");

    }

    public function delete($id) {

        $em = $this->entityManager();
        $this->product = $em->getReference(Product::class, $id);
        $em->remove($this->product);
        $em->flush();
        echo json_encode("Delete with success");

    }

}
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
        
    }

    public function findId($id) {
        
        $em = $this->entityManager();
        $sql = $em->createQueryBuilder();
        $sql->select("p")->from(Product::class, "p")->where("p.id = :id");
        $sql->setParameter("id", $id);
        $query = $sql->getQuery();
        $product = $query->getArrayResult();
        return $product;
    }

    public function update($id, $obj) {

        $em = $this->entityManager();
        $this->product = $em->getRepository(Product::class)->find($id);
        $this->product->setName($obj->name);
        $this->product->setPrice($obj->price);
        $em->flush();

    }

}
<?php

use CoffeeCode\Router\Router;

require_once "vendor/autoload.php";

$router = new Router("http://localhost/mvc/");
$router->namespace("Src\Controllers")->group(null);

$router->get("/", "ProductController:home", "product.home");
$router->get("/list", "ProductController:list", "product.list");
$router->post("/create", "ProductController:create", "product.create");
$router->get("/find-id/{id}", "ProductController:findId", "product.findId");
$router->post("/update/{id}", "ProductController:update", "product.update");
$router->delete("/delete/{id}", "ProductController:delete", "product.delete");

$router->dispatch();

if($router->error()) {
    echo "Error 404";
}




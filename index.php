<?php

use CoffeeCode\Router\Router;

require_once "vendor/autoload.php";

$router = new Router("http://localhost/mvc/");
$router->namespace("Src\Controllers")->group(null);

$router->get("/", "ProductController:home", "ProductController.home");
$router->get("/list", "ProductController:list", "ProductController.list");
$router->post("/create", "ProductController:create", "ProductController.create");
$router->get("/find-id/{id}", "ProductController:findId", "ProductController.findId");
$router->post("/update/{id}", "ProductController:update", "ProductController.update");


$router->dispatch();

if($router->error()) {
    echo "Erro 404";
}




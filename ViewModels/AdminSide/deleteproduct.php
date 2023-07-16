<?php
require_once '../../Controllers/DBController.php';
require_once '../../Controllers/ProductController.php';
require_once '../../Variables/product.php';

$DB = DBController::getInstance();
$product = new product;
$controller = new ProductController;
$product->id = $_GET['id'];

if ($DB->OpenCon()) {
  $controller->Delete($product);
  header("location:product.php");

}
?>


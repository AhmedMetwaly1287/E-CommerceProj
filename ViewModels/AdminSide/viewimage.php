<?php
require_once '../../Controllers/DBController.php';
require_once '../../Controllers/ProductController.php';
require_once '../../Variables/product.php';

$DB = DBController::getInstance();
$product = new Product;
$prodCon = new ProductController;

$product->id = $_GET['id'];
$prodInfo = $prodCon->getByID($product);
foreach($prodInfo as $product){
    $base64_image = $product['image'];
    echo '<img height="250px" width="250px" src="data:image;base64,'.$base64_image.'">';

}
?>
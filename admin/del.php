<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product();
if (isset($_GET['id'])){
    $product->delProduct($_GET['id']);
    //Xóa ảnh khỏi thư mục
    //unlink("../img/xe.png");
}
header('location:products.php');
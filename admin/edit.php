<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product();
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $image1 = $_FILES['image1']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $image4 = $_FILES['image4']['name'];
    $feature = $_POST['feature'];
    $createAt = $_POST['createdAt'];
    $dimensions = $_POST['dimensions'];
    $display_size = $_POST['displaySize'];
    //thêm sp vào bảng product
    $product->updateProduct($_POST['id'], $name, $manu_id, $type_id, $price, $desc, $image1, $image2, $image3, $image4, $feature, $createAt, $dimensions, $display_size);
   //upload hinh
   $target_dir = "../img/";
   //img1
   $target_file = $target_dir . basename($_FILES["image1"]["name"]);
   move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file);
   //img2
   $target_file = $target_dir . basename($_FILES["image2"]["name"]);
   move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file);
   //img3
   $target_file = $target_dir . basename($_FILES["image3"]["name"]);
   move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file);
   //img4
   $target_file = $target_dir . basename($_FILES["image4"]["name"]);
   move_uploaded_file($_FILES["image4"]["tmp_name"], $target_file);
}
header('location:products.php');
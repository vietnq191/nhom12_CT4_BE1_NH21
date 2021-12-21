<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product();
if (isset($_POST['submit'])) {
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

    $count = 0;
    $arrImg = array();
    for ($i = 1; $i <= 4; $i++) {
        $strImg = "image" . $i;
        if ($_FILES[$strImg]['name'] != "") {
            $count++;
            array_push($arrImg, $strImg);
        }
    }
    if ($count == 4) {
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
    if ($count == 3) {
        $img1 = $arrImg[0];
        $img2 = $arrImg[1];
        $img3 = $arrImg[2];
        $image1 = $_FILES[$img1]['name'];
        $image2 = $_FILES[$img2]['name'];
        $image3 = $_FILES[$img3]['name'];
        //thêm sp vào bảng product
        $product->updateProduct3Image($_POST['id'], $name, $manu_id, $type_id, $price, $desc, $image1, $image2, $image3, $feature, $createAt, $dimensions, $display_size, "`" . $img1 . "`", "`" . $img2 . "`", "`" . $img3 . "`");
        //upload hinh
        $target_dir = "../img/";
        //img1
        $target_file = $target_dir . basename($_FILES[$img1]["name"]);
        move_uploaded_file($_FILES[$img1]["tmp_name"], $target_file);
        //img2
        $target_file = $target_dir . basename($_FILES[$img2]["name"]);
        move_uploaded_file($_FILES[$img2]["tmp_name"], $target_file);
        //img3
        $target_file = $target_dir . basename($_FILES[$img3]["name"]);
        move_uploaded_file($_FILES[$img3]["tmp_name"], $target_file);
    }
    if ($count == 2) {
        $img1 = $arrImg[0];
        $img2 = $arrImg[1];
        $image1 = $_FILES[$img1]['name'];
        $image2 = $_FILES[$img2]['name'];
        //thêm sp vào bảng product
        $product->updateProduct2Image($_POST['id'], $name, $manu_id, $type_id, $price, $desc, $image1, $image2, $feature, $createAt, $dimensions, $display_size, "`" . $img1 . "`", "`" . $img2 . "`");
        //upload hinh
        $target_dir = "../img/";
        //img1
        $target_file = $target_dir . basename($_FILES[$img1]["name"]);
        move_uploaded_file($_FILES[$img1]["tmp_name"], $target_file);
        //img2
        $target_file = $target_dir . basename($_FILES[$img2]["name"]);
        move_uploaded_file($_FILES[$img2]["tmp_name"], $target_file);
    }
    if ($count == 1) {
        $img = $arrImg[0];
        $image1 = $_FILES[$img]['name'];
        //thêm sp vào bảng product
        $product->updateProduct1Image($_POST['id'], $name, $manu_id, $type_id, $price, $desc, $image1, $feature, $createAt, $dimensions, $display_size, "`" . $img . "`");
        //upload hinh
        $target_dir = "../img/";
        //img1
        $target_file = $target_dir . basename($_FILES[$img]["name"]);
        move_uploaded_file($_FILES[$img]["tmp_name"], $target_file);
    }
    if ($count == 0) {
        //thêm sp vào bảng product
        $product->updateProductNoImage($_POST['id'], $name, $manu_id, $type_id, $price, $desc, $feature, $createAt, $dimensions, $display_size);
    }
}
header('location:products.php');

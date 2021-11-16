<?php 
    session_start();
    //lay id product
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    //khoi tao bien mang session[cart] va kiem tra
    if(isset($_SESSION['cart']))
    {
        //neu san pham ma nguoi dung click them vao gio hang da ton tai
        //so luong san pham tang len !

        $_SESSION['cart'][$id]['quantity'] += 1; 
        
        header("location: index.php");
    }else
    {
        //neu san pham chua tung ton tai trong gio hang,duoc nguoi dung click
        //them vao gio hang thi so luong product =1
        $_SESSION['cart'][$id]['quantity'] = 1;
        
        header("location: index.php");
    }

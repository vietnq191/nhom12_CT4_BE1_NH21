<?php
  session_start();

   $conn = new mysqli("localhost","root","","project_thuongmaidientu");
   if($conn->connect_error){
       die("Connection Failed!".$conn->connect_error);
   }

   //insert item to cart
    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $pname = $_GET['pname'];
        $pprice = $_GET['pprice'];
        $pimg = $_GET['pimg'];
        $pcode = $_GET['pcode'];
        $pqty = 1;

        $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
        $stmt->bind_param("s",$pcode);
        $stmt->execute();
        $res =$stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['product_code'];
      
        if(!$code){
            $query = $conn->prepare("INSERT INTO cart (product_name,product_price,product_img,qty,total_price,product_code) 
            VALUES(?,?,?,?,?,?)");
            
            $query->bind_param("sisiis",$pname,$pprice,$pimg,$pqty,$pprice,$pcode);
            $query->execute();

            echo '<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Item added to your cart!</strong>
          </div>';
        }else{
          echo '<div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Item already added to your cart!</strong>
        </div>';
        }
        header("location:index.php");
    }

    //count item 
    if(isset($_GET['cartItem']) && isset($_GET['cartItem'])== 'cart-item'){
      $stmt = $conn->prepare("SELECT * FROM cart");
      $stmt->execute();
      $stmt->store_result();
      $rows = $stmt->num_rows;

      echo $rows;
    }
    
    //remove item
    if(isset($_GET['remove'])){
      $id =  $_GET['remove'];

      $stmt = $conn->prepare("DELETE FROM cart WHERE  id=?");
      $stmt->bind_param("i",$id);
      $stmt->execute();

      $_SESSION['showAlert'] = 'block';
      $_SESSION['message'] = 'Item removed from the cart!';
      header('location:viewcart.php');
    }
    
    //remove all item
    if(isset($_GET['clear'])){
      $stmt = $conn->prepare("DELETE FROM cart");
      $stmt->execute();
      header('location:cart.php');

      $_SESSION['showAlert'] = 'block';
      $_SESSION['message'] = 'All Item removed from the cart!';
      header('location:viewcart.php');
    }

    if(isset($_POST['qty'])){
      $qty = $_POST['qty'];
      $pid = $_POST['pid'];
      $pprice = $_POST['pprice'];
      $tprice = $qty*$pprice;
      var_dump($qty);
      $stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?");
      $stmt->bind_param("isi",$qty,$tprice,$pid);
      $stmt->execute();
    }

    //order
    if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $products = $_POST['products'];
      $grand_total = $_POST['grand_total'];
      $address = $_POST['address'];
      $pmode = $_POST['pmode'];
      $data = '';

      $stmt = $conn->prepare("INSERT INTO orders (fullname,email,address_customer,phone,payment_mode,products,amount_paid) VALUES(?,?,?,?,?,?,?)");
      $stmt->bind_param("sssssss",$name,$email,$address,$phone,$pmode,$products,$grand_total);
      $stmt->execute();
      $data .= '<div class="text-center"> 
        <h1 class="display-4 mt-2 text-danger"> Thank You! </h1>
        <h2 class="text-success"> Your Order Placed Successfully! </h2>
        <h4 class="bg-danger text-light rounded p-2"> Items Purchased: '.$products.' </h4>             
        <h4> Your Name: '.$name.' </h4>
        <h4> Your Email: '.$email.' </h4>
        <h4> Your Phone: '.$phone.' </h4>
        <h4> Total Amount Paid : '.number_format($grand_total).' VND </h4>
        <h4> Payment Mode: '.$pmode.' </h4>
        </div>';
        echo $data;
    }
?>
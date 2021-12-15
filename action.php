<?php
<<<<<<< Updated upstream
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
=======
session_start();
$sendMailCheckOut = false;

$conn = new mysqli("localhost", "root", "", "project_thuongmaidientu");
if ($conn->connect_error) {
  die("Connection Failed!" . $conn->connect_error);
}

//insert item to cart
if (isset($_GET['pid'])) {
  $pid = $_GET['pid'];
  $pname = $_GET['pname'];
  $pprice = $_GET['pprice'];
  $pimg = $_GET['pimg'];
  $pcode = $_GET['pcode'];
  $pqty = 1;
  $url = 'http://localhost' . $_GET['url'];

  $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
  $stmt->bind_param("s", $pcode);
  $stmt->execute();
  $res = $stmt->get_result();
  $r = $res->fetch_assoc();
  $code = $r['product_code'];

  if (!$code) {
    $query = $conn->prepare("INSERT INTO cart (product_id,product_name,product_price,product_img,qty,total_price,product_code) 
            VALUES(?,?,?,?,?,?,?)");

    $query->bind_param("isisiis", $pid, $pname, $pprice, $pimg, $pqty, $pprice, $pcode);
    $query->execute();

    echo '<div class="alert alert-success alert-dismissible">
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
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
=======
  if (isset($_GET['logout'])) {
    header("location: index.php");
  } else {
    header('location:viewcart.php');
  }
}
>>>>>>> Stashed changes

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
      $stmt = $conn->prepare("INSERT INTO orders (fullname,email,address_customer,phone,payment_mode,username,amount_paid) VALUES(?,?,?,?,?,?,?)");
      $stmt->bind_param("sssssss",$name,$email,$address,$phone,$pmode,$_SESSION["username"],$grand_total);
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

    //setting profile
if (isset($_POST['actionSetting']) && isset($_POST['actionSetting']) == 'setting') {
  $userid = $_POST['user_id'];
  $name = $_POST['name'];
<<<<<<< Updated upstream
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $data = '';

=======
  $email = $_POST['emailCustomer'];
  $phone = $_POST['phone'];
  $products = $_POST['products'];
  $grand_total = $_POST['grand_total'];
  $address = $_POST['address'];
  $pmode = $_POST['pmode'];
  $order_date = date("Y-m-d H:i:s");

  $data = '';
  $stmt = $conn->prepare("INSERT INTO orders (fullname,email,address_customer,phone,order_date,payment_mode,username,amount_paid) VALUES(?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssss", $name, $email, $address, $phone, $order_date, $pmode, $_SESSION["username"], $grand_total);
  $stmt->execute();
  $data .= '<div class="text-center"> 
    <h1 class="display-4 mt-2 text-danger"> Thank You! </h1>
    <h2 class="text-success"> Your Order Placed Successfully! </h2>
    <h4 class="bg-danger text-light rounded p-2"> Items Purchased: ' . $products . ' </h4>             
    <h4> Your Name: ' . $name . ' </h4>
    <h4> Your Email: ' . $email . ' </h4>
    <h4> Your Phone: ' . $phone . ' </h4>
    <h4> Total Amount Paid : ' . number_format($grand_total) . ' VND </h4>
    <h4> Payment Mode: ' . $pmode . ' </h4>
    </div>';
  echo $data;

  //lay id_order
  $stmt = $conn->prepare("SELECT * FROM `orders` ORDER BY `order_id` DESC LIMIT 0,1");
  $stmt->execute();
  $items = array();
  $items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stringItems = "";
  $totalCost = 0;
  $order_id = $items[0]['order_id'];
>>>>>>> Stashed changes

  $stmt = $conn->prepare("UPDATE `user` SET `name`=?,`email`=?,`phone`=? WHERE `user_id`=?");
  $stmt->bind_param("sssi", $name, $email, $phone, $userid);
  $stmt->execute();
<<<<<<< Updated upstream

  $data .= '<div class="text-center"> 
      <h2 class="display-4 mt-2 text-success"> Your Setting Profile Successfully! </h2>
      <hr>
      <h4 class="text-success"> <a href="viewaccount.php">Check profile here !!! </a> </h4>           
      </div>';
  echo $data;
=======
  $items = array();
  $items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stringItems .= "Items: " . count($items) . "<br>";
  foreach ($items as $item) {
    $stmt = $conn->prepare("INSERT INTO `oders_list`(`oder_id`,`username`, `product_id`, `quantity`, `price`) VALUES (?,?,?,?,?)");
    $stmt->bind_param("isiii", $order_id, $_SESSION["username"], $item['product_id'], $item['qty'], $item['total_price']);
    $stmt->execute();
    $totalCost += (int)$item['total_price'];
    $stringItems .= $item['product_name'] . " x" . $item['qty'] . "<br>";
  }
  $stringItems .= "Total: " . number_format($totalCost) . " VND";
  echo $stringItems;
  $sendMailCheckOut = true;
>>>>>>> Stashed changes
}

//change password
if (isset($_POST['actionChangepass']) && isset($_POST['actionChangepass']) == 'change_pass') {
  $username = $_POST['username'];
  $oldpass = md5($_POST['old_pass']);
  $newpass = $_POST['new_pass'];
  $cnpass = $_POST['confirm_pass'];

  $stmt = $conn->prepare("SELECT * FROM `user` WHERE `username`= ? ");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $res = $stmt->get_result();
  $r = $res->fetch_assoc();
  $data_pwd  = $r['password'];

  if ($data_pwd == $oldpass) {
    if ($newpass == $cnpass) {
      //hash password new
      $passhash = md5($newpass);

      $update_pwd = $conn->prepare("UPDATE `user` SET `password`=? Where `username` =?");
      $update_pwd->bind_param("ss", $passhash, $username);
      $update_pwd->execute();

      echo "<script> alert('Update Successfully'); window.location='index.php'</script>";
    } else {
      echo '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Your new and confirm new Password is not match</strong>
          </div>';
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Your old password is wrong!</strong>
          </div>';
  }
}
<<<<<<< Updated upstream
?>
=======

//setting profile
if (isset($_POST['actionSetting']) && isset($_POST['actionSetting']) == 'setting') {
  $userid = $_POST['user_id'];
  $name = $_POST['name'];
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $data = '';


  $stmt = $conn->prepare("UPDATE user SET `name`=?,`email`=?,`phone`=? WHERE `user_id`=?");
  $stmt->bind_param("sssi", $name, $email, $phone, $userid);
  $stmt->execute();

  $data .= '<div class="text-center"> 
      <h2 class="display-4 mt-2 text-success"> Your Setting Profile Successfully! </h2>
      <hr>
      <h4 class="text-success"> <a href="viewaccount.php">Check profile here !!! </a> </h4>           
      </div>';
  echo $data;
}

//Gửi email
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit-newsletter"])) {
  $mail = new PHPMailer(true);
  try {
    //Server setting
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Backend2021nhom12@gmail.com';
    $mail->Password = 'Back.end_2021nhom12';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $sendMail = $_POST["email"];
    $mail->setFrom('Backend2021nhom12@gmail.com', 'Electric Shop');
    $mail->addAddress($sendMail, "Customer");

    $mail->isHTML(true);
    $mail->Subject = "Subject";
    $mail->Body = "Nội dung";
    $mail->send();
    echo "<script> alert('Đã gửi thư'); window.location='index.php'</script>";
  } catch (Exception $e) {
    //echo "Lỗi gửi mail: {$mail->ErrorInfo}";
    echo "<script> alert('Lỗi gửi thư'); window.location='index.php'</script>";
  }
}

if ($sendMailCheckOut == true) {
  $mail = new PHPMailer(true);
  try {
    //Server setting
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Backend2021nhom12@gmail.com';
    $mail->Password = 'Back.end_2021nhom12';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('Backend2021nhom12@gmail.com', 'Electric Shop');
    $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = "Your orders";
    $mail->Body = $stringItems;
    $mail->send();
  } catch (Exception $e) {
    echo "Lỗi gửi mail: {$mail->ErrorInfo}";
  }
}
>>>>>>> Stashed changes

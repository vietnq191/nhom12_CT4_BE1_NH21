<?php
require "config.php";
require "models/db.php";
require "models/user.php";
require "models/protype.php";
require "models/manufacture.php";

$user = new User();
$protype = new Protype();
$manu = new Manufacture();

/*---- Manufactures ---- */

//add manufacture
if (isset($_POST['AddManufacture'])) {
  $manu_name = $_POST['manu_name'];

  //select all username from user
  $getManu = $manu->getManuName($manu_name);
  $check = true;

  foreach ($getManu as $value) {
    if ($value['manu_name'] == $manu_name) {
      $check = false;
      break;
    } else {
      $check = true;
    }
  }

  if ($check == false) {
    echo "<script> alert('This manufacture name is Already Taken, Choose Another One'); window.location='add-manufacture.php'</script>";
  } else {
    $manu->addManufacture($manu_name);
    header("location: manufactures.php");
  }
}

//del manufacture
if (isset($_GET['manu_id'])) {

  $getManuID = $manu->getManuIdFromProducts();
  foreach ($getManuID as $value) {
    if ($value['manu_id'] == $_GET['manu_id']) {
      $check = false;
      break;
    } else {
      $check = true;
    }
  }

  if ($check == false) {
    echo "<script> alert('This manufacture name is Already Taken, Choose Another One To Delete'); window.location='manufactures.php'</script>";
  } else {
    $manu->delManufacture($_GET['manu_id']);
    header("location: manufactures.php");
  }
}

//update manufacture
if(isset($_POST['updateManufacture'])){
  $manuName = $_POST['manu_name'];
  $ManuId = $_POST['manu_id'];
  $manu->updateManufacture($ManuId,$manuName);
  header("location: manufactures.php");
}

/*---- Users ---- */

//add user
if (isset($_POST['AddOneUser'])) {
  $fname = $_POST['fname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  //select all username from user
  $getUser = $user->getUserName($username);
  $check = true;

  foreach ($getUser as $value) {
    if ($value['username'] == $username) {
      $check = false;
      break;
    } else {
      $check = true;
    }
  }

  if ($check == false) {
    echo "<script> alert('This Username is Already Taken, Choose Another One'); window.location='form_add_user.php'</script>";
  } else {
    $user->addUser($fname, $username, $password, $email, $phone);
    header("location: user.php");
  }
}


//xoa user
if (isset($_GET['user_id'])) {
  $user->delUser($_GET['user_id']);
  header("location: user.php");
}

//update information user
if (isset($_POST['updateUser'])) {
  $user_id = $_POST['user_id'];
  $fname = $_POST['fname'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  //var_dump($fname);
  $user->updateUser($user_id, $fname, $password, $email, $phone);
  header("location: user.php");
}

/*---- Protypes ---- */

//addProtype
if (isset($_POST["AddOneProtype"])) {
  $typename = $_POST['type_name'];

  $gettypename = $protype->gettypeName();


  foreach ($gettypename as $value) {
    if ($value['type_name'] == $typename) {
      $check = false;
      break;
    } else {
      $check = true;
    }
  }

  if ($check == false) {
    echo "<script> alert('This protype name is Already Taken, Choose Another One'); window.location='form_add_protype.php'</script>";
  } else {
    $protype->addProtype($typename);
    header("location: protypes.php");
  }
}

//delProtype
if (isset($_GET['type_id'])) {

  $gettypeid = $protype->getProtypeid();
  foreach ($gettypeid as $value) {
    if ($value['type_id'] == $_GET['type_id']) {
      $check = false;
      break;
    } else {
      $check = true;
    }
  }

  if ($check == false) {
    echo "<script> alert('This protype name is Already Taken, Choose Another One To Delete'); window.location='protypes.php'</script>";
  } else {
    $protype->delProtype($_GET['type_id']);

    header("location: protypes.php");
  }
}

//
if(isset($_POST['updateProtype'])){
  $typename = $_POST['typename'];
  $typeid = $_POST['type_id'];
  $protype->updateProtype($typeid,$typename);
  header("location: protypes.php");
}

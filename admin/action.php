<?php
require "config.php";
require "models/db.php";
require "models/user.php";
require "models/protype.php";
require "models/manufacture.php";
require "models/admin_account.php";

$admin = new Admin();
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
    echo "<script> alert('Add a manufacture successfully'); window.location='manufactures.php'</script>";
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
    echo "<script> alert('Delete successfully'); window.location='manufactures.php'</script>";
  }
}

//update manufacture
if (isset($_POST['updateManufacture'])) {
  $manuName = $_POST['manu_name'];
  $ManuId = $_POST['manu_id'];
  $manu->updateManufacture($ManuId, $manuName);
  echo "<script> alert('Update successfully'); window.location='manufactures.php'</script>";
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
    echo "<script> alert('Add a user successfully'); window.location='user.php'</script>";
  }
}


//xoa user
if (isset($_GET['user_id'])) {
  $user->delUser($_GET['user_id']);
  echo "<script> alert('Delete successfully'); window.location='user.php'</script>";
}

//update information user
if (isset($_POST['updateUser'])) {
  $user_id = $_POST['user_id'];
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $user->updateUser($user_id, $fname, $email, $phone);
  echo "<script> alert('Update successfully'); window.location='user.php'</script>";
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
    echo "<script> alert('Add a protypes successfully'); window.location='protypes.php'</script>";
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
    echo "<script> alert('Delete successfully'); window.location='protypes.php'</script>";
  }
}

//update protypename
if (isset($_POST['updateProtype'])) {
  $typename = $_POST['typename'];
  $typeid = $_POST['type_id'];
  $protype->updateProtype($typeid, $typename);
  echo "<script> alert('Update successfully'); window.location='protypes.php'</script>";
}

/*---- Change Password ---- */
if (isset($_POST['changePass'])) {
  $id_admin = $_POST['admin_uname'];
  $oldPass = $_POST["oldPass"];
  $newPass = $_POST["newPass"];
  $confirmPass = $_POST["cfPass"];

  $checkID = $admin->getAdminUserName($id_admin);
  if (md5($oldPass) == $checkID[0]['admin_password']) {
    if ($newPass == $confirmPass) {
      $admin->ChangePass(md5($newPass), $id_admin);
      echo "<script> alert('ChangePass successfully'); window.location='index.php'</script>";
    } else {
      echo "<script> alert('Your new and confirm new Password is not match'); window.location='form_changePass.php'</script>";
    }
  } else {
    echo "<script> alert('Your old password is wrong!'); window.location='form_changePass.php'</script>";
  }
}

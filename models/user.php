<?php 
class User extends Db{
    public function getUsersData($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM user WHERE `user_id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function login()
    {
        $sql = self::$connection->prepare("SELECT * FROM user");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getId($username){
        $sql = self::$connection->prepare("SELECT `user_id` FROM user WHERE `username` = ?");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
  
    public function register($fullName,$username,$password,$email,$phone)
    {
        $sql = self::$connection->prepare("INSERT INTO `user`(`name`,`username`,`password`,`email`,`phone`)
        VALUES(?,?,?,?,?)");
        $sql->bind_param("sssss", $fullName,$username,$password,$email,$phone);
        return $sql->execute(); //return an array
    }
  
    public function checkUseralready()
    {
        $sql = self::$connection->prepare("SELECT * FROM user");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
?>


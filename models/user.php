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

    public function checkLogin($username,$password){
        $sql = self::$connection->prepare("SELECT * FROM user 
        WHERE `username` = ? AND `password` = ?");
        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->num_rows;
        if($items == 1){
            return true;
        }
        else {
            return false;
        }
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
        mysqli_set_charset(self::$connection, 'UTF8');
        $sql = self::$connection->prepare("INSERT INTO `user`(`name`,`username`,`password`,`email`,`phone`)
        VALUES(?,?,?,?,?)");
        $password = md5($password);
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


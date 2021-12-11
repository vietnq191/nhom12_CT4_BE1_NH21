<?php 
class Login extends Db{
    public function checkLogin($username, $password){
        $sql = self::$connection->prepare("SELECT * FROM `admin_login`
        WHERE `admin_username` = ? AND `admin_password` = ?");
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
    public function getName($username){
        $sql = self::$connection->prepare("SELECT * FROM `admin_login`
        WHERE `admin_username` = ?");
        //$password = md5($password);
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
?>
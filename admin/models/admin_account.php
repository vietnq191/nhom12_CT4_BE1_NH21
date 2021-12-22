<?php
class Admin extends Db
{
    public function getAdminUserName($uname_admin)
    {
        $sql = self::$connection->prepare("SELECT * FROM `admin_login` WHERE `admin_username`= ?");
        $sql->bind_param("s", $uname_admin);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function ChangePass($newPass,$uname_admin)
    {
        $sql = self::$connection->prepare("UPDATE `admin_login` SET `admin_password`=? WHERE `admin_username` =?");
        $sql->bind_param("ss",$newPass,$uname_admin);
        return $sql->execute(); //return an object
    }
    
}
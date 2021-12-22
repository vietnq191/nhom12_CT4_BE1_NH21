<?php
class User extends Db
{
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM user ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addUser($name,$username,$password,$email,$phone)
    {
        $sql = self::$connection->prepare("INSERT INTO `user`(`name`, `username`, `password`, `email`, `phone`) VALUES (?,?,?,?,?) ");
        $password = md5($password);
        $sql->bind_param("sssss", $name,$username,$password,$email,$phone);
        return $sql->execute(); //return an object
    }
    public function delUser($user_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `user` WHERE `user_id` = ?");
        $sql->bind_param("i",$user_id);
        return $sql->execute(); //return an object
    }
    public function updateUser($id_user,$name,$email,$phone)
    {
        $sql = self::$connection->prepare("UPDATE `user` SET `name`= ?,`email`= ?,`phone`= ? WHERE `user_id`=?");
        $sql->bind_param("sssi", $name,$email,$phone,$id_user);
        return $sql->execute(); //return an object
    }
    public function getUserName()
    {
        $sql = self::$connection->prepare("SELECT `username` FROM `user` ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function statisticUsers()
    {
        $sql = self::$connection->prepare("SELECT  user.name,user.username,user.email,user.phone ,COUNT(*) AS 'soLuong' FROM `user` JOIN orders ON user.username = orders.username GROUP BY user.name,user.username,user.email,user.phone");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
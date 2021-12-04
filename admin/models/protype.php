<?php
class Protype extends Db
{
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM protypes ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addProtype($typename)
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_name`) VALUES (?) ");
        $sql->bind_param("s", $typename );
        return $sql->execute(); //return an object
    }
    public function delProtype($protype_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_id` =?");
        $sql->bind_param("i",$protype_id);
        return $sql->execute(); //return an object
    }
    public function updateProtype($protype_id,$protypeName)
    {
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`=? WHERE `type_id`=?");
        $sql->bind_param("si", $protypeName,$protype_id);
        return $sql->execute(); //return an object
    }
    public function getProtypeid()
    {
        $sql = self::$connection->prepare("SELECT `type_id` FROM `listproducts`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function gettypeName()
    {
        $sql = self::$connection->prepare("SELECT `type_name` FROM `protypes` ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
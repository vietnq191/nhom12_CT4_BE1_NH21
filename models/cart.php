<?php
class Cart extends Db
{
    public function getAllCart()
    {
        $sql = self::$connection->prepare("SELECT * FROM cart");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}

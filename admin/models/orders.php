<?php
class Orders extends Db
{
    public function getAllOrders()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM orders ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function Sum_orders_new(){
        $sql = self::$connection->prepare("SELECT COUNT(*) AS 'Qty orders' FROM `orders` WHERE date(`order_date`) = CURRENT_DATE()");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function statistical_orders_new(){
        $sql = self::$connection->prepare("SELECT `fullname`,`email`,`phone`,COUNT(*) AS 'Qty orders' FROM `orders` WHERE date(`order_date`) = CURRENT_DATE() GROUP BY `fullname`,`email`,`phone`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function statistical_orders_Month(){
        $sql = self::$connection->prepare("SELECT Month(`order_date`) AS'Month',COUNT(*) AS 'Qty orders' FROM `orders` WHERE YEAR(`order_date`) = YEAR(	CURRENT_DATE()) GROUP BY   Month(`order_date`)");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
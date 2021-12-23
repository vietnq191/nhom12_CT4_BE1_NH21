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
    public function getOrderDetails($orderID){
        $sql = self::$connection->prepare("SELECT listproducts.name,listproducts.image1,listproducts.price, oders_list.quantity, oders_list.username FROM `oders_list` JOIN listproducts ON oders_list.product_id = listproducts.id WHERE oders_list.oder_id= ?");
        $sql->bind_param("i", $orderID);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getOrders($page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM orders ORDER BY `order_date` DESC LIMIT ?,?");
        $sql->bind_param("ii", $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function paginate($currentPage, $url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            if ($j == $currentPage) {
                $link = $link . "<li class='active'>$j</li>";
            } else {
                $link = $link . "<li><a href='$url?&page=$j'> $j </a></li>";
            }
        }
        return $link;
    }
}
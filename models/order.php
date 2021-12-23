<?php
class Orders extends Db
{
    public function getAllOrdersByUserName($userName)
    {
        $sql = self::$connection->prepare("SELECT *  FROM orders WHERE `username` =?");
        $sql->bind_param("s", $userName);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getOrderDetails($orderID){
        $sql = self::$connection->prepare("SELECT listproducts.name,listproducts.image1,listproducts.price, oders_list.quantity FROM `oders_list` JOIN listproducts ON oders_list.product_id = listproducts.id WHERE oders_list.oder_id= ?");
        $sql->bind_param("i", $orderID);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getOrdersByUserName($userName, $page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT *  FROM orders WHERE `username` = ? ORDER BY `order_date` DESC LIMIT ?,?");
        $sql->bind_param("sii", $userName, $firstLink, $perPage);
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
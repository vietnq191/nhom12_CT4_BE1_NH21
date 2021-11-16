<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM listproducts");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getProductByTypeId($typeId)
    {
        $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE `type_id` = ?");
        $sql->bind_param("i", $typeId);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductByManu($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //lay 3 sanpham theo hang de phan trang
    public function get3ProductByManu($manu_id, $page, $perPage)
    {
        //tinh so thu tu trang bat dau
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE manu_id = ? LiMIT ?,?");
        $sql->bind_param("iii", $manu_id, $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function paginate($url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<li><a href='$url&page=$j'> $j </a></li>";
        }
        return $link;
    }
    //Lấy 10 sản phẩm mới nhất
    public function getNewProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM listproducts ORDER BY created_at DESC LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get6ProductsSearch($type, $keyword, $page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $keyword = "'%$keyword%'";
        if ($type != 0) {
            $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE `name` LIKE $keyword AND `type_id`= ? LIMIT ?,?");
            $sql->bind_param("iii", $type, $firstLink, $perPage);
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        } else {
            $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE `name` LIKE $keyword LIMIT ?,?");
            $sql->bind_param("ii", $firstLink, $perPage);
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        }
    }
  
    public function getProductByTypeIDAndName($type, $keyword)
    {
        // Tính số thứ tự trang bắt đầu
        $keyword = "'%$keyword%'";
        if ($type != 0) {
            $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE `name` LIKE $keyword AND `type_id`= ? ");
            $sql->bind_param("i", $type);
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        } else {
            $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE `name` LIKE $keyword");
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        }
    }

    public function getTopSellingProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM listproducts where feature = 1 LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array

    }
    public function search($type, $keyword)
    {
        $keyword = "'%$keyword%'";
        if ($type != 0) {
            $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE `name` LIKE $keyword AND `type_id`= ?");
            $sql->bind_param("s", $type);
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        } else {
            $sql = self::$connection->prepare("SELECT * FROM listproducts WHERE `name` LIKE $keyword");
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        }
    }
    public function login()
    {
        $sql = self::$connection->prepare("SELECT * FROM user");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}

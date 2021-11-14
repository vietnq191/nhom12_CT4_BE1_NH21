<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Lấy 10 sản phẩm mới nhất
    public function getNewProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT 0,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function login()
    {
        $sql = self::$connection->prepare("SELECT * FROM user ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function checkUseralready()
    {
        $sql = self::$connection->prepare("SELECT `username` FROM user ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get3ProductsByManu($manu_id, $page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products
        WHERE manu_id = ?  LIMIT ?,?");
        $sql->bind_param("iii", $manu_id, $firstLink, $perPage);
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
            $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE $keyword AND `type_id`= ? LIMIT ?,?");
            $sql->bind_param("iii", $type, $firstLink, $perPage);
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        } else {
            $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE $keyword LIMIT ?,?");
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
            $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE $keyword AND `type_id`= ? ");
            $sql->bind_param("i", $type);
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        } else {
            $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE $keyword");
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        }
    }
    public function paginate($url, $total, $perPage)
    {
        $totalLink = ceil($total / $perPage);
        $link = "";
        for ($i = 1; $i <= $totalLink; $i++) {
            $link = $link . "<li><a href='$url&page=$i'> $i</a></li>";
        }
        return $link;
    }
    public function search($keyword, $type)
    {
        $keyword = "'%$keyword%'";
        if ($type != 0) {
            $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE $keyword AND `type_id`= ?");
            $sql->bind_param("s", $type);
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        } else {
            $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE $keyword");
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        }
    }
}

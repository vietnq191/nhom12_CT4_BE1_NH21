<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM listproducts,manufactures,protypes
        WHERE listproducts.manu_id=manufactures.manu_id
        AND listproducts.type_id=protypes.type_id 
        ORDER BY id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addProduct($name,$manu_id,$type_id,$price,$image,$desc)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `listproducts`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`) 
        VALUES (?,?,?,?,?,?)");
        $sql->bind_param("siiiss", $name,$manu_id,$type_id,$price,$image,$desc);
        return $sql->execute(); //return an object
    }
    public function delProduct($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `listproducts` WHERE id=?");
        $sql->bind_param("i", $id);
        return $sql->execute(); //return an object
    }
    public function updateProduct($id,$name,$manu_id,$type_id,$price,$image,$desc)
    {
        $sql = self::$connection->prepare("UPDATE `listproducts` 
        SET `name` = ?, `manu_id` = ?, `type_id` = ?, `price` = ?, `image` = ?, `description` = ?
        WHERE `id` = ?");
        $sql->bind_param("siiissi", $name,$manu_id,$type_id,$price,$image,$desc,$id);
        return $sql->execute(); //return an object
    }
    public function statisticProducts()
    {
        $sql = self::$connection->prepare("SELECT protypes.type_id,protypes.type_name,COUNT(*) AS 'Số Lượng', MAX(listproducts.price) AS 'Giá cao',MIN(listproducts.price) AS 'Giá thấp',AVG(listproducts.price) AS 'Giá Trung bình'FROM `protypes` JOIN listproducts ON protypes.type_id = listproducts.type_id GROUP BY protypes.type_id,protypes.type_name");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}

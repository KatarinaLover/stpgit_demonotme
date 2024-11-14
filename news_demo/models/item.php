<?php
class Item extends Db
{
    public function getAllItems()
    {
        $sql = self::$connection->prepare("SELECT * FROM items");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM items WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getNewItem($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM items ORDER BY id DESC 
        LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getFeatureNewItem($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM items WHERE featured = 1 ORDER BY id DESC 
        LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemByCat($category)
    {
        $sql = self::$connection->prepare("SELECT * FROM items WHERE category = ?");
        $sql->bind_param("i", $category);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getCatNameById($category)
    {
        $sql = self::$connection->prepare("SELECT categories.name FROM items,categories 
        WHERE items.category = categories.id
        AND category = ?");
        $sql->bind_param("i", $category);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAuthorName($author)
    {
        $sql = self::$connection->prepare("SELECT author.name FROM items,author 
        WHERE items.author = author.id
        AND author = ?");
        $sql->bind_param("i", $author);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function search($keyword, $start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items` WHERE `conten`LIKE ? LIMIT ?,?");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword, $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function searchAll($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items` WHERE `conten` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}

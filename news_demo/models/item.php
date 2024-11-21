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
        $sql = self::$connection->prepare("SELECT author.name FROM items.author 
        WHERE items.author = author.id
        AND author = ?");
        $sql->bind_param("s", $author);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function search($keyword, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `items` WHERE `content`LIKE ? LIMIT ?,?");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword, $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function searchAll($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items` WHERE `content` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getAllItemsByCate($cate_id)
    {
        $sql = self::$connection->prepare("SELECT 
        * FROM `items` WHERE `category`= ?");

        $sql->bind_param("i", $cate_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // public function getItemsByCate($cate_id, $start, $count)
    // {
    //     $sql = self::$connection->prepare("SELECT * FROM `items` WHERE `category`= ? LIMIT ?,?");

    //     $sql->bind_param("iii", $cate_id, $start, $count);
    //     $sql->execute(); //return an object
    //     $items = array();
    //     $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    //     return $items; //return an array
    // }
    public function getItemsByCate($cate_id, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `items` 
        WHERE `category` = ?
        LIMIT ?,?");
        $sql->bind_param("iii", $cate_id, $start, $count);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    // function paginate($url, $total, $perPage)
    // {
    //     $totalLinks = ceil($total / $perPage);
    //     $link = "";
    //     for ($j = 1; $j <= $totalLinks; $j++) {
    //         $link = $link . "<a class='badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2' href='$url&page=$j'> $j </a>";
    //     }
    //     return $link;
    // }

    function paginate($url, $total, $page, $perPage, $offset)
    {
        if ($total <= 0) {
            return "";
        }

        $totalLinks = ceil($total / $perPage);
        if ($totalLinks <= 1) {
            return "";
        }
        $from = $page - $offset;
        $to = $page + $offset;
        //$offset quy định số lượng link hiển thị ở 2 bên trang hiện hành
        //$offset = 2 và $page = 5,lúc này thanh phân trang sẽ hiển thị: 3 4 5 6 7
        if ($from <= 0) {
            $from = 1;
            $to = $offset * 2;
        }
        if ($to > $totalLinks) {
            $to = $totalLinks;
        }
        $link = "";
        $prev = "";
        $next = "";
        for ($j = $from; $j <= $to; $j++) {
            $link = $link . "<a class='badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2' href = '$url&page=$j'> $j </a>";
        }
        if ($page > 1) {
            $prevPage = $page - 1;
            $prev = "<a class='badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2' href='$url&page=$prevPage'> Prev  </a>";
        }
        if ($page < $totalLinks) {
            $nextPage = $page + 1;
            $next = "<a class='badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2' href='$url&page=$nextPage'>
                    Next  </a>";
        }
        return $prev . $link . $next;
    }
}

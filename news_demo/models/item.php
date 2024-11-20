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

    public function search($keyword, $start, $count)
    {
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
        $totalLinks = ceil($total / $perPage); // Tổng số trang
        if ($totalLinks <= 1) {
            return "";
        }
        $pagination = "";
        // 2. **Giới hạn số trang hiển thị**
        $from = max(1, $page - $offset);  // Không nhỏ hơn 1
        $to = min($totalLinks, $page + $offset); // Không vượt quá tổng số trang
        // Lấy tham số hiện tại trong URL
        $queryParams = $_GET; // Lấy tất cả các tham số hiện tại từ URL
        // Load khi ấn sang trang khác
        if ($page > 1) {
            // Duy trì các tham số hiện tại và thay đổi trang
            $pagination .= "<a class='badge badge-secondary p-1 mr-2' href='" . $url . "?cate-id=" . $queryParams['cate'] . "&page=1'>Prev</a>";
            for ($j = $from; $j <= $to; $j++) {
                $activeClass = ($j == $page) ? "badge-success" : "badge-primary";
                $pagination .= "<a class='badge $activeClass p-1 mr-2' href='" . $url . "?cate-id=" . $queryParams['cate'] . "&page=$j'>$j</a>";
            }
            $prev = $page - 1;
            $pagination .= "<a class='badge badge-secondary p-1 mr-2' href='" . $url . "?cate-id=" . $queryParams['cate'] . "&page=$prev'>Next</a>";
        }
        // 3. Ở trang đầu
        if ($page < $totalLinks) {
            $pagination .= "<a class='badge badge-secondary p-1 mr-2' href='" . $url . "?cate-id=" . $queryParams['cate'] . "&page=$totalLinks'>Prev</a>";

            for ($j = $from; $j <= $to; $j++) {
                $activeClass = ($j == $page) ? "badge-success" : "badge-primary";
                $pagination .= "<a class='badge $activeClass p-1 mr-2' href='" . $url . "?cate-id=" . $queryParams['cate'] . "&page=$j'>$j</a>";
            }
            $next = $page + 1;
            $pagination .= "<a class='badge badge-secondary p-1 mr-2' href='" . $url . "?cate-id=" . $queryParams['cate'] . "&page=$next'>Next</a>";
        }
        return $pagination;
    }
}

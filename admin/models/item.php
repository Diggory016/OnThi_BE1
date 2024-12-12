<?php
class Item extends Db
{
    public function getAllItems()
    {
        $sql = self::$connection->prepare("SELECT `items`.`id`,`tile`, `excerpt`, `conten`, `image`, `featured`, `views`, `created_at`, `categories`.`name` AS catename, `users`.`name` AS authname 
        FROM `items`, `categories`, `users` 
        WHERE `items`.`category` = `categories`.`id`
        AND `items`.`author` = `users`.`id`
        ORDER BY `created_at` DESC;");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function search($keyword, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql  = self::$connection->prepare("SELECT * FROM `items`
        WHERE `conten` LIKE ?
        LIMIT ?,?");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword, $start, $count);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function searchCount($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items`
        WHERE `conten` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function paginate($url, $total, $count, $page)
    {
        $totalLinks = ceil($total / $count);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            if ($page == $j) {
                $link = $link . "<a style='font-weigh:bold' href='$url&page=$j'> $j </a>";
            } else {
                $link = $link . "<a href = '$url&page=$j'> $j </a>";
            }
        }
        return $link;
    }
    function delete($id)
    {
        $sql  = self::$connection->prepare("DELETE FROM `items` WHERE `id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    function addItem($tile, $excerpt, $conten, $image, $category, $featured, $views, $author)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `items`(`tile`, `excerpt`, `conten`, `image`, `category`, `featured`, `views`, `author`)
        Values (?,?,?,?,?,?,?,?)");
        $sql->bind_param("ssssiiii", $tile, $excerpt, $conten, $image, $category, $featured, $views, $author);
        return $sql->execute();
    }
    function getItemById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items`
        WHERE `id` =  ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function updateItem($tile, $excerpt, $conten, $image, $category, $featured, $views, $author, $id)
    {
        if ($image !=  "") {
            $sql = self::$connection->prepare("UPDATE `items`
        SET `tile`=?, `excerpt`=?, `conten`=?, `image`=?, `category`=?, `featured`=?, `views`=?, `author`=?
        WHERE `id` = ?");
            $sql->bind_param("ssssiiiii", $tile, $excerpt, $conten, $image, $category, $featured, $views, $author, $id);
        } else {
            //    echo "123";
            $sql = self::$connection->prepare("UPDATE `items`
     SET `tile`=?, `excerpt`=?, `conten`=?, `category`=?, `featured`=?, `views`=?, `author`=?
     WHERE `id` = ?");
            $sql->bind_param("sssiiiii", $tile, $excerpt, $conten, $category, $featured, $views, $author, $id);
        }
        return $sql->execute();
    }
}

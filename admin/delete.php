<?php
include "config.php";
include "models/db.php";
include "models/item.php";
include "models/category.php";
include "models/user.php";
$item = new Item;
$cate = new Category;
$author = new User;

if (isset($_GET['id'])) {
    //Xử lý xóa items theo id
    $id = $_GET['id'];
    $item->delete($id);
    header('location:items.php');
} elseif (isset($_GET['cate_id'])) {
    //Xử lý xóa cate theo id
    $id = $_GET['cate_id'];
    $cate->deleteCate($id);
    header('location:categories.php');
} elseif (isset($_GET['author_id'])) {
    //Xử lý xóa author theo id
    $id = $_GET['author_id'];
    $author->deleteUsers($id);
    header('location:users.php');
}

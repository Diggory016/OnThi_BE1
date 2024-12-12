<?php
include "config.php";
include "models/db.php";
include "models/item.php";
$item = new Item();

//Xu ly them
$tile = $_POST['tile'];
$excerpt = $_POST['excerpt'];
$conten = $_POST['conten'];
$image = $_FILES["fileUpload"]["name"];
$category = $_POST['category'];
$featured = $_POST['featured'];
$views = $_POST['views'];
$author = $_POST['author'];
$item->addItem($tile, $excerpt, $conten, $image, $category, $featured, $views, $author);
//Xu ly upLoad file, ko kiem tra
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
header('location:items.php');

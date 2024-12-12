<?php
include "config.php";
include "models/db.php";
include "models/item.php";
$item = new Item();

//Xu ly them
$id = $_POST['id'];
$tile = $_POST['tile'];
$excerpt = $_POST['excerpt'];
$conten = $_POST['conten'];
$image = isset($_FILES["fileUpload"]["name"])?$_FILES["fileUpload"]["name"]:"";
//var_dump($_FILES);
//var_dump($image);
$category = $_POST['category'];
$featured = $_POST['featured'];
$views = $_POST['views'];
$author = $_POST['author'];
$item->updateItem($tile, $excerpt, $conten, $image, $category, $featured, $views, $author, $id);
$sql="UPDATE `items`
    SET `tile`='$tile', `excerpt`='$excerpt', `conten`='$conten', `category`=$category, `featured`=$featured, `views`=$views, `author`=$author
    WHERE `id` = $id";
    var_dump($sql);
//Xu ly upLoad file, ko kiem tra
if(isset($_FILES['fileUpload'])){
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
}
else{
    echo "ko upload dc";
}
header('location:items.php');
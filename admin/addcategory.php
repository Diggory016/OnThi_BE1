<?php
include "config.php";
include "models/db.php";
include "models/category.php";
$cate = new Category();

//Xu ly them
$name = $_POST['name'];
$slug = $_POST['slug'];
$parent = $_POST['parent'];

$cate->addCate($name, $slug, $parent);
header('location:categories.php');
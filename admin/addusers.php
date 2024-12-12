<?php
include "config.php";
include "models/db.php";
include "models/user.php";
$user = new User();

//Xu ly them
$name = $_POST['name'];
$user->addUser($name);
header('location:users.php');
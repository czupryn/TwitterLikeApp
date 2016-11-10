<?php

require_once '../Model/Database.php';
require_once '../Model/User.php';

$conn = Database::createConnection();



include '../View/registerForm.php';


$newUser = new User();
$newUser->setUsername($_POST['username']);
$newUser->setPassword($_POST['password']);
$newUser->setEmail($_POST['email']);

$newUser->saveToDB($conn);
//var_dump($newUser->saveToDB($conn));
//if ($newUser->saveToDB($conn) == false) {
//    echo "email exists in database, choose different email";
//} else {
//    echo "User successfully added";
//}
$conn->close();
$conn = null;

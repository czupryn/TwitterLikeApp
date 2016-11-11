<?php

require_once '../Model/Database.php';
require_once '../Model/User.php';

$conn = Database::createConnection();

//include '../View/registerForm.php';

$modifyUser=User::loadUserById($conn, 5);

$modifyUser->setPassword('1234');
$modifyUser->setEmail('mom@dat.pl');
$modifyUser->saveToDB($conn);
$conn->close();
$conn = null;



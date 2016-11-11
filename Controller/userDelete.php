<?php

require_once '../Model/Database.php';
require_once '../Model/User.php';

$conn = Database::createConnection();

//include '../View/registerForm.php';

$modifyUser=User::loadUserById($conn, 43);

$modifyUser->delete($conn);
$conn->close();
$conn = null;



<?php
session_start();

require_once '../Model/Database.php';
require_once '../Model/User.php';
require_once './movePage.php';

$conn = Database::createConnection();

include '../View/login.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailExists = User::checkIfEmailExists($conn, $email);
    if ($emailExists) {
        $loadedUser = User::loadUserByEmail($conn, $email);
        $checkPass = password_verify($password, $loadedUser->getPassword());
        if ($checkPass) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username']= $loadedUser->getUsername();
            $_SESSION['userEmail']= $loadedUser->getEmail();
            $_SESSION['userId']= $loadedUser->getId();
            movePage(100, './mainPage.php');
        } else {
            echo "incorrect login/password.Try again";
        }
    }
    else {
        echo "incorrect login/password.Try again";
    }
}


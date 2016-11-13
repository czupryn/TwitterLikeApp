<?php

session_start();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {

    require_once '../Model/Database.php';
    require_once '../Model/User.php';
    require_once '../View/searchForUser.php';
    $conn = Database::createConnection();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $users = User::searchUserByEmail($conn, $email);
        include_once '../View/searchForUserResult.php';
    }
} else {
    include_once '../Controller/userLogin.php';
}

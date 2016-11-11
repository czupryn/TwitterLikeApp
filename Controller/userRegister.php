<?php

require_once '../Model/Database.php';
require_once '../Model/User.php';

$conn = Database::createConnection();

include '../View/registerForm.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailExists = User::checkIfEmailExists($conn, $email);

    if (!$emailExists && $email !== '' && $password !== '' && $username !== '') {
        $newUser = new User();
        $newUser->setUsername($username);
        $newUser->setPassword($password);
        $newUser->setEmail($email);
        $newUser->saveToDB($conn);
        echo "<p id='userRegistered'>User successfully added</p>";
    } elseif ($username == '' OR $password == '' OR $email == '') {
        echo "Please fill all fields";
    } else {
        echo "<p id='emailExists'> User with email $email exists in database, choose different email</p>";
    }
}

$conn->close();
$conn = null;

<?php

session_start();
require_once './movePage.php';

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    
    unset($_SESSION['loggedIn']);
    unset($_SESSION['username']);
    unset($_SESSION['userEmail']);
    unset($_SESSION['userId']);
    
    echo "Successfully logged out!<br>";
}
include_once '../View/goToLogin.php';


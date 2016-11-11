<?php

session_start();
require_once './movePage.php';

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedin'] == true) {
    unset($_SESSION['loggedIn']);
    echo "succesfully logged out";
}
movePage(100, '../View/login.php');


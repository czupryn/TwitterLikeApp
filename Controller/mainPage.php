<?php
session_start();






if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    require_once '../Model/Database.php';
    
    echo " Hello, ". $_SESSION['username']."! ";
    include_once '../View/logout.php';
    
    require_once '../Model/Tweet.php';
    
    include_once '../Controller/createTweet.php';
    include_once '../Controller/showPosts.php';
    
}
else {
    include_once '../View/login.php';
}
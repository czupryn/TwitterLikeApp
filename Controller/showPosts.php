<?php

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    require_once '../Model/Tweet.php';
    require_once '../Model/Database.php';
    
    $conn = Database::createConnection();
    $tweets = Tweet::loadAllTweets($conn);
    include_once '../View/showPosts.php';
} else {
    include_once '../View/goToLogin.php';
}


<?php
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    require_once '../Model/Tweet.php';
    require_once '../Model/Database.php';
    require_once '../Model/User.php';
    
   
    $conn = Database::createConnection();
    $tweets = Tweet::loadTweetsByUser_id($conn, $_GET['User_id']);
    include_once '../View/showUserPosts.php';
    
    
}
else {
    include_once '../Controller/userLogin.php';
}


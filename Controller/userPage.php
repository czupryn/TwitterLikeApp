<?php

session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    require_once '../Model/Database.php';
    include_once '../View/logout.php';
    
    
    if (isset($_GET['User_id'])) {
        include_once '../View/sendMessageToUser.php';
        require_once '../Model/Tweet.php';
        include_once '../Controller/showUserPosts.php';
    } else {
        echo "<br><a href='../Controller/searchForUser.php'>choose User to see its tweets</a>";
    }
} else {
    include_once '../View/login.php';
}
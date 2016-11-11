<?php

session_start();

require_once '../Model/Database.php';
require_once '../Model/Tweet.php';


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    
    
    echo "Hello, ". $_SESSION['username']."!";
    
    $conn = Database::createConnection();
    
    include_once '../Controller/posts.php';
    
} else {
    echo "log in to see this page";
}
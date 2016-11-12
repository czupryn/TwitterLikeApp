<?php


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    require_once '../Model/Database.php';
    require_once '../Model/Tweet.php';
    include '../View/createTweet.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $newTweet = new Tweet();
        $newTweet->setUser_id($_SESSION['User_id']);
        $newTweet->setMessage($_POST['message']);
        $newTweet->setCreationDate(date("Y-m-d H:i:s"));

        $conn = Database::createConnection();
        $newTweet->saveTweetToDB($conn);
    }
}
else{
    include_once '../View/goToLogin.php';
    echo " to create a tweet. ";
}
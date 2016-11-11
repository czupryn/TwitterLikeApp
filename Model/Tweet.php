<?php

//klasa do obsługi tabeli Tweet
class Tweet {

    private $id;
    private $User_id;
    private $message;
    private $creationDate;

    public function __construct() {
        $this->id = -1;
        $this->User_id = "";
        $this->message = "";
        $this->creationDate = "";
    }

    //setters

    public function setUser_id($newUser_id) {
        $this->User_id = $newUser_id;
    }

    public function setMessage($newMessage) {
        $this->message = $newMessage;
    }

    public function setCreationDate($newDate) {
        $this->creationDate = $newDate;
    }

    //getters

    public function getUser_id() {
        return $this->message;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function getMessage() {
        return $this->message;
    }

    static public function loadTweetById(mysqli $connection, $id) {
        $queryLoadTweet = "SELECT * FROM Tweet WHERE `id`=(?)";
        $result = $connection->prepare($queryLoadUsers);
        $result->bind_param('i', $id);
        $result->execute();
        $searchResult = $result->get_result();
        if ($result == true) {
            $row = $searchResult->fetch_assoc();

            $loadedTweet = new Tweet();
            $loadedTweet->id = $row['id'];
            $loadedTweet->User_id = $row['User_id'];
            $loadedTweet->message = $row['message'];
            $loadedTweet->creationDate = $row['creationDate'];
            return $loadedTweet;
        }
        return null;
    }

    static public function loadAllTweets(mysqli $connection) {
        $sql = "SELECT * FROM Tweet";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->User_id = $row['User_id'];
                $loadedTweet->message = $row['message'];
                $loadedTweet->creationDate = $row['creationDate'];

                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }

    static public function loadTweetsByUser_id(mysqli $connection, $User_id) {
        $queryLoadTweets = "SELECT * FROM Tweet WHERE `User_id`=(?)";
        $ret = [];
        $result = $connection->prepare($queryLoadTweets);
        $result->bind_param('s', $User_id);
        $result->execute();
        $searchResult = $result->get_result();
        if ($result == true && $searchResult->num_rows != 0) {
            foreach ($searchResult as $row) {
                $row = $searchResult->fetch_assoc();
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->User_id = $row['User_id'];
                $loadedTweet->message = $row['message'];
                $loadedTweet->creationDate = $row['creationDate'];
                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }

    function saveTweetToDB(mysqli $connection) {
        if ($this->id == -1) {
            $queryInsertTweet = "INSERT INTO Tweet(User_id, message, creationDate) VALUES (?,?,?);";
            $stmt = $connection->prepare($queryInsertTweet);
            $stmt->bind_param('iss', $this->User_id, $this->message, $this->creationDate);
            if ($stmt->execute()) {
                $this->id = $connection->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE Tweet SET User_id=(?), message=(?), creationDate=(?) WHERE id=(?)";
            $result = $connection->prepare($sql);
            $result->bind_param('issi', $this->User_id, $this->message, $this->creationDate, $this->id);
            $result->execute();
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

}

<?php

//class to operate on Comment
class Comment {

    private $id;
    private $post;
    private $Tweet_id;
    private $User_id;
    private $creationDate;

    public function __construct() {
        $this->id = -1;
        $this->post = "";
        $this->Tweet_id = "";
        $this->User_id = "";
        $this->creationDate = "";
    }

    //setters

    public function setPost($newPost) {
        $this->post = $newPost;
    }

    public function setTweet_id($newTweet_id) {
        $this->Tweet_id = $newTweet_id;
    }

    public function setUser_id($newUser_id) {
        $this->User_id = $newUser_id;
    }

    public function setCreationDate($newCreationDate) {
        $this->creationDate = $newCreationDate;
    }

    //getters

    public function getPost() {
        return $this->post;
    }

    public function getTweet_id() {
        return $this->Tweet_id;
    }

    public function getUser_id() {
        return $this->User_id;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    static public function loadCommentById(mysqli $connection, $id) {
        $queryLoadComment = "SELECT * FROM Comment WHERE `id`=(?)";
        $result = $connection->prepare($queryLoadComment);
        $result->bind_param('i', $id);
        $result->execute();
        $searchResult = $result->get_result();
        if ($result == true) {
            $row = $searchResult->fetch_assoc();

            $loadedComment = new Comment();
            $loadedComment->id = $row['id'];
            $loadedComment->post = $row['post'];
            $loadedComment->Tweet_id = $row['Tweet_id'];
            $loadedComment->User_id = $row['User_id'];
            $loadedComment->creationDate = $row['creationDate'];
            return $loadedComment;
        }
        return null;
    }

    static public function loadCommentsByTweet_id(mysqli $connection, $Tweet_id) {
        $queryLoadComments = "SELECT * FROM Comment WHERE `Tweet_id`=(?) ORDER BY `creationDate` DESC";
        $ret = [];
        $result = $connection->prepare($queryLoadComments);
        $result->bind_param('i', $Tweet_id);
        $result->execute();
        $searchResult = $result->get_result();
        if ($result == true && $searchResult->num_rows != 0) {
            foreach ($searchResult as $row) {
                $loadedComment = new Comment();
                $loadedComment->id = $row['id'];
                $loadedComment->post = $row['post'];
                $loadedComment->Tweet_id = $row['Tweet_id'];
                $loadedComment->User_id = $row['User_id'];
                $loadedComment->creationDate = $row['creationDate'];
                $ret[] = $loadedComment;
            }
        }
        return $ret;
    }
    
    static public function loadCommentsByUser_id(mysqli $connection, $User_id) {
        $queryLoadComments = "SELECT * FROM Comment WHERE `User_id`=(?) ORDER BY `creationDate` DESC";
        $ret = [];
        $result = $connection->prepare($queryLoadComments);
        $result->bind_param('i', $User_id);
        $result->execute();
        $searchResult = $result->get_result();
        if ($result == true && $searchResult->num_rows != 0) {
            foreach ($searchResult as $row) {
                $loadedComment = new Comment();
                $loadedComment->id = $row['id'];
                $loadedComment->post = $row['post'];
                $loadedComment->Tweet_id = $row['Tweet_id'];
                $loadedComment->User_id = $row['User_id'];
                $loadedComment->creationDate = $row['creationDate'];
                $ret[] = $loadedComment;
            }
        }
        return $ret;
    }

    function saveTweetToDB(mysqli $connection) {
        if ($this->id == -1) {
            $queryInsertComment = "INSERT INTO Comment(post, Tweet_id, User_id, creationDate) VALUES (?,?,?,?);";
            $stmt = $connection->prepare($queryInsertComment);
            $stmt->bind_param('siis', $this->post, $this->Tweet_id, $this->User_id, $this->creationDate);
            if ($stmt->execute()) {
                $this->id = $connection->insert_id;
                return true;
            }
        } else {
            $sql = "UPDATE Comment SET post=(?), Tweet_id=(?), User_id=(?), creationDate=(?) WHERE id=(?)";
            $result = $connection->prepare($sql);
            $result->bind_param('siisi', $this->post, $this->Tweet_id, $this->User_id, $this->creationDate, $this->id);
            $result->execute();
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

}

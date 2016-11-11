<?php

//Klasa do obsługi tabeli User
class User {

    private $id;
    private $username;
    private $hashedPassword;
    private $email;

    public function __construct() {
        $this->id = -1;
        $this->username = "";
        $this->email = "";
        $this->hashedPassword = "";
    }

//setters

    public function setPassword($newPassword) {
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->hashedPassword = $newHashedPassword;
    }

    public function setUsername($newUserName) {
        $this->username = $newUserName;
    }

    public function setEmail($newEmailAddress) {
        $this->email = $newEmailAddress;
    }

    public function getPassword() {
        return $this->hashedPassword;
    }

    public function getUsername() {
        return $this->username;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function getId(){
        return $this->id;
    }

    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {
//Saving new user to DB
//            Zapisujemy obiekt do bazy tylko
//            jeżeli jego id jest równe -1
            $queryInsertUser = "INSERT INTO User(username, email, password) VALUES (?,?,?);";
            $stmt = $connection->prepare($queryInsertUser);
            $stmt->bind_param('sss', $this->username, $this->email, $this->hashedPassword);
            if ($stmt->execute()) {
                $this->id = $connection->insert_id;
                return true;
            }
        } 
        else {
            $sql = "UPDATE User SET username=(?),email=(?),password=(?) WHERE id=(?)";
            $result = $connection->prepare($sql);
            $result->bind_param('sssi', $this->username, $this->email, $this->hashedPassword, $this->id);
            $result->execute();
            if ($result == true) {
                return true;
            }
        }
        return false;
    }

    static public function loadUserById(mysqli $connection, $id) {
        $queryLoadUsers = "SELECT * FROM User WHERE `id`=(?)";
        $result = $connection->prepare($queryLoadUsers);
        $result->bind_param('i', $id);
        $result->execute();
        $searchResult = $result->get_result();
        if ($result == true) {
            $row = $searchResult->fetch_assoc();

            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->hashedPassword = $row['password'];
            $loadedUser->email = $row['email'];
            return $loadedUser;
        }
        return null;
    }

    static public function loadUserByEmail(mysqli $connection, $email) {
        $queryLoadUser = "SELECT * FROM User WHERE `email`=(?)";
        $result = $connection->prepare($queryLoadUser);
        $result->bind_param('s', $email);
        $result->execute();
        $searchResult = $result->get_result();
        if ($result == true) {
            $row = $searchResult->fetch_assoc();
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->hashedPassword = $row['password'];
            $loadedUser->email = $row['email'];
            return $loadedUser;
        }
        return null;
    }

    static public function loadAllUsers(mysqli $connection) {
        $sql = "SELECT * FROM User";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->username = $row['username'];
                $loadedUser->hashedPassword = $row['password'];
                $loadedUser->email = $row['email'];

                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }

    static public function checkIfEmailExists(mysqli $connection, $email) {
        $sql = "SELECT * FROM User WHERE `email`=(?)";
        $result = $connection->prepare($sql);
        $result->bind_param('s', $email);
        $result->execute();
        $searchResult = $result->get_result();

        if ($result == true && $searchResult->num_rows == 1) {
            return true;
        }
        return false;
    }

    public function delete(mysqli $connection) {
        if ($this->id != -1) {
            $sql = "DELETE FROM User WHERE id=(?)";
            $result = $connection->prepare($sql);
            $result->bind_param('i', $this->id);
            $result->execute();

            if ($result == true) {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }

}

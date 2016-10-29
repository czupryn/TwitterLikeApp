<?php

//Klasa do obsługi tabeli User
class Users {

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

    public function setPassword($newPassword) {
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->hashedPassword = $newHashedPassword;
    }

    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {
//Saving new user to DB
//            Zapisujemy obiekt do bazy tylko
//            jeżeli jego id jest równe -1
            $sql = "INSERT INTO User(username, email, password)
VALUES ('$this->username', '$this->email', '$this->hashedPassword')";
            $result = $connection->query($sql);
            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            }
        }
        return false;
    }

}

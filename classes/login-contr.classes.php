<?php

class LoginContr extends Login {
    private $uid;
    private $pwd;

    // Constructor to initialize properties
    public function __construct($uid, $pwd) {
        $this->uid = $uid;//this "private $uid;" = $uid
        $this->pwd = $pwd;//this "private $pwd;" = $pwd
    }

    // Method to handle user login
    public function loginUser() {
        if ($this->emptyInput() == false) {
            // Redirect if any input field is empty
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // Check the user credentials using the getUser method
        $this->getUser($this->uid, $this->pwd);
    }

    // Method to check for empty input fields
    private function emptyInput() {
        $result;
        if (empty($this->uid) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

<?php

class Dbh {
    private function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO("mysql:host=localhost;dbname=ooplogin", $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

class Signup extends Dbh {
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare("INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);");

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        if (!$stmt->execute([$uid, $hashedPwd, $email])) {
            $stmt = null;
            header("location: ../index?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare("SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;");
        if (!$stmt->execute([$uid, $email])) {
            $stmt = null;
            header("location: ../index?error=stmtfailed");
            exit();
        }

        $resultCheck = $stmt->rowCount() > 0 ? false : true;
        $stmt = null;
        return $resultCheck;
    }
}

class SignupContr extends Signup {
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdrepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        
        if ($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }

        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }

        if ($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        if ($this->uidTakenCheck() == false) {
            header("location: ../index.php?error=emailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput() {
        return !empty($this->uid) && !empty($this->pwd) && !empty($this->pwdrepeat) && !empty($this->email);
    }

    private function invalidUid() {
        return preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
    }

    private function invalidEmail() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function pwdMatch() {
        return $this->pwd === $this->pwdrepeat;
    }

    private function uidTakenCheck() {
        return $this->checkUser($this->uid, $this->email);
    }
}

// Handling the form submission
if (isset($_POST["submit"])) {
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    $signup->signupUser();

    header("location: ../index.php?error=none");
}

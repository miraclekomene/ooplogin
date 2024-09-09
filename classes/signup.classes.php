<?php

class Signup extends Dbh{

    protected function setUser($uid, $pwd, $email){ //the variables are properties inside the "SignupContr" class
        $stmt = $this->connect()->prepare('INSERT INTO `users`(`users_uid`, `users_pwd`, `users_email`) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        // if query statement fails
        if(!$stmt->execute(array($uid, $hashedPwd, $email))){//replace the "?" with the actual data "$uid","$email"
            $stmt = null;
            header("location: ../index?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    
    protected function checkUser($uid, $email){ //the variables are properties inside the "SignupContr" class
        $stmt = $this->connect()->prepare("SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;");
        // if query statement fails
        if(!$stmt->execute(array($uid,$email))){//replace the "?" with the actual data "$uid","$email"
            $stmt = null;
            header("location: ../index?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

    // getting users unique id
    protected function getUserId($uid){
        // "protected" field or property is used for referencing to this class or any other class that it "extends" to
        // which means it can only be accessed in this class(Signup) and it's child classes
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ?;');
        
        if (!$stmt->execute(array($uid))) {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit(); // exit the entire method if there is any error. so it won't continue with any other code that is below the if condition
        }
        
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: profile.php?error=profilenotfound");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }
}
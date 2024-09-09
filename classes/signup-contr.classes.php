<?php

class SignupContr extends Signup{
    // properties
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;

    // constructor
    public function __construct($uid, $pwd, $pwdrepeat, $email){ // the variables in the parenthesis are the data we get from the user. Note: they are not the the properties listed above. 
        // assigning the properties inside the "SignupContr" class to be = the variables in the "__construct" parenthesis
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    private function emptyInput(){
        $result; // a variable we can insert our true or false statement into
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidUid(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->uid)){//validate username
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){ //validate email
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(){
        $result;
        if($this->pwd !== $this->pwdrepeat){
            $result = false;
            // return false;
        }else{
            $result = true;
            // return true;
        }
        return $result;
    }

    private function uidTakenCheck(){
        $result;
        if(!$this->checkUser($this->uid, $this->email)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    public function signupUser(){
        $result; // a variable we can insert our true or false statement into
        if($this->emptyInput() == false){
            // echo "Empty input";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        
        if($this->invalidUid() == false){
            // echo "Invalid Username";
            header("location: ../index.php?error=username");
            exit();
        }

        if($this->invalidEmail() == false){
            // echo "Invalid email";
            header("location: ../index.php?error=email");
            exit();
        }

        if($this->pwdMatch() == false){
            // echo "password don't match";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->uidTakenCheck() == false){
            // echo "Username or email taken";
            header("location: ../index.php?error=emailtaken");
            exit();
        }

        // if there are no error in the form refer to the "signup" 
        // class in the "signup.classes.php" file using "setUser()" method
        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    

    public function fetchUserId($uid){
        $userId = $this->getUserId($uid);
        return $userId[0]['users_id'];
    }
}
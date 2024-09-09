<?php

class ProfileInfoContr extends ProfileInfo {
    private $userId;
    private $userUid;

    public function __construct($userIdData, $userUidData){
        $this->userId = $userIdData;
        $this->userUid = $userUidData;
    }

    public function defaultProfileInfo(){
        $profileAbout = "Tell People about yourself, your interests, hobbies, or favourite TV Show!";
        $profileTitle = "Hi! I am " . $this->$userUid;
        $profileText = "welcome to my profile page! soon I'll be able to tell you more about myself, and what you can find on my profile page.";
        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
    }

    public function updateProfileInfo($about, $introTitle, $introText){
        // error handlers
        if ($this->emptyInputCheck($about, $introTitle, $introText) == true){
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }
        // for more errors you can paste the code below
        // e.g if ($this->invalidCharsCheck($about, $introTitle, $introText) == true){}


        // update profile info

         
        $this->setNewProfileInfo($about, $introTitle, $introText, $this->userId);


    }

    // check input for various things and make it private because it's been used by the this class "ProfileInfoContr"
    private function emptyInputCheck($about, $introTitle, $introText){
        $result;
        if (empty($about) || empty($introTitle) || empty($introText)){
            // $result = false;
            $result = true;
        }else{
            $result = false;
        } 
        return $result; 
    }
} 
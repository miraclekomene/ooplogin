<?php

class ProfileInfo extends Dbh {
    
    protected function getProfileInfo($userId){
        $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE users_id = ?;');// referencing to this class or any other class that it "extends" to
        
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            // header("location: profile.php?error=stmtfailed");
            header("location: index.php?error=stmtfailed");
            exit(); // exit the entire method if there is any error. so it won't continue with any other code that is below the if condition
        }
        
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: profile.php?error=profilenotfound");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);  //To Fetch a single row use "fetch(PDO::FETCH_ASSOC)"

        return $profileData;
    }
    
    protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId){
        $stmt = $this->connect()->prepare('UPDATE profiles SET profiles_about = ?, profiles_introtitle = ?, profiles_introtext = ? WHERE users_id = ?;');// referencing to this class or any other class that it "extends" to
        
        if (!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("location:profile.php?error=stmtfailed");
            exit(); // exit the entire method if there is any error. so it won't continue with any other code that is below the if condition
        }
        
        $stmt = null;
    }

    protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId){
        $stmt = $this->connect()->prepare('INSERT INTO profiles (profiles_about, profiles_introtitle, profiles_introtext, users_id) VALUES (?,?,?,?);');// referencing to this class or any other class that it "extends" to
        
        if (!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit(); // exit the entire method if there is any error. so it won't continue with any other code that is below the if condition
        }
        
        $stmt = null;
    }
}
<?php
// if (isset($_POST["submit"])) {
    // OR
if($_SERVER['REQUEST_METHOD'] == "POST"){//TECNICALLY CORRECT WAY
    


    // Grabbing the data
    $uid = htmlspecialchars($_POST["uid"], ENT_QUOTES, 'UTF-8');//this converts the input data into a string and sanitizes the information that is submitted by the user so they don't accidentally post something that will mess with the data stored in the database 
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');
    $pwdRepeat = htmlspecialchars($_POST["pwdrepeat"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');

    // Instantiate (create object base on class that haven't been created yet) SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email); //instantiate object
    // Running Error Handlers And User signup
    $signup->signupUser();
    
    // get user id;
    $userId = $signup->fetchUserId($uid);
    // Instantiate (create object base on class that haven't been created yet) ProfileInfoContr class
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";
    $profileInfo = new ProfileInfoContr($userId, $uid); //instantiate object
    $profileInfo->defaultProfileInfo();

    // going back to front page
    header("location: ../index.php?error=none");
}
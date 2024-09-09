<?php

if (isset($_POST["submitlogin"])) {

    // Escape HTML entities to prevent XSS attacks
    // Grabbing the data from the form
    //this converts the input data into a string and sanitizes the information that is submitted by the user so they don't accidentally post something that will mess with the data stored in the database 
    $uid = htmlspecialchars($_POST["login-uid"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["login-pwd"], ENT_QUOTES, 'UTF-8');
   
    // // Trim to remove extra spaces
    // $uid = trim($_POST["login-uid"]);
    // $pwd = trim($_POST["login-pwd"]);
    // Instantiate LoginContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($uid, $pwd);

    // Running error handlers and logging in the user
    $login->loginUser();

    // Redirect to the dashboard or a different page after successful login
    // header("location: ../dashboard.php");
    header("location: ../index.php?loginerror=none");
    exit();
} else {
    header("location: ../index.php");
    exit();
}

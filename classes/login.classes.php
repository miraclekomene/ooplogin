<?php
session_start();

// class Login extends Dbh {

//     // Method to verify user credentials
//     protected function getUser($uid, $pwd) {
//         // Prepare the SQL statement
//         $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_id = ? OR users_uid = ?;');

//         // If the statement execution fails
//         if (!$stmt->execute(array($uid, $uid))) {
//             $stmt = null;
//             header("location: ../index.php?error=stmtfailed");
//             exit();
//         }

//         // Check if the user exists
//         if ($stmt->rowCount() == 0) {
//             $stmt = null;
//             header("location: ../index.php?error=usernotfound");
//             exit();
//         }

//         // Fetch the user data
//         $user = $stmt->fetch(PDO::FETCH_ASSOC);
//         $pwdHashed = $user['users_pwd'];
//         $stmt = null;

//         // Verify the password
//         $checkPwd = password_verify($pwd, $pwdHashed);

//         if ($checkPwd == false) {
//             header("location: ../index.php?error=wrongpassword");
//             exit();
//         } elseif ($checkPwd == true) {
//             // Password matches, set the session variables
//             $_SESSION["userid"] = $user['users_uid'];
//             $_SESSION["useruid"] = $user['users_uid'];
//             $_SESSION["useremail"] = $user['users_email'];

//             // Redirect to the homepage or a dashboard
//             header("location: ../index.php?login=success");
//             exit();
//         }
//     }
// }


// OR



// class Login extends Dbh {
  
//     // Method to verify user credentials
//     protected function getUser($uid, $pwd) {
//         // Prepare the SQL statement
//         $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ?;');

//         // Execute the statement with the provided username and email
//         // If the statement execution fails
//         // if (!$stmt->execute([$uid, $pwd])) {
//         // if (!$stmt->execute(array($uid, $pwd))) {
//         if (!$stmt->execute(array($uid, $uid))) { // Should be same variable for both uid and email

//             $stmt = null;
//             header("location: ../index.php?error=stmtfailed");
//             exit();
//         }

//         // Check if the user exists
//         if ($stmt->rowCount() == 0) {
//             $stmt = null;
//             header("location: ../index.php?error=usernotfound");
//             exit();
//         }

        
//         // $hashing = $stmt->fetch(PDO::FETCH_ASSOC);
//         // $pwdHashed = $hashing['users_pwd'];
//         // $stmt = null;
//         // or 
//         $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         $checkPwd = password_verify($pwd, $pwdHashed[0]['users_pwd']);

//         // Verify the password
//         // $checkPwd = password_verify($pwd, $pwdHashed);

//         if ($checkPwd == false) {
//             header("location: ../index.php?error=wrongpassword");
//             exit();
//         } elseif ($checkPwd == true) {
//             // Prepare the SQL statement
//             $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

//             if (!$stmt->execute(array($uid, $uid, $pwd))) {

//                 $stmt = null;
//                 header("location: ../index.php?error=stmtfailed");
//                 exit();
//             }

//             if ($stmt->rowCount() == 0) {
//                 $stmt = null;
//                 header("location: ../index.php?error=usernotfound");
//                 exit();
//             }
//             $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             // OR
//             // $user = $stmt->fetch(PDO::FETCH_ASSOC);
//             // Password matches, set the session variables
//             // $_SESSION["userid"] = $user['users_id'];
//             // $_SESSION["useruid"] = $user['users_uid'];
//             // $_SESSION["useremail"] = $user['users_email'];
            
//             $_SESSION["userid"] = $user[0]['users_id'];
//             $_SESSION["useruid"] = $user[0]['users_uid'];
//             $_SESSION["useremail"] = $user[0]['users_email'];

//             // Redirect to the homepage or a dashboard
//             header("location: ../index.php?login=success");
//             exit();
//         }
//     }
// }


// OR

class Login extends Dbh {
  
    // Method to verify user credentials
    protected function getUser($uid, $pwd) {
        // Prepare the SQL statement
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ?;');

        // Execute the statement with the provided username and email
        if (!$stmt->execute(array($uid, $uid))) { // Same variable for both uid and email
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        // Check if the user exists
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        // Fetch the user data
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pwdHashed = $user[0]['users_pwd'];

        // Verify the password
        $checkPwd = password_verify($pwd, $pwdHashed);

        if ($checkPwd == false) {
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkPwd == true) {
            // Password matches, set the session variables
            $_SESSION["userid"] = $user[0]['users_id'];
            $_SESSION["useruid"] = $user[0]['users_uid'];
            $_SESSION["useremail"] = $user[0]['users_email'];

            // Redirect to the homepage or a dashboard
            header("location: ../index.php?login=success");
            exit();
        }
    }
}

<?php
session_start();

// if (!isset($_SESSION['userid'])) {
//     header("location: login.php");
//     exit();
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">MyLogo</div>
        <ul class="nav-links">
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <div class="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                
                <?php
                // if (isset($_GET['login'] == 'success')) {
                if (isset($_SESSION['userid'])) {
                ?>
                    <li><a href="profile.php"><?php echo $_SESSION['useruid']; ?></a></li>
                    <li><a href="./includes/logout.inc.php">LOGOUT</a></li>
                <?php }else{ ?>
                <li><a href="#">SIGN UP</a></li>
                <li><a href="#">LOGIN</a></li>
                <?php } ?>
            </div>
        </ul>
    </nav>
    <style>
        /* Navbar styling */
        .navbar {
            background-color: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        /* Navigation links */
        .nav-links {
            display: flex;
            list-style: none;
        }

        /* Hamburger menu */
        .hamburger {
            display: none;
            font-size: 30px;
            cursor: pointer;
        }

        /* Hide the checkbox input */
        #checkbox_toggle {
            display: none;
        }

        /* Menu items */
        .menu {
            display: flex;
            gap: 15px;
        }

        .menu li a {
            color: white;
            text-decoration: none;
            padding: 7px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .menu li a:hover {
            background-color: #575757;
        }

        /* Responsive menu (for mobile screens) */
        @media (max-width: 768px) {
            .menu {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: #333;
                position: absolute;
                top: 50px;
                left: 0;
                z-index: 1;
            }
            
            .menu li {
                text-align: center;
                padding: 15px 0;
                border-top: 1px solid #575757;
            }

            .menu li a {
                padding: 10px 15px;
            }

            .hamburger {
                display: block;
            }

            /* Toggle the menu when the checkbox is checked */
            #checkbox_toggle:checked + .menu {
                display: flex;
            }
        }
    </style>
    <div class="bodyContainer">
        <div class="container">
            <!-- Signup Form -->
            <div class="form-container signup">
                <h2>Signup</h2>
                <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'emptyinput') {
                            echo "<p style='color: red;'>Fill in all Input.</p>";
                        }
                        if ($_GET['error'] == 'username') {
                            echo "<p style='color: red;'>Invalid Username.</p>";
                        }
                        if ($_GET['error'] == 'email') {
                            echo "<p style='color: red;'>Invalid email.</p>";
                        }
                        if ($_GET['error'] == 'emailtaken') {
                            echo "<p style='color: red;'>Email already exist.</p>";
                        }
                        if ($_GET['error'] == 'passwordmatch') {
                            echo "<p style='color: red;'>Password does not match.</p>";
                        }
                        if ($_GET['error'] == 'stmtfailed') {
                            echo "<p style='color: red;'>There was an issue with your request. Please try again.</p>";
                        }
                        // if there are no errors
                        if ($_GET['error'] == 'none') {
                            echo "<p style='color: green;'>Operation successful! You can now log in.</p>";
                        }
                        // OR
                        // if ($_GET['error'] == 'none') {
                        //     header("Location: login.php");
                        //     exit();
                        // }
                        // OR
                        // if ($_GET['error'] == 'none') {
                        //     echo "<div class='success-message'>
                        //             <p>Signup successful! You can now log in.</p>
                        //             <a href='login.php' class='btn'>Log In</a>
                        //           </div>";
                        // }
                    }
                ?>
                <form action="./includes/signup.inc.php" method="post">
                    <div class="input-group">
                        <label for="signup-username">Username</label>
                        <input type="text" id="signup-username" name="uid" required>
                    </div>
                    <div class="input-group">
                        <label for="signup-email">Email</label>
                        <input type="email" id="signup-email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="signup-password">Password</label>
                        <input type="password" id="signup-password" name="pwd" required>
                    </div>
                    <div class="input-group">
                        <label for="signup-password">Repeat Password</label>
                        <input type="password" id="signup-repeatpassword" name="pwdrepeat" required>
                    </div>
                    <button type="submit" name="submit" class="btn">Signup</button>
                </form>
            </div>
    
            <!-- Login Form -->
            <div class="form-container login">
                <h2>Login</h2>
                <form action="includes/login.inc.php" method="post">
                    <div class="input-group">
                        <label for="login-username">Username</label>
                        <input type="text" id="login-uid" name="login-uid" required>
                    </div>
                    <!-- <div class="input-group">
                        <label for="login-email">Email</label>
                        <input type="email" id="login-email" name="login-email" required>
                    </div> -->
                    <div class="input-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" name="login-pwd" required>
                    </div>
                    <button type="submit" name="submitlogin" class="btn">Login</button>
                </form>
            </div>        
        </div>
    </div>

    <style>
        /* Basic Reset  */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bodyContainer {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 80%;
            max-width: 900px;
            flex-direction: row;
            transition: flex-direction 0.3s ease;
        }

        .form-container {
            padding: 20px;
            width: 50%;
        }

        .login {
            border-right: 1px solid #ddd;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 90%;
                max-width: 500px;
            }

            .form-container {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #ddd;
                padding: 15px;
            }

            .login {
                border-bottom: 1px solid #ddd;
            }

            h2 {
                font-size: 20px;
            }

            .input-group input {
                padding: 8px;
            }

            .btn {
                padding: 8px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 10px;
            }

            h2 {
                font-size: 18px;
            }

            .input-group label {
                font-size: 12px;
            }

            .input-group input {
                padding: 6px;
                font-size: 12px;
            }

            .btn {
                padding: 6px;
                font-size: 12px;
            }
        }


    </style>
</body>
</html>

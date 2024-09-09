<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        session_start();
        include "./classes/dbh.classes.php";
        include "./classes/profileinfo.classes.php";
        // include "./classes/profileinfo-contr.classes.php";
        include "./classes/profileinfo-view.classes.php";
        
        $profileInfo = new ProfileInfoView();
    ?>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-img">
                <img src="https://via.placeholder.com/150" alt="Profile Image">
            </div>
            <div class="profile-nav-info">
                <h3 class="user-name">
                    <!-- John Doe -->
                    <?php
                    echo $_SESSION['useruid'];
                    ?>
                </h3>
                <div class="address">
                    <p class="state">New York, USA</p>
                </div>
            </div>
            <div class="profile-options">
                <button class="btn">Follow</button>
                <button class="btn">Message</button>
            </div>
        </div>

        <div class="profile-content">
            <div class="profile-about">
                <h4>About</h4>
                <p>
                    <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor ac eros sit amet vestibulum. -->
                    <?php
                    $profileInfo->fetchTitle($_SESSION['userid']);
                    ?>
                </p>
                <br>
                <h4>Hello world</h4>
                <p>
                    <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor ac eros sit amet vestibulum. -->
                    <?php
                        $profileInfo->fetchText($_SESSION['userid']);
                    ?>
                </p>
                <p>
                    <?php
                        $profileInfo->fetchAbout($_SESSION['userid']);
                    ?>
                </p>
                <p><a href="profilesettings.php">Settings</a></p>
            </div>
            <div class="profile-social-links">
                <h4>Social Links</h4>
                <ul>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">LinkedIn</a></li>
                    <li><a href="#">GitHub</a></li>
                </ul>
            </div>




            <!-- <div class="profile-details">
                <h4>Details</h4>
                <ul>
                    <li><strong>Email:</strong> john.doe@example.com</li>
                    <li><strong>Phone:</strong> +1 234 567 890</li>
                    <li><strong>Location:</strong> New York, USA</li>
                </ul>
            </div>
            <div class="profile-skills">
                <h4>Skills</h4>
                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JavaScript</li>
                    <li>React.js</li>
                    <li>Node.js</li>
                </ul>
            </div> -->
        </div>
    </div>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Body */
        body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Profile Container */
        .profile-container {
            background-color: #fff;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Profile Header */
        .profile-header {
            background-color: #6c63ff;
            padding: 20px;
            color: #fff;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        /* Profile Image */
        .profile-img img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #fff;
        }

        /* Profile Info */
        .profile-nav-info {
            text-align: center;
            margin-top: 15px;
        }

        .user-name {
            font-size: 22px;
            font-weight: bold;
        }

        .address p {
            font-size: 14px;
            color: #ddd;
        }

        /* Profile Options */
        .profile-options {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            background-color: #fff;
            color: #6c63ff;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #eee;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
        }

        .profile-about,
        .profile-social-links {
            margin-bottom: 20px;
        }

        .profile-about h4,
        .profile-social-links h4 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        .profile-about p {
            font-size: 14px;
            color: #666;
        }

        .profile-social-links ul {
            list-style-type: none;
        }

        .profile-social-links li {
            margin-bottom: 10px;
        }

        .profile-social-links a {
            text-decoration: none;
            color: #6c63ff;
            font-size: 14px;
        }

        .profile-social-links a:hover {
            text-decoration: underline;
        }


        .profile-bio, .profile-details, .profile-skills {
            margin-bottom: 20px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .profile-container {
                width: 90%;
            }

            .profile-header {
                padding: 15px;
            }

            .btn {
                padding: 6px 12px;
                font-size: 12px;
            }
        }

    </style>
</body>
</html>

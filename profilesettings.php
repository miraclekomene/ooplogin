<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #6c63ff;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        /* Buttons */
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #6c63ff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #5a54d8;
        }

        .btn.cancel {
            background-color: #ff4d4d;
        }

        .btn.cancel:hover {
            background-color: #e64444;
        }

        /* Profile Image */
        .profile-img {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .profile-img img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ddd;
        }

        .profile-img input[type="file"] {
            margin-top: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }
        }

    </style>
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

    <div class="container">
        <h2>Profile Settings</h2>
        <div class="profile-img">
            <img src="https://via.placeholder.com/120" alt="Profile Picture">
        </div>

        <!-- updateProfile.php -->
        <form action="./includes/profileinfo.inc.php" method="POST" enctype="multipart/form-data">
            <!-- Profile Image Upload -->
            <div class="form-group">
                <label for="profileImage">Change Profile Picture</label>
                <input type="file" name="profileImage" id="profileImage">
            </div>

            <!-- User Information Form -->
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" value="<?php $profileInfo->fetchTitle($_SESSION['userid']); ?>" placeholder="John" required>
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" placeholder="Doe" value="<?php echo $_SESSION['useruid'];?>" required>
                </div>
            </div>

            <!-- <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="john.doe@example.com" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="+1 234 567 890">
                </div>
            </div> -->

            <div class="form-group">
                <label for="bio">Bio</label>
                <input type="text" name="bio" id="bio" placeholder="A brief bio about yourself" value="<?php $profileInfo->fetchAbout($_SESSION['userid']); ?>">
            </div>

            <!-- <div class="form-row">
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" name="newPassword" id="newPassword" placeholder="Enter new password">
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm new password">
                </div>
            </div> -->

            <!-- Action Buttons -->
            <div class="btn-container">
                <button type="submit" class="btn">Save Changes</button>
                <button type="button" class="btn cancel" onclick="window.location.href='profile.php'">Cancel</button>
            </div>
        </form>
    </div>

</body>
</html>

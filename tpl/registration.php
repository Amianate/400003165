<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>User Registration</title>
</head>

<body>
    <div id="box">
        <form action="regisValidation.php" method="post">
            <div class="regisForm">
                <!-- Username field and label -->
                <label for="usernameField" class="labels">Username</label>
                <input type="text" id="username" name="usernameField" class="inputs">
                <br>

                <!-- Email field and label -->
                <label for="emailField" class="labels">Email</label>
                <input type="text" id="email" name="emailField" class="inputs">
                <br>

                <!-- Password field and label -->
                <label for="pwField" class="labels">Password</label>
                <input type="password" id="pw" name="pwField" class="inputs">
                <br>

                <input type="submit" value="Register" id="regisButton">

            </div>
        </form>
        <div id="footer">
            <p>Copyright © Nathan White. All Rights Reserved </p>
        </div>
    </div>
</body>

<html>

<?php
session_start();
?>
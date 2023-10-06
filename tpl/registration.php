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
                <input type="text" id="username" name="usernameField" class="inputs" required>

                <!-- Looking for error message and printing it if found -->
                <p id="nameErr" class="errMessages">
                    <?php
                        if (isset($_GET['email'])) {
                            $error_message = urldecode($_GET['name']);
                            echo "Error: " . $error_message;
                        } 
                    ?>
                </p>

                <!-- Email field and label -->
                <label for="emailField" class="labels">Email</label>
                <input type="text" id="email" name="emailField" class="inputs" required>
                
                <!-- Looking for error message and printing it if found -->
                <p id="emailErr" class="errMessages">
                    <?php
                        if (isset($_GET['email'])) {
                            $error_message = urldecode($_GET['email']);
                            echo "Error: " . $error_message;
                        } 
                    ?>
                </p>

                <!-- Password field and label -->
                <label for="pwField" class="labels">Password</label>
                <input type="password" id="pw" name="pwField" class="inputs" required>
                
                <!-- Looking for error message and printing it if found -->
                <p id="pwErr">
                    <?php
                        if (isset($_GET['pw'])) {
                            $error_message = urldecode($_GET['pw']);
                            echo "Error: " . $error_message;
                        } 
                    ?>
                </p>

                <input type="submit" value="Register" id="regisButton">

            </div>
        </form>
        <div id="footer">
            <p>Copyright © Nathan White. All Rights Reserved </p>
        </div>
    </div>
</body>

<html>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>User Creation</title>
    <?php
        session_start();
        if($_SESSION["role"] == "Research Study Manager"){
            header("Location: smDashboard.php");             
            exit();         
        }
        else 
        if($_SESSION["role"] == "Researcher"){
            header("Location: researcher.php");             
            exit();
        }
    ?>
</head>

<body>
    <div id="box">
        <form action="createUserValidation.php" method="post">
            <div class="regisForm">

                <h1 class="title">Create User</h1>

                <!-- Where errors with inserting the user are displayed  -->
                <p id="loginErr" class="errMessages">
                    <?php
                    if (isset($_GET['entry'])) {
                        $error_message = urldecode($_GET['entry']);
                        echo "Error: " . $error_message;
                    }
                    ?>
                </p>

                <!-- Username field and label -->
                <label for="usernameField" class="labels">Username</label>
                <input type="text" id="username" name="usernameField" class="inputs" required>

                <!-- Looking for error message and printing it if found -->
                <p id="nameErr" class="errMessages">
                    <?php
                    if (isset($_GET['name'])) {
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

                <!-- role select field and label -->
                <label for="roleField" class="labels">Role</label>
                <select name="roleField" id="role" class="inputs">
                    <option value="Researcher">Researcher</option>
                    <option value="Research Study Manager">Research Study Manager</option>
                </select>
                <input type="submit" value="Register" id="regisButton">

            </div>
        </form>
        <div id="footer">
            <p>Copyright © Nathan White. All Rights Reserved </p>
        </div>
    </div>
</body>

<html>
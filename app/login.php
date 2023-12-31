<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>User Login</title>
    <?php
    session_start();
    if (isset($_SESSION["role"])) {
        header("Location: AlreadyLoggedIn.php");
        exit();
    }
    ?>
</head>

<body>
    <div id="box">

        <form action="loginValidation.php" method="post">
            <div class="regisForm">

                <h1 class="title">User Login</h1>

                <!-- Looking for error message and printing it if found -->
                <p id="topErr" class="errMessages">
                    <?php
                    if (isset($_GET['error'])) {
                        $error_message = urldecode($_GET['error']);
                        echo "Error: " . $error_message;
                    }
                    ?>
                </p>

                <!-- Username field and label -->
                <label for="usernameField" class="labels">Email</label>
                <input type="text" id="username" name="emailField" class="inputs">
                <br>

                <!-- Password field and label -->
                <label for="pwField" class="labels">Password</label>
                <input type="password" id="pw" name="pwField" class="inputs">
                <br>

                <input type="submit" value="Login" id="loginButton">

                <div></div>
                <div></div>

                <p id="regisLink">No account? <br> <a href="registration.php">Register</a></p>
                
            </div>
        </form>
        <div id="footer">
            <p>Copyright © Nathan White. All Rights Reserved </p>
        </div>
    </div>
</body>

<html>
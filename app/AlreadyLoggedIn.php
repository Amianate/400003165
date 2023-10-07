<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>User Registration</title>

    <?php
        if (!isset($_SESSION["role"])) {
            header("Location: Login.php");
            exit();
        }
    ?>

</head>

<body>
    <div id="box" class="already">
        <h1>YOU ARE ALREADY LOGGED IN.</h1>
        <br>
        <h3>Please Log out before trying to access these pages.</h3>

        <a href="
        <?php session_start();

        if ($_SESSION["role"] == "Research Group Manager") {
            echo "gmDashboard.php";
        } else 
        if ($_SESSION["role"] == "Researcher") {
            echo "researcher.php";
        } else {
            echo "smDashboard.php";
        }
        ?>
        ">Back to Dashboard</a>
        <br>
        <a href="logout.php">Log out</a>

        <div id="footer">
            <p>Copyright © Nathan White. All Rights Reserved </p>
        </div>
    </div>
</body>

<html>
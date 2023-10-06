<html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <?php session_start()?>
</head>

<body>
    <div id="header" class="header">
        <div id="topRow">
            <img src="../circle.jpg" alt="Plain circle" width="70px" height="70px">

            <a href="" id="logout">Log out</a>
        </div>

        <div id="bottomRow">
            <p id="userTitle">
                Researcher:
                <?php
                // Displaying the username from session variables
                if (isset($_SESSION["username"])) {
                    echo $_SESSION["username"];
                } else {
                    echo "ERROR.";
                }
                ?>

            </p>

            <p id="userEmail">
                Email:

                <?php
                // Displaying the email from session variables

                if (isset($_SESSION["email"])) {
                    echo $_SESSION["email"];
                } else {
                    echo "ERROR.";
                }
                ?>

            </p>
        </div>
    </div>
    <div class="researchpanels">

        <div class="panel-2">
            <a href="nothing">
                <p>View all studies</p>
            </a>
        </div>
    </div>

    <div id="footer">
        <p>Copyright © Nathan White. All Rights Reserved </p>
    </div>

</body>

<html>
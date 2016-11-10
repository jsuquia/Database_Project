<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Instagrim</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

    <?php
    session_start();
        if($_SESSION["Loggedin"]==false)
        {
            header("Location: login.php");
            die();
        }
    ?>

    <body>
        <header>
            <div class="title">
                <img class ="logo" src="logo.PNG">
            </div>

            <ul>
                <li><a class="current">Home</a></li>
                <li><a href="booking.php">Book Online</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </header>

        <div class="fill-screen" id=fill>
            <!--<img class='make-it-fit' src="main.png">-->
        </div>
    </body>

</html>

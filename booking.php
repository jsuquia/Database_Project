<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Instagrim</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="booking.css">
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
                <li><a href="home.php">Home</a></li>
                <li><a class="current">Book Online</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ul>
        </header>
        
        <div class="content">
            
            <div class="text">
                <h4>Services Provided</h4>
            </div>
            
            <div class="examination">
                <div class="top" id="one">
                
                </div>
                
                <div class="middle">
                    <h5>Eye Examination</h5>
                    <h6>30 min | Free</h6>
                </div>
                
                <div class="bottom">
                    <button type="button" class="button">Book It</button>
                </div>
            </div>

            <div class="fitting">
                <div class="top" id="two">
                
                </div>
                
                <div class="middle">
                    <h5>Contact Lens Fitting</h5>
                    <h6>20 min | £25.00</h6>
                </div>
                
                <div class="bottom">
                    <button type="button" class="button">Book It</button>
                </div>
            </div>

            <div class="dilation">
                <div class="top" id="three">
                
                </div>
                
                <div class="middle">
                    <h5>Eye Examination and Dilation</h5>
                    <h6>40 min | Free</h6>
                </div>
                
                <div class="bottom">
                    <button type="button" class="button">Book It</button>
                </div>
            </div>

            <div class="check">
                <div class="top" id="four">
                
                </div>
                
                <div class="middle">
                    <h5>Contact Lens Check</h5>
                    <h6>10 min | £15.00</h6>
                </div>
                
                <div class="bottom">
                    <button type="button" class="button">Book It</button>
                </div>
            </div>
        
        </div>
        
    </body>

</html>
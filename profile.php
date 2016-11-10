<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<header>
    <div class="title">
        <img class ="logo" src="logo.PNG">
    </div>

    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="booking.php">Book Online</a></li>
        <li><a class="current">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>

    </ul>
</header>
<?php 
        include "db.php";
        session_start();
        if($_SESSION["Loggedin"]==false)
        {
            header("Location: login.php");
            die();
        }
        $username=$_SESSION["Username"];
		$result = mysql_query("SELECT * FROM Patient WHERE username='$username'");
        $row = mysql_fetch_assoc($result);
        $firstname = "No firstname found";
        $lastname = "No lastname found";
        $email = "No email found";
        if(isset($row['First_Name']))$firstname = $row['First_Name'];
        if(isset($row['Last_Name']))$lastname = $row['Last_Name'];
        if(isset($row['Email']))$email = $row['Email'];
        include "closedb.php";
    
        if($_SESSION["msg"] != null)
        {
            ?>
            <style>
                .alert {
                    padding: 20px;
                    margin-right: 20px;
                    width: 18%;
                    float: right;
                    background-color: #4CAF50;
                    border-radius: .25rem;
                    color: white;
                }

                .close {
                    margin-left: 15px;
                    color: white;
                    font-weight: bold;
                    float: right;
                    font-size: 22px;
                    line-height: 20px;
                    cursor: pointer;
                    transition: 0.3s;
                }

                .close:hover {
                    color: black;
                }

            </style>

            <div class="alert">
                <span class="close" onclick="this.parentElement.style.display = 'none';">&times;</span>
                <strong>Details successfully updated!</strong>
            </div>
            <?php
            $_SESSION["msg"] = null;
        }
?>

    <body>
        <div id="layout">
            <div id="profile">
                <br>
                <h3>First Name</h3>
                <div id="test" class="details">&#8640;
                    <?php echo $firstname ?>
                </div>
                <h3>Last Name</h3>
                <div class="details">&#8640;
                    <?php echo $lastname ?>
                </div>
                <h3>Email</h3>
                <div class="details">&#8640;
                    <?php echo $email ?>
                </div>
                <br>
            </div>

            <form method="POST" action="profile.php">
                <div class="edit">
                    <input type="text" name="firstname" required placeholder="First Name">
                    <input type="text" name="surname" required="required" placeholder="Last Name">
                    <input type="email" name="email" placeholder="Email">
                    <input type="submit" ID="updatebtn" value="Update" />
                </div>
            </form>
        </div>

        <?php
        

	
	//if they have posted a value then obviously its not the first time they just arrived
	if(isset($_POST['firstname']) && $_POST['surname'])
	{
        include "db.php";
		$firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        //$email = $_POST['email'];
    
        $result = mysql_query("UPDATE Patient SET First_Name='$firstname', Last_Name='$surname' WHERE username='$username'");
        echo $result;
        session_start();
        $msg = "Details successfully updated!";
        $_SESSION["msg"]=$msg;
        header("Location: profile.php");
        die();
        include "closedb.php";
	}
	
	?>

    </body>

</html>

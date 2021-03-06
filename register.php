<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Instagrim</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
    <?php
        session_start();
        if($_SESSION["Loggedin"]==true)
        {
            header("Location: home.php");
            die();
        }
    ?>
    <div class="content">

        <form method="POST" action="register.php">

            <div class="center">

                <div class="back">
                    <a href="login.php">&#10092; back</a>
                </div>
                <div class="title">
                    <h1><span style="color: black">Specs</span><span style="color: #696969">Express</span></h1>
                    <h2>bla bla bla bla</h2>
                </div>

                <div class="fullname">
                    <input type="text" ID="firstname" name="firstname" required placeholder="First Name">
                    <input type="text" ID="surname" name="surname" required="required" placeholder="Last Name">
                </div>

                <div class="username">
                    <input type="text" name="username" placeholder="Username">
                </div>

                <div class="password">
                    <input type="password" name="password" placeholder="Password">
                </div>
                
                <div class="street">
                    <input type="text" name="street" placeholder="Street">
                </div>
                
                <div class="area">
                    <input type="text" ID="postcode" name="postcode" required placeholder="Postcode">
                    <input type="text" ID="city" name="city" required="required" placeholder="City">
                </div>
                
                <div class="email">
                    <input type="email" name="email" placeholder="Email">
                </div>
                
                <div class="phone">
                    <input type="tel" name="phone" placeholder="Phone Number">
                </div>

                <div class="submit">
                    <input type="submit" value="REGISTER" />
                </div>

                <div class="register">
                    <h4>By Signing up, you agree to our</h4>
                    <h4>Terms & Privacy Policy</h4>
                </div>

            </div>

        </form>

    </div>

    <style>
        .alert {
            padding: 20px;
            width: 18%;
            float: right;
            background-color: #ff9800;
            border-radius: .25rem;
            color: white;
        }
        
        .alert1 {
            padding: 20px;
            width: 18%;
            float: right;
            background-color:  #4CAF50;
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

    <?php
        include "db.php";

	
	
	//if they have posted a value then obviously its not the first time they just arrived
	if(isset($_POST['username']) && $_POST['password'])
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
        $result = mysql_query("SELECT * FROM Patient WHERE username='$username'");
        echo $result;
		if(mysql_num_rows($result) >0)
        {    
            ?>

        <div class="alert">
            <span class="close" onclick="this.parentElement.style.display = 'none';">&times;</span>
            <strong>Username already taken.</strong>
        </div>

        <?php
        }
        else{
        $surname = $_POST['surname'];
		$firstname = $_POST['firstname'];
        $city = $_POST['city'];
		$street = $_POST['street'];
        $postcode = $_POST['postcode'];
		$phone = $_POST['phone'];
        $email = $_POST['email'];
        $insertcontact = "INSERT INTO Contact_Details(City,Street,Post_Code, Phone_Number, Email) VALUES('$city','$street','$postcode','$phone','$email')";
		echo $insertcontact;
		$insertUserSQL = "INSERT INTO Patient(First_Name,Last_Name,Username, Password, Contact_ID) VALUES('$firstname','$surname','$username','$password',(Select ID from Contact_Details where (City = '$city' AND Street = '$street' AND Post_Code='$postcode' AND Phone_Number ='$phone' and Email = '$email')))";
		echo $insertUserSQL;
        ?>

            <div class="alert1">
                <span class="close" onclick="this.parentElement.style.display = 'none';">&times;</span>
                <strong>Successfully registered!</strong>
            </div>

            <?php
        mysql_query($insertcontact );
		mysql_query($insertUserSQL );
        }
	
    }
	include "closedb.php";
	
	
?>
                <!--<footer>
            <ul>
                <li class="footer"><a href="/Instagrim">Home</a></li>
            </ul>
        </footer> -->
</body>

</html>

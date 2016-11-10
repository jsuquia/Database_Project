<!DOCTYPE html>

<html>

<head>
    <title>Instagrim</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <div class="content">

        <form method="POST" action="login.php">

            <div class="center">
               
                <div class="title">
                    <h1><span style="color: black">Specs</span><span style="color: #696969">Express</span></h1>
                    <h2>bla bla bla bla</h2>
                </div>

                <div class="username">
                    <div class="fontawesome-user" for="login__username"></div>
                    <input type="text" name="username" required="required" placeholder="Username">
                </div>

                <div class="password">
                    <label class="fontawesome-lock" for="login__password"></label>
                    <input type="password" name="password" placeholder="Password">
                </div>

                <div class="submit">
                    <input type="submit" value="LOGIN">
                </div>

                <div class="register">
                    <h3>Not a member? <a href="register.php">Sign up now!</a></h3>
                </div>

            </div>

        </form>


    </div>

    <style>
        .alert {
            padding: 20px;
            background-color: #ff9800;
            width: 15%;
            float: right;
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
            if(isset($_POST['username']) && $_POST['password'])
	{
		$username = mysql_real_escape_string ($_POST['username']);
		$password= mysql_real_escape_string ($_POST['password']);
	
		$result = mysql_query("SELECT * FROM Patient WHERE username='$username'");
		
		if(mysql_num_rows($result) ==1)
		{
			$row = mysql_fetch_assoc($result);
			if(strcmp($password,$row['Password'])==0)
			{
				echo "your logged in!";
                session_start();
	            $_SESSION["Loggedin"]=true;
                $_SESSION["msg"]=null;
	            $_SESSION["Username"]=$username;
                header("Location: home.php");
                die();
				
			}
			else
            {
                ?>
    <div class="alert">
        <span class="close" onclick="this.parentElement.style.display = 'none';">&times;</span>
        <strong>Try again hacker!</strong>
    </div>
    <?php
            }
		}
		else
		{
            include "closedb.php";
            ?>
        <div class="alert">
            <span class="close" onclick="this.parentElement.style.display = 'none';">&times;</span>
            <strong>Incorrect</strong> username.
        </div>
        <?php
		}
		
	}?>


</body>

</html>

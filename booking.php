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
                <img class="logo" src="logo.PNG">
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
                    <button class="button" id="button1">Book It</button>
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
                    <button class="button" id="button2">Book It</button>
                </div>
            </div>

        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">×</span>
                <form method="POST" action="booking.php">

                    <div class="date">
                        <div class="inner">
                            <h7>When would you like the appointment? </h7>
                            <div class="complete">
                                <h8><input type="date" ID="date" name="date"> at <input type="time" ID="time" name="time"></h8>
                            </div>

                            <h8>In which Branch? &nbsp; &nbsp; &nbsp; branch 1<input type=checkbox name="branch1"> &nbsp; branch 2 <input type=checkbox name="branch2"> &nbsp; branch 3 <input type=checkbox name="branch3"> </h8>

                            <input type="hidden" value="Lenses" name="type">
                            <input type="hidden" value="0" name="price">
                        </div>


                    </div>

                    <div class="submit">
                        <input type="submit" value="Book Appointment" />
                    </div>
                </form>
            </div>

        </div>

        <!-- The Modal -->
        <div id="myModal1" class="modal1">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close1">×</span>
                <form method="POST" action="booking.php">

                    <div class="date">
                        <div class="inner">
                            <h7>When would you like the appointment? </h7>
                            <div class="complete">
                                <h8><input type="date" ID="date" name="date"> at <input type="time" ID="time" name="time"></h8>
                            </div>

                            <h8>In which Branch? &nbsp; &nbsp; &nbsp; branch 1<input type=checkbox> &nbsp; branch 2 <input type=checkbox> &nbsp; branch 3 <input type=checkbox value="branch 3"> </h8>

                            <input type="hidden" value="Contact Lenses" name="type">
                            <input type="hidden" value="25" name="price">
                        </div>


                    </div>

                    <div class="submit">
                        <input type="submit" value="Book Appointment" />
                    </div>
                </form>
            </div>

        </div>


        <?php
        include "db.php";
        if(isset($_POST['date']) && $_POST['time'])
        {
            if($_SESSION["Loggedin"]==false)
            {
                header("Location: login.php");
                die();
            }
            
            $username =$_SESSION["Username"];
            echo $username;
            
		    $id = mysql_query("SELECT First_Name FROM Patient WHERE username='$username'");
            echo $id;
            
            $date = $_POST['date'];
            $time = $_POST['time'];
            $type = $_POST['type'];
            $price = $_POST['price'];

            $insertappointment = "INSERT INTO appointment(Time, Date, Test_Type, Price, Employee_ID, Patient_ID, Transaction_ID) VALUES('$time','$date','$type','$price','2', '$id', '1')";
            echo $insertappointment;

            mysql_query($insertappointment);

	
        }
	    include "closedb.php";
	
	
?>

            <style>
                .modal {
                    display: none;
                    /* Hidden by default */
                    position: fixed;
                    /* Stay in place */
                    z-index: 1;
                    /* Sit on top */
                    left: 0;
                    top: 0;
                    width: 100%;
                    /* Full width */
                    height: 100%;
                    /* Full height */
                    overflow: auto;
                    /* Enable scroll if needed */
                    background-color: rgb(0, 0, 0);
                    /* Fallback color */
                    background-color: rgba(0, 0, 0, 0.4);
                    /* Black w/ opacity */
                }
                
                .modal1 {
                    display: none;
                    /* Hidden by default */
                    position: fixed;
                    /* Stay in place */
                    z-index: 1;
                    /* Sit on top */
                    left: 0;
                    top: 0;
                    width: 100%;
                    /* Full width */
                    height: 100%;
                    /* Full height */
                    overflow: auto;
                    /* Enable scroll if needed */
                    background-color: rgb(0, 0, 0);
                    /* Fallback color */
                    background-color: rgba(0, 0, 0, 0.4);
                    /* Black w/ opacity */
                }
                
                .modal-content {
                    background-color: white;
                    margin: 15% auto;
                    width: 600px;
                    height: 350px;
                    border: 1px solid lightgrey;
                    border-radius: .25rem;
                    padding: 10px;
                }
                
                .inner {
                    margin-top: 60px;
                    margin-left: 50px;
                }
                
                .complete {
                    margin-top: 50px;
                }
                
                #date {
                    width: 25%;
                    height: 25px;
                    margin-right: 15%;
                }
                
                #time {
                    width: 25%;
                    height: 25px;
                    margin-left: 15%;
                }
                
                input[type=submit] {
                    font-family: "Century Gothic", sans-serif;
                    font-size: 16px;
                    color: white;
                    margin: auto;
                    margin-right: 85px;
                    float: right;
                    border: none;
                    height: 40px;
                    width: 180px;
                    background-color: black;
                    cursor: pointer;
                }
                /* The Close Button */
                
                .close {
                    color: grey;
                    float: right;
                    margin-right: 10px;
                    font-size: 28px;
                    font-weight: bold;
                }
                
                .close:hover,
                .close:focus {
                    color: #000;
                    text-decoration: none;
                    cursor: pointer;
                }
                
                .close1 {
                    color: grey;
                    float: right;
                    margin-right: 10px;
                    font-size: 28px;
                    font-weight: bold;
                }
                
                .close1:hover,
                .close1:focus {
                    color: #000;
                    text-decoration: none;
                    cursor: pointer;
                }
                
                h7 {
                    font-family: "Century Gothic", sans-serif;
                    text-align: center;
                    font-size: 22px;
                    font-weight: 500;
                }
                
                h8 {
                    font-family: "Century Gothic", sans-serif;
                    margin: auto;
                    font-weight: 100;
                }

            </style>


            <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn1 = document.getElementById("button1");
                //var btn2 = document.getElementById("button2");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal
                btn1.onclick = function() {
                    modal.style.display = "block";
                }

                /*btn2.onclick = function() {
                    modal.style.display = "block";
                }*/

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

            </script>

            <script>
                // Get the modal
                var modal1 = document.getElementById('myModal1');

                // Get the button that opens the modal
                var btn2 = document.getElementById("button2");

                // Get the <span> element that closes the modal
                var span1 = document.getElementsByClassName("close1")[0];

                // When the user clicks the button, open the modal
                btn2.onclick = function() {
                    modal1.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span1.onclick = function() {
                    modal1.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal1) {
                        modal1.style.display = "none";
                    }
                }

            </script>

    </body>

</html>

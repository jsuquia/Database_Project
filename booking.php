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
                <!--
            <div class="dilation">
                <div class="top" id="three">

                </div>

                <div class="middle">
                    <h5>Eye Examination and Dilation</h5>
                    <h6>40 min | Free</h6>
                </div>

                <div class="bottom">
                    <input  type="button" name="eyedilation" class="button" id="button3" value="Book It">
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
                    <input  type="button" name="contactlense" class="button" id="button4" value="Book It">
                </div>
            </div>-->

        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">×</span>
                <form method="POST" action="appointment.php">

                    <div class="date">
                        <div class="inner">
                            <h7>When would you like the appointment? </h7>
                            <div class="complete">
                                <h8><input type="date" ID="date" name="date"> at <input type="time" ID="time" name="time"></h8>
                            </div>

                            <h8>In which Branch? &nbsp; &nbsp; &nbsp; branch 1<input type=checkbox> &nbsp; branch 2 <input type=checkbox> &nbsp; branch 3 <input type=checkbox value="branch 3"> </h8>
                        </div>


                    </div>

                    <div class="submit">
                        <input type="submit" value="Book Appointment" />
                    </div>
                </form>
            </div>

        </div>

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
            var btn2 = document.getElementById("button2");
            var btn3 = document.getElementById("button3");
            var btn4 = document.getElementById("button4");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn1.onclick = function() {
                modal.style.display = "block";
            }

            btn2.onclick = function() {
                modal.style.display = "block";
            }

            /*btn3.onclick = function() {
                modal.style.display = "block";
            }

            btn4.onclick = function() {
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
        
    </body>

</html>

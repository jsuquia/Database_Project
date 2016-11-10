<?php
include 'db.php';
// select statement
$query = "SELECT * FROM Patient";
$result = mysql_query($query);
// display the result

if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
echo "<br>";
while($row = mysql_fetch_array($result)){
echo $row['First_Name']." - ".$row['Last_Name']." - ".$row['Last_Glasses_Test']." - ".$row['Last_Contacts_Test']." - ".$row['NHS_Eligibility']." - ".$row['Username']." - ".$row['Password'];
echo "<br>";
}
include 'closedb.php';
?>
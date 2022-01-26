<?php

$DBserver= "localhost";
$DBusername= "root";
$DBpassword= "";
$DBname= "anketa";

$conn=mysqli_connect($DBserver, $DBusername, $DBpassword, $DBname);

if($conn==false) {
die("Your connection with database is failed".mysqli_connect_error());
} 

?>
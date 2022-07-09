<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "times";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    //If connection failed, kill process and output error message
    die("Connection failed: ".mysqli_connect_error());
}
?>
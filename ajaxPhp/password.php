<?php

header('Content-Type: application/xml');
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "times";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

  $password=$_POST['password'];
  
  invalidUsername($password);
 // echo "<p>Welcome <b>$name</b></p>";



function invalidUsername($password){
    
    if(empty($password)){
        $error="Please choose a password";
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<message><error>$error</error></message>";
    }
    
   

    else{

        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<message><error>Field validated</error></message>";
        
    }

   
}


?>

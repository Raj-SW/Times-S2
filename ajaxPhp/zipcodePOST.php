<?php

header('Content-Type: application/xml');
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "times";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

  $zipcode=$_POST['zipcode'];
  
  invalidUsername($zipcode);
 // echo "<p>Welcome <b>$name</b></p>";



function invalidUsername($zipcode){
    
    if(empty($zipcode)){
        $error="Please input your zipcode";
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<message><error>$error</error></message>";
    }
    
   

    else{

        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<message><error>Field validated</error></message>";
        
    }

   
}


?>

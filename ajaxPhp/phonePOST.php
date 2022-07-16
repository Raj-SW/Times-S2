<?php

header('Content-Type: application/xml');
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "times";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

  $phone=$_POST['phone'];
  
  invalidUsername($phone);
 // echo "<p>Welcome <b>$name</b></p>";



function invalidUsername($phone){
    
    if(empty($phone)){
        $error="Phone Number cannot be blank";
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<message><error>$error</error></message>";
    }
    
   

    else{

        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<message><error>Field validated</error></message>";
        
    }

   
}


?>

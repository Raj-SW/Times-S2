<?php

header('Content-Type: application/xml');
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "times";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

  $email=$_POST['email'];
  
  invalidUsername($conn,$email);
 // echo "<p>Welcome <b>$name</b></p>";



function invalidUsername($conn,$email){
    
    if(empty($email)){
        $error="Email cannot be blank";
        echo "<message><error>$error</error></message>";
    }
    
   

    else{

        nameTaken($conn, $email);
        
    }

   
}
function nameTaken($conn, $email){
    
    
    $sql = "SELECT * FROM userdetails WHERE userMail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../registration.php?error=statementerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $email);
    mysqli_stmt_execute($stmt);

    $queryResults = mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($queryResults)){
        $error = 'Email is already registered';

        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<message><error>$error</error></message>";
        
    } 
    else{
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<message><error>Field validated</error></message>";
    }

    mysqli_stmt_close($stmt);
}

?>

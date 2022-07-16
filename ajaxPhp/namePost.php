<?php

header('Content-Type: application/xml');
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "times";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

  $name=$_POST['name'];
  
  invalidUsername($conn,$name);
 // echo "<p>Welcome <b>$name</b></p>";



function invalidUsername($conn,$name){
    
    if(empty($name)){
        $error="Name cannot be blank";
        echo "<message><error>$error</error></message>";
    }
    
   

    else{

        nameTaken($conn, $name);
        
    }

   
}
function nameTaken($conn, $username){
    
    
    $sql = "SELECT * FROM userdetails WHERE userFullName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../registration.php?error=statementerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $username);
    mysqli_stmt_execute($stmt);

    $queryResults = mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($queryResults)){
        $error = 'Name is already taken';

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

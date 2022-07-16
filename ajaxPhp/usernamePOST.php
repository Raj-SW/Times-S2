<?php
header('Content-Type: application/xml');
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "times";
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
  $username=$_POST['username'];
  invalidUsername($conn,$username);
function invalidUsername($conn,$username){
    if(empty($username)){
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        $status="Username cannot be blank";
        echo "<status><status-message>$status</status-message></status>";
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        $status= "Username is invalid";
        echo "<status><status-message>$status</status-message></status>";
    }
    else{
        usernameTaken($conn, $username);  }
}
function usernameTaken($conn, $username){
    $sql = "SELECT * FROM userdetails WHERE aliasName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../registration.php?error=statementerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $username);
    mysqli_stmt_execute($stmt);
    $queryResults = mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($queryResults)){
        $status = 'Username is already taken';

        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<status><status-message>$status</status-message></status>";  
    } 
    else{
        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<status><status-message>Field validated</status-message></status>";
    }
    mysqli_stmt_close($stmt);
}
?>

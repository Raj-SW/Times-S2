<?php
session_start();
include_once 'includes/dbh.inc.php';
$id = $_SESSION['uid'];
if(isset($_POST['submit-image'])){

    $file = $_FILES['file'];
    $fileName =$file['name'];
    $fileTmpName =$file['tmp_name'];
    $fileSize =$file['size'];
    $fileError =$file['error'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){

        if($fileError===0){
            if($fileSize<100000000){
                    $fileNameNew = "profile".$id.".". $fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $sql = "UPDATE profileimg SET status=0 WHERE userid='$id';";
                    $result = mysqli_query($conn,$sql);
                    header("Location: profilepage.php?uploadSucess");
                } else{
                Echo "File too large";
            }
        } else{
            Echo "Error uploading file.";
        }

    } else{
        Echo "Wrong file format.";
    }



}




?>
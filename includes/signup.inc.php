<?php

if(isset($_POST["register"])){

    $full_name = $_POST["full_name"];
    $username = $_POST["user_name"];
    $email = $_POST["user_mail"];
    $phone_number = $_POST["phone_number"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $gender = $_POST["gender"];
    $zipcode = $_POST["zipcode"];
    $address = $_POST["address"];

    //Connection to database
    require_once 'dbh.inc.php';
    //function file for validations and error handling
    require_once 'function.inc.php';

    //check if there are empty inputs
    if(emmptyInputSignup($full_name, $username, $email, $phone_number, $password, $confirm_password,$gender,$zipcode,$address) !== false){
        header("location: ../registration.php?error=emptyinput");
        exit();
    }
    //check for valid username
    if(invalidUsername($username) !== false){
        header("location: ../registration.php?error=invalidusername");
        exit();
    }

     //check for valid email format
     if(invalidEmail($email) !== false){
        header("location: ../registration.php?error=invalidemail");
        exit();
    }

     //check if password and confirm password are equal
     if(passwordMatch($password, $confirm_password) !== false){
        header("location: ../registration.php?error=passwordsmismatch");
        exit();
    }

    //check if username or email taken
    if(usernameorEmailTaken($conn, $username, $email) !== false){
        header("location: ../registration.php?error=credentialstaken");
        exit();
    }
    
    //if all validations passed, register user

    createUser($conn, $full_name, $username, $email, $phone_number, $password, $gender,$zipcode,$address);
    

}
else{
    header("location: ../registration.php");
}

?>
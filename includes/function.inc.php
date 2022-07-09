<?php

function emmptyInputSignup($full_name, $username, $email, $phone_number, $password, $confirm_password,$gender,$zipcode,$address){

    if(empty($full_name) || empty($username) || empty($email) || empty($phone_number)
    || empty($password) || empty($confirm_password) || empty($gender|| empty($zipcode) || empty($address)) ){
        $result = true;
    }

    else{
        $result = false;
    }

    return $result;
}

function invalidUsername($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }

    else{
        $result = false;
    }

    return $result;

}

function invalidEmail($email){

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function passwordMatch($password, $confirm_password){

    if($password !== $confirm_password){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function usernameorEmailTaken($conn, $username, $email){

    $sql = "SELECT * FROM userdetails WHERE aliasName = ? OR userMail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../registration.php?error=statementerror");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $queryResults = mysqli_stmt_get_result($stmt);
    if($row=mysqli_fetch_assoc($queryResults)){

        return $row;
        
    } 
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $full_name, $username, $email, $phone_number, $password, $gender,$zipcode,$address){
    $sql = "INSERT INTO userdetails (aliasName, userFullName, userMail, userAddress, userPassword, zipCode,gender,userTelNumber) 
    VALUES (?,?,?,?,?,?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../registration.php?error=writestatementerror");
        exit();
    }

    //password hashed for more privacy

    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssssssss", $username,$full_name, $email,$address,$hashed_password,$zipcode, $gender, $phone_number);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
   
   
    $sql = "SELECT * FROM userdetails WHERE aliasName='$username'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
                $userid = $row['uid'];
                $sql = "INSERT INTO profileimg (userid,status) values($userid,1)";
                mysqli_query($conn,$sql);
        }

    } else{
        echo "Error linking to profile";
    }

    header("location: ../index.php?registrationsucess");
    exit();
}

function emptyInputLogin($username,$password){
    if(empty($username)||empty($password)){
        return true;
    }
    else {
        return false;
    }
}

function loginUser($conn,$username,$password){

    $validUser = usernameorEmailTaken($conn, $username, $username);

    if( $validUser === false){
        header("location: ../registration.php?error=wronglogin");
        exit();
    }

    $hashedPwd = $validUser["userPassword"];
    $checkPwd = password_verify($password,$hashedPwd);

    if($checkPwd === false){
        header("location: ../registration.php?error=wrongpassword");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["uid"] = $validUser["uid"];
        $_SESSION["uid"] = $validUser["uid"];
        
        header("location: ../index.php?goodlogin");
        exit();
    }
    
}

?>
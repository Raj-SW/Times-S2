<?php 

function makePayment($uid,){
    require_once 'dbh.inc.php';
    $date=date('Y/m/d');
    $sql="INSERT INTO transactiondetails Values (uid,transactionAmount,transactionDate) VALUES($uid,500,$date";

if (mysqli_query($conn,$sql)) {
    echo"
<script>alert(worked)</script>";
}   
echo "<script>window.location= 'index.php'</script> ";
}

function emptyShippingDetails($fname, $lname, $email, $shippingAddr, $appartNo, $city,$country,$postalCode){

    if(empty($fname) || empty($lname) || empty($email) || empty($shippingAddr)
    || empty($appartNo) || empty($city) || empty($country|| empty($postalCode))){
        $result = true;
    }

    else{
        $result = false;
    }

    return $result;
    }

    function validateString($string) {
    if(preg_match('/^[a-z]\w{2,23}[^_]$/i', $string)) {
    return true;
    }
    return false;
    }

    function validateEmail($email){

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}
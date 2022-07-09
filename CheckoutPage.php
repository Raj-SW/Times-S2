<?php

include 'header.php';
include_once 'includes/payment.inc.php';

if (isset($_POST['return'])) {
    echo "<script>window.location= 'index.php'</script> ";
}
# code...
if (isset($_POST['pay'])) {

    $id = $_SESSION['uid'];
    $Total = $_SESSION['Total'];
    $sql = "INSERT INTO transactiondetails
    (uid,transactionAmount,transactionDate)
     VALUES($id,$Total,NOW())";
    mysqli_query($conn, $sql);
    echo "<script>alert('1')</script> ";

    $email=$_POST['email'];
    $keepMeUpdated=$_POST['keepMeUpdated'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $shippingAddr=$_POST['address'];
    $appartNo=$_POST['apartmentNo'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $postalCode=$_POST['postalCode'];
    $phone=$_POST['phoneNumber'];
    $item_Array=$_SESSION['cart'];
    $orders="";
    $total=$_SESSION['Total'];
    echo "<script>alert($total)</script> ";

    echo "<script>alert('2')</script> ";


        $shippingString="Email: ".$email." Name: ".$fname." ".$lname." Ship to: ".$shippingAddr.", ".$country.", ".$city.", ".$appartNo.", ".$postalCode.", Phone: ".$phone;
        echo "<script>alert('$shippingString')</script>";
        echo "<script>alert('3')</script> ";

        for ($i=0; $i < count($item_Array); $i++) { 
            $orders=$orders." ItemId: ".$item_Array[$i]['itemId']." Quantity: ".$item_Array[$i]['quantity'];
        }
        echo "<script>alert('$orders')</script> ";

        echo "<script>alert('4')</script> ";

        $sql2="INSERT INTO orders
        (uid,orders,shippingDetails,total,orderdate) 
        VALUES($id,$orders,$shippingString,$total,NOW());";
        echo "<script>alert('5')</script> ";

            mysqli_query($conn, $sql2);
      
            echo "<script>alert('6')</script> ";
            
        }
        echo "<script>alert('7')</script> ";
        
?>


<div class="checkoutContainer">
    <div class="checkOutFiller"><p></p></div>
<div class="checkoutHeader">
    <h2>Check out</h2>
</div>

<form action="CheckoutPage.php" method="post">
<div class="formWrapper">

<div class="keepMeUpdated">
    <label for="Contact Info">Contact Info: </label>
    <input type="email" name="email"  id="cntc" placeholder="Enter Email.." id="abcdefg" required>
    <label for="keepMeUpdated"><p>Keep me updated on news and exclusive offers </p></label>
    <input type="checkbox" name="keepMeUpdated" id="">
</div>

<div class="shippingAddress">
    <div class="nameSurname">
        <input type="text" name="fname" id="" placeholder="First name" required>
        <input type="text" name="lname" id="" placeholder="Last name" required>
    </div>
<div class="moreInput">
    <div class="shippingdiv">
        <input type="text" name="address" id="" placeholder="Shipping address" id="abcdefg" required>

    </div>
    <div class="apprtmentCity">

        <input type="text" name="apartmentNo" id="" placeholder="Apartment No, house, etc..." required>
        <input type="text" name="city" id="" placeholder="City" required>

    </div>
</div>
<div class="countryInput">
<select name="country" class="country" id="country" required>
                    <option value="">Choose country</option>
                        <option value="mauritius"> Mauritius </option>
                        <option value="rodrigues"> Rodrigues </option>
                        <option value="reunion"> Reunion Isl. </option>
                        <option value="madagascar"> Madagascar </option>
                    </select>
    <input type="text" name="postalCode" placeholder="postalCode" required>
</div>
<input type="text" name="phoneNumber" placeholder="Phone (optional)" id="abcdefg" >
</div>
<div class="lastButtons">
    <button type="submit" name="return" >Return to Cart</button>
    <button type="submit" name="pay">Confirm and Pay</button>
</div>


</div>

</form>

</div>

<?php
include 'footer.php';
?>
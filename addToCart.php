<?php
include 'header.php';
$quantity=1;
if(isset($_POST['removeItem'])){
    if ($_POST['itemRemove']) {
        $countR=count($_SESSION['cart']);
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['itemId']==$_POST['itemRemove']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                 echo "<script>alert('Product has been removed!')</script>";
            }
        }

    }
}
$TotalPrice=0;
 ?>
    <div class="abc"><H2>Check Cart</H2></div>
<div class="addToCartContainerAll">
<div class="headerWrapperUp">
    <p>Item</p>
    <p>Quantity</p>
    <p>Sub Total</p>
</div>
    <div class="cartItemsContainer">              
<?php

$item_array=$_SESSION['cart'] ;




if (isset($_SESSION['cart'])) {
$prod_Id = array_column($_SESSION['cart'],column_key:'itemId');
$sql="SELECT * FROM items";
$resultSql=mysqli_query($conn,$sql);
$TotalPrice=0;
$subTotal=0;
while($row = mysqli_fetch_assoc($resultSql)){
foreach ($prod_Id as $id) {
    $subTotal=0;
    if ($row['itemId']==$id) {
        for ($i=0; $i < count($item_array); $i++) { 
            if ($item_array[$i]['itemId']==$row['itemId']) {
                $quantity=$item_array[$i]['quantity'];
                $subTotal=$row['itemPrice']* $quantity;
            }
        }
        
        $TotalPrice+=$subTotal;
        echo "  <div class='itemCardCartContainer'>
        <div class='imageCartContainer'>
            <img src=".$row['itemPath']." alt='cart image' srcset=''>
        </div>
        <div class='productCartDetails'>
        <p>Product Name: ".$row['itemName']."</p>
        <p>Size: ".$row['itemSize']."</p>
        <p>Price: ".$row['itemPrice']."</p>
        </div>
        <div class='quantity'>
            <p>$quantity</p> 
        </div>
        <div class='subTotal'><p>".$subTotal."</p></div>
        <div class='icon'>
        <form action='addToCart.php' method='POST'>
            <input type='hidden' name='itemRemove' value=".$row['itemId']." >
            <button type='submit' name='removeItem'><i class='far fa-trash-alt'>
            </i></button>
        </form>
        </div>
    </div>  ";
    }
    }
}
}
elseif (count($_SESSION['cart'])==0) {
echo "<h2>You have nothing on cart!</h2>";
} 
  ?>
    </div>

        <div class="headerWrapperDown">
            <div class="wrapInside">
                <p>Total</p>
                <p><?php 
                $_SESSION['Total']=$TotalPrice;
                echo $TotalPrice; ?> </p>
            </div>
        </div>

        <div class="buttonContainer">
            <form action="CheckoutPage.php" method="post">
                <button type="submit">Checkout</button>
            </form>
    </div>
</div>

<footer>
    <?php
    include 'footer.php';
    ?>
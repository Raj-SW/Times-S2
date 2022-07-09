<?php
include 'includes/dbh.inc.php';
include 'header.php';



if (isset($_GET['prodID'])) {
  $x=$_GET['prodID'];
}else {
  $x = $_POST['productId'];
}
$sql = "SELECT * FROM items WHERE itemId='$x';";
$stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
  echo "SQL Statement failed";
} else{
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_row($result);
  //did the user add to cart?
  if (isset($_POST['addItem'])) {
    //is the user logged in
    if (isset( $_SESSION['uid'])){
    //does a cart session already created
    if (isset($_SESSION['cart'])) {
              //does the cart already has same item to cart
            $a= array_column($_SESSION['cart'],column_key:"itemId");

            if (in_array($_POST['addItem'],$a)) {
                  
              echo '<script>alert("Product Already Added in the cart")</script>';

            }else {//if not already added in cart,add it 

              $count=count($_SESSION['cart']); 
              $item_array= array(
                'itemId' => $_POST['addItem'],
                'quantity' =>$_POST['quantity']
              );

                $_SESSION['cart'][$count]=$item_array;

                echo '<script>alert("Product added to cart!")</script>';
                echo "<script>window.location= 'index.php'</script> ";
 
              }


    }else {//if not create one and assign the new item in an array of cartsItem
      $item_array= array(
        'itemId' => $_POST['addItem'],
        'quantity' =>$_POST['quantity']
        )
        
        
        ;
        //create new session variable
        $_SESSION['cart'][0]= $item_array; 
        $_SESSION['Counter']=1;      

        echo '<script>alert("Product added to cart!")</script>';
        echo "<script>window.location= 'index.php'</script> ";

    }
  }else {
    echo "<script>alert('You need to be logged in!!')</script> ";
    echo "<script>window.location= 'registration.php'</script> ";
  }
  }
}
?>

<div class="item-container" >
    <div class="row">
        <div class="col-2">
        <?php
         echo  "<img src=$row[9] width='100%'>";
                       ?>
                <div class="smaller-image-row">
                        <div class="smaller-image-col">
                        <?php
                      echo  "<img src=$row[9] width='100%'>";
                       ?>
                        </div>
                        <div class="smaller-image-col">
                        <?php
        echo  "<img src=$row[9] width='100%'>";
                       ?>
                        </div>
                        <div class="smaller-image-col">
                        <?php
        echo  "<img src=$row[9] width='100%'>";
                       ?>
                        </div>  
                   </div>
        </div>
        <div class="col-2">
        <?php
        echo  "<h2>$row[1] </h2>
              <p>Available: $row[7]</p>
              <p>Price: $$row[3]</p>
              <p>Color: $row[5]</p>
              <p>Size: $row[6]</p>
        ";
       ?>
         <form action='individualItemPage.php' method="POST">
           <!-- 
             <input type="number" min="1" name="quantity">
            -->
            <?php 
            /*echo"<input type='hidden' name='productQuantity' value='quantity'/> ";*/
            echo"<input type='number' min='1' name='quantity' id ='quantity'>";

            echo"<input type='hidden' name='productId' value='$row[0]'/> ";
            echo"<input type='hidden' name='price' value='$row[3]'/> ";
            echo"<input type='hidden' name='addItem' value='$row[0]'/> ";
            ?>
              <button type="submit" name="queryProduct" >Add to Cart
                <i class="fa-solid fa-cart-shopping"></i> 
              </button>
          </form>
            <p><a href="">Our policies</a></p>

            <p><a href="">Know your size</a></p>
            <div class="smaller-image-row">
                <div class="smaller-image-col-2">
                    <img src="paypal-logo.png" width="100%"> 
                </div>
                <div class="smaller-image-col-2">
                    <img src="paypal-logo.png" width="100%"> 
                </div>
                <div class="smaller-image-col-2">
                    <img src="paypal-logo.png" width="100%"> 
                </div>  
                <div class="smaller-image-col-2">
                    <img src="paypal-logo.png" width="100%"> 
                </div>  
           </div>
            <h3>Product details</h3> <br>
            <?php
                echo  "<p>$row[2]</p>";
            ?>
        </div>
    </div>
</div>
<!--Related Products-->
<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
    </div>
</div>
<div class="cont">
   <div class="row-container">
   <?php
$sql2 = "SELECT * FROM items WHERE itemCategory = '$row[4]'
 AND itemId <> $row[0] LIMIT 4 ;";
$stmt2 = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt2,$sql2)){
  echo "SQL Statement failed";
} else{
  mysqli_stmt_execute($stmt2);
  $result2 = mysqli_stmt_get_result($stmt2);
  $resultCheck = mysqli_num_rows($result2);
 
if($resultCheck >0){
  while($row2 = mysqli_fetch_assoc($result2)){
    echo "
    <div class='col-4 product'>
          <img src=$row2[itemPath]>
              <p>$row2[itemName]</p>   
              <p>$$row2[itemPrice]</p> 
              <form action='individualItemPage.php' method='POST'>   
              <input type='hidden' name='productId' value=$row2[itemId] />
              <div class='view-item'>
              <input type='submit'  class='view-item' name='queryProduct' value='View'>
              </div>
              </form>
          </div>
    ";
  }
}
}
?>
   </div>
</div>
<Section class="featured">
          <h2> Related Items </h2>
         <div class= "Container">
             <div class= "left-arrow">
   <i id="prev" onclick="show_images(-1);" class="fas fa-chevron-left"></i>
 </div>
             <div class= "right-arrow">
   <i id="next" onclick="show_images(1);" class="fas fa-chevron-right"></i>
 </div> 
 <?php
$sql2 = "SELECT * FROM items WHERE itemCategory = '$row[4]' AND itemId <> $row[0] LIMIT 4 ;";
$stmt2 = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt2,$sql2)){
  echo "SQL Statement failed";
} else{
  mysqli_stmt_execute($stmt2);
  $result2 = mysqli_stmt_get_result($stmt2);
  $resultCheck = mysqli_num_rows($result2);

if($resultCheck >0){
  while($row2 = mysqli_fetch_assoc($result2)){
    echo "
    <div class='col-4'>
    <img src=$row2[itemPath]>
        <h2>$row2[itemName]</h2>   
        <h2>$$row2[itemPrice]</h2> 
        <form action='individualItemPage.php' method='POST'>   
        <input type='hidden' name='productId' value=$row2[itemId] />
        <div class='view-item'>
        <input type='submit'  class='view-item' name='queryProduct' value='View'>
        </div>
        </form>
    </div>  
    ";}}}?>
    </div>
      </Section>
<footer>
<?php
include 'footer.php';
?>
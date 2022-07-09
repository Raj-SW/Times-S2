<?php
include "header.php";
?>
  <?php
include "includes/dbh.inc.php";
 
 
  //Obtain session ID to identify current user
    $id = $_SESSION['uid'];
  //Retrieve details of the user from the table userdetails and store in variables
    $sqlDetails = "SELECT * FROM userdetails WHERE uid =  $id;";
    $resultDetails = mysqli_query($conn,$sqlDetails);
    $rowDetails = mysqli_fetch_assoc($resultDetails);

    $aliasName = $rowDetails['aliasName'];
    $fullName = $rowDetails['userFullName'];
    $email = $rowDetails['userMail'];
    $address = $rowDetails['userAddress'];
    $zipcode = $rowDetails['zipCode'];
    $gender = $rowDetails['gender'];
    

    $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
    $resultImg = mysqli_query($conn,$sqlImg);
    
    
   $rowImg = mysqli_fetch_assoc($resultImg);
                
      if($rowImg['status'] ==0){
        $image= "<img src = uploads/profile".$id."."."jpg>";
      } else{
        $image=  "<img src='uploads/profiledefault.jpg'>";
      }
?> 
    
    


    <!--Big container starts-->
    <div class="profile-container">
       <!--side container starts-->
    <div class="image-container">
     <!--Profile image container starts-->
    <div class="profile-image">
            <?php echo $image; ?>
            
      </div>
      <div>
      <?php 
        Echo"<p> uid: $id </p>";        
      ?></div>
      <div class= "choose-profile">
    <form action="upload.php" method = "Post" enctype="multipart/form-data">
<input type="file" name="file">
<br>
<button class="actions" type="submit" name="submit-image">Upload</button>
</form>
<form action="logout.php" method = "Post">
<button class="actions" type="submit" name="log-out">Logout</button>
</form>
</div>
    <!--Side container ends-->
    </div>
    <div class="profile-details">
  <!--User details container starts-->
 <div class="welcome"><?php Echo"<h2> Welcome @ $aliasName  </h2>"?></div>
 <div class="message"><p>Hey there, hope you are having a wonderful time with us. Enjoy our catalogue and don't forget to check our featured bundles and recommended items just for you!
 </p></div>
 <div class="mini-container">
 <div class="detail"><?php Echo"<p> Name: $fullName  </p>"?></div>  
 <div class="detail"><?php Echo"<p> Email: $email  </p>"?></div>
<div class="detail"><?php Echo"<p> Gender: $gender  </p>"?></div>
<div class="detail"><?php Echo"<p> Address: $address  </p>"?></div>
<div class="detail"><?php Echo"<p> Zipcode: $zipcode  </p>"?></div>
</div>
 <!--User details container ends-->
    </div>
   
    <!--Big container ends-->
  </div>

<!--Recommended Products-->
<div class="small-container">
    <div class="row row-2">
        <h2>Recommended for you</h2>
    </div>
</div>

<div class="cont">
   <div class="row-container">
   <?php
$sql2 = "SELECT * FROM items WHERE itemGender = '$gender' LIMIT 4 ;";
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
    ";
  }
}

}
?>
   </div>
</div>
</div>
<!--Recommended products mobile-->
<Section class="featured">
          
         <div class= "Container">
             <div class= "left-arrow">
   <i id="prev" onclick="show_images(-1);" class="fas fa-chevron-left"></i>
 </div>
             <div class= "right-arrow">
   <i id="next" onclick="show_images(1);" class="fas fa-chevron-right"></i>
 </div> 
 <?php
$sql2 = "SELECT * FROM items WHERE itemGender = '$gender' ;";
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
    <div class='Featured-item-carousel'>
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
         
    ";
  }
}

}
?>  </div>
      </Section>
<?php
include "footer.php";
?>


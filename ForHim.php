<?php
  include 'includes/dbh.inc.php';
  include 'header.php';

  $shirtSql = "SELECT * FROM items WHERE itemCategory='shirt' AND itemGender ='male' LIMIT 4 ";
  $trouserSql = "SELECT * FROM items WHERE itemCategory='trouser' AND itemGender ='male'LIMIT 4 ";
  $jacketSql = "SELECT * FROM items WHERE itemCategory='jacket' AND itemGender ='male' LIMIT 4";
  $apparelSql = "SELECT * FROM items WHERE itemCategory='apparel' AND itemGender ='male' LIMIT 4";
  $bundleSql = "SELECT * FROM items WHERE itemCategory='bundle' AND itemGender ='male' LIMIT 4 ";

  $shirtSqlResult= mysqli_query($conn,$shirtSql);
  $trouserSqlResult = mysqli_query($conn,$trouserSql);
  $jacketSqlResult= mysqli_query($conn,$jacketSql);
  $apparelSqlResult= mysqli_query($conn,$apparelSql);
  $bundleSqlResult = mysqli_query($conn,$bundleSql);
 
?>

  </header>
  <div class="filler"></div>
 
<div class="forhimherBody">
      <div class="abc">  
        <h2>Men</h2>
      </div>
      <!--      
      <div class="bcd">
          <h4>Navigation > Navigation</h4>
        </div>
    -->
    <div class="bigWrapperhimher">
<!-- start of First row of category  -->
          <div class="outerCategoryWrapper">  
          <h2 id="hh">Shirt</h2>   
              <div class="innerCategoryWrapper">

  <?php
    while($row = mysqli_fetch_assoc($shirtSqlResult)){
    $path=$row['itemPath'];
    $name=$row['itemName'];
    $price=$row['itemPrice'];
      echo "<div class='product'>
      <img src=$row[itemPath]>
        <p>$row[itemName]</p>   
        <p>$$row[itemPrice]</> 
        <form action='individualItemPage.php' method='POST'>   
         <input type='hidden' name='productId' value=$row[itemId] />
         
         <div class='view-item'>
                <input type='submit'  class='view-item' name='queryProduct' value='Add To Cart'>
        </div>

        </form>
    </div>";
      }
    
  ?>
              </div>
              <p><a href="">See More >></a></p>
          </div>
<form action='individualItemPage.php' method='post'>
    
</form>
 <!-- end of First row of category  -->

<!-- start of second row of category  -->

            <div class="outerCategoryWrapper">  
          <h2 id="hh">Trousers</h2>
              <div class="innerCategoryWrapper">

    <?php
      while($row = mysqli_fetch_assoc($trouserSqlResult)){
      $path=$row['itemPath'];
      $name=$row['itemName'];
      $price=$row['itemPrice'];
        echo "<div class='product'>
        <img src=$row[itemPath]>
          <p>$row[itemName]</p>   
          <p>$$row[itemPrice]</> 
          <form action='individualItemPage.php' method='POST'>   
           <input type='hidden' name='productId' value=$row[itemId] />
           
           <div class='view-item'>
                  <input type='submit'  class='view-item' name='queryProduct' value='Add To Cart'>
          </div>

          </form>
      </div>";
                }
            ?>       
              </div>
              <p><a href="">See More >></a></p>
          </div>
  <!-- end of second row of category  -->

  <!-- start of 3rd row of category  -->

          <div class="outerCategoryWrapper">  
          <h2 id="hh">Jackets</h2>
              <div class="innerCategoryWrapper">


              <?php
    while($row = mysqli_fetch_assoc($jacketSqlResult)){
    $path=$row['itemPath'];
    $name=$row['itemName'];
    $price=$row['itemPrice'];
      echo "<div class='product'>
      <img src=$row[itemPath]>
        <p>$row[itemName]</p>   
        <p>$$row[itemPrice]</> 
        <form action='individualItemPage.php' method='POST'>   
         <input type='hidden' name='productId' value=$row[itemId] />
         
         <div class='view-item'>
                <input type='submit'  class='view-item' name='queryProduct' value='Add To Cart'>
        </div>

        </form>
    </div>";
      }
  ?>
              </div>
              <p><a href="">See More >></a></p>
          </div>

  <!-- end of 3rd row of category  -->

  <!-- start of 4th row of category  -->

          <div class="outerCategoryWrapper">  
          <h2 id="hh">Apparels</h2>
              <div class="innerCategoryWrapper">
              <?php
    while($row = mysqli_fetch_assoc($apparelSqlResult)){
    $path=$row['itemPath'];
    $name=$row['itemName'];
    $price=$row['itemPrice'];
      echo "<div class='product'>
      <img src=$row[itemPath]>
        <p>$row[itemName]</p>   
        <p>$$row[itemPrice]</> 
        <form action='individualItemPage.php' method='POST'>   
         <input type='hidden' name='productId' value=$row[itemId] />
         
         <div class='view-item'>
                <input type='submit'  class='view-item' name='queryProduct' value='Add To Cart'>
        </div>

        </form>
    </div>";
      }
  ?>
              </div>
              <p><a href="">See More >></a></p>
          </div>

    <!-- end of 4th row of category  -->

      <!-- start of 5th row of category  -->

          <div class="outerCategoryWrapper">  
          <h2 id="hh">Bundle</h2>
              <div class="innerCategoryWrapper">


              <?php
    while($row = mysqli_fetch_assoc($bundleSqlResult)){
    $path=$row['itemPath'];
    $name=$row['itemName'];
    $price=$row['itemPrice'];
      echo "<div class='product'>
      <img src=$row[itemPath]>
        <p>$row[itemName]</p>   
        <p>$$row[itemPrice]</> 
        <form action='individualItemPage.php' method='POST'>   
         <input type='hidden' name='productId' value=$row[itemId] />
         
         <div class='view-item'>
                <input type='submit'  class='view-item' name='queryProduct' value='Add To Cart'>
        </div>

        </form>
    </div>";
      }
  ?>
              </div>
              <p><a href="">See More >></a></p>
          </div>
                <!-- end of 5th row of category  -->
  
<?php


?>
    </div>

</div>


      <footer>
         <?php
        include 'footer.php';
        ?>
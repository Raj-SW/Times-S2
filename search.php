<?php
include "header.php";
if (isset($_GET['searchbox'])) {
  $search= mysqli_real_escape_string($conn,$_GET['searchbox']);
  $sql="SELECT * FROM items WHERE itemName LIKE '%$search%' OR
   itemDescription LIKE '%$search%' OR itemGender LIKE '%$search%'
    OR itemCategory LIKE '%$search%' OR itemColor LIKE '%$search%' ";

}
if (isset($_GET['apparel-searchbox'])) {
  $search= mysqli_real_escape_string($conn,$_GET['searchbox']);
    $sql="SELECT * FROM items WHERE itemCategory='apparel' AND itemGender='male'; ";

  }
if (isset($_GET['categorySearch'])) {
  $aaa=$_GET['categorySearch'];
  $search= mysqli_real_escape_string($conn,$_GET['categorySearch']);
    $sql="SELECT * FROM items WHERE itemGender='$aaa'; ";
}
if (isset($_GET['femaleshirt'])) {
  $aaa=$_GET['femaleshirt'];
  $search= mysqli_real_escape_string($conn,$_GET['femaleshirt']);
    $sql="SELECT * FROM items WHERE itemGender='female' AND itemCategory='$aaa'; ";
  }
?>
    <!--Big wrappper-->
    <div class="divFiller">
      </div>
<div class="search-page-container">
<div class="sidebar">
    <div class="filter-criteria">
       <select name="fetchval" class="fetchval" id="size-range"> 
        <option value="">Size</option>
            <option value="XS"> XS </option>
            <option value="S"> S </option>
            <option value="M"> M </option>
            <option value="L"> L </option>
            <option value="XL"> XL </option>    
        </select>
      <select name="fetchval" class="fetchval" id="price-range">  
      <option value="">Price</option>
      <option value="<25">Less than $25</option>
      <option value="25-50"> $25 - $50</option>
      <option value="50-75">$50 - $75</option>
      <option value="75-100">$75 - $100 </option>
      <option value="100">$100+</option>
      </select>
      <select name="fetchval" class="fetchval" id="gender-options">  
      <option value="">Gender</option>
      <option value="male">Him</option>
      <option value="female">Her</option>
      </select>
      <select name="fetchval" class="fetchval" id="type-options" >  
      <option value="">Type</option>
      <option value="apparel">Apparel</option>
      <option value="bundle">Bundle</option>
      <option value="dress">Dress</option>
      <option value="jacket">Jacket</option>
      <option value="jewellery">Jewellery</option>
      <option value="shirt">Shirt</option>
      <option value="trouser">Trousers</option>
      </select>
    </div>
</div>
<div class="item-results-display">
  <div class="heading"> <h2>Search Results for 
    <?php
    echo "'$search'";
    ?>
  </h2></div>
    <div class="item-results-container">
      <?php
  $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
          echo"
          <div class='product'>
            <img src=$row[itemPath]>
              <p>$row[itemName]</p>   
              <p>$$row[itemPrice]</> 
              <form action='individualItemPage.php' method='POST'>   
                <input type='hidden' name='productId' value=$row[itemId]/>
                <div class='view-item'>
 <input type='submit'  class='view-item' name='queryProduct' value='Add To Cart'>
              </div>
              </form>
          </div>";
      }
    }
    ?>
  </div>
  </div>
</div>
<?php
include 'footer.php';
?>


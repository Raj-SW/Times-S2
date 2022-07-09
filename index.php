   <?php
include "header.php";

   
   ?>
   <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="header-mobile.css" />
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="footer.css">

    <style >
     i{color: black;}
      </style>
     
    <!--Mobile Body now starts-->    
    <div class="lemobile">
    <main class="lemain">
      <Section class="Banner">
      <div
    id="carouselExampleCaptions"
    class="carousel slide"
    data-bs-ride="carousel"
  >
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="1"
        aria-label="Slide 2"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="2"
        aria-label="Slide 3"
      ></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <?php
        $banner = "SELECT * FROM bannertable WHERE bannerId=4";
        $bannerResult= mysqli_query($conn,$banner);
        $rowBan=mysqli_fetch_assoc($bannerResult);
        echo "
        <img src=".$rowBan['bannerPath']." class='d-block w-100' />
        
        ";
        ?>
        <div class="carousel-caption d-none d-md-block">
        <h5>Dress Wild</h5>
          <p>Create your own rules</p>
        </div>
      </div>
      <div class="carousel-item">
      <?php
        $banner = "SELECT * FROM bannertable WHERE bannerId=5";
        $bannerResult= mysqli_query($conn,$banner);
        $rowBan=mysqli_fetch_assoc($bannerResult);
        echo "
        <img src=".$rowBan['bannerPath']." class='d-block w-100' />
        
        ";
        ?>
        <div class="carousel-caption d-none d-md-block">
        <h5>"Style is something each of us already has, all we need to do is find it." </h5>
          <p>—Diane von Furstenberg </p>
        </div>
      </div>
      <div class="carousel-item">
      <?php
        $banner = "SELECT * FROM bannertable WHERE bannerId=7";
        $bannerResult= mysqli_query($conn,$banner);
        $rowBan=mysqli_fetch_assoc($bannerResult);
        echo "
        <img src=".$rowBan['bannerPath']." class='d-block w-100' />
        
        ";
        ?>        <div class="carousel-caption d-none d-md-block">
        <h5>Beard Care</h5>
          <p>With our apparels collection</p>
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExampleCaptions"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExampleCaptions"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
      </Section>
            <!--Bootsrap Carousel ends here-->

      <!--Feature Carousel starts here-->
      <Section class="featured">
          <h2> Featured </h2>
         <div class= "Container">
             <div class= "left-arrow">
   <i id="prev" onclick="show_images(-1);" class="fas fa-chevron-left"></i>
 </div>
             <div class= "right-arrow">
   <i id="next" onclick="show_images(1);" class="fas fa-chevron-right"></i>
 </div> 
            
            <?php
          while($rowOwl = mysqli_fetch_assoc($resultOwl)){
              
            echo "
            
             <div class= 'Featured-item-carousel'>
              <form action='individualItemPage.php' method='post'>
                <img src=".$rowOwl['itemPath']." alt=''>
                  <p>".$rowOwl['itemName']." - ".$rowOwl['itemPrice']."</p>
                <input type='hidden' name='productId' value=".$rowOwl['itemId'].">  
                <div class='view-item-home'>
                <input type='submit'  class='view-item-home' name='queryProduct' value='Add'> <i class='fas fa-shopping-cart'></i>
                </div>
                </form>
            </div>
            ";  
            }
            ?>   
     
<div class= "dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
</div>
        </div>
      </Section>
      
      <section class= "shop-now">
        <h2> shop-now </h2>
      </section>
      
      <div class="shop-container">
        <div class="shop-container-image-mobile">
          <?php 
          $sqlBannerApparel="SELECT * FROM items WHERE  itemId= 92";
          $resultBannerApparel=mysqli_query($conn,$sqlBannerApparel);
          
        while($rowBanner = mysqli_fetch_assoc($resultBannerApparel)){
          echo "<img src=".$rowBanner['itemPath']." alt= 'apparels.jpg'>
          </div>
        <div class='shop-container-text-mobile'>
          <h2> Apparels </h2>
         
          <form action='search.php' method='get'>   
          <input type='hidden' name='apparel-searchbox' value=".$rowBanner['itemCategory'].">
            <button type='submit' name='apparel-searchbox'>
              <p><h5> shop now</h5></p>
            </button>
          </form>

        </div>
    </div>";
        }
        ?>
        
      <div class= "about-us">
      

          <img src= "2guys.jpg" alt= "about-us.png">
            <h2>About Us </h2>
            <p>Here at Times, we aim to provide our valued customers with the latest trends at the most competitive prices. Your satisfaction is our utmost priority.
</p>

      
      </div>

    </main>
    <!--Mobile Body now ends-->  
  </div>
<div class="ledesktop">
    <div class="banner-carousel-desktop">
    <div
    id="carouselExampleCaptions"
    class="carousel slide"
    data-bs-ride="carousel"
  >
    <div class="carousel-indicators">
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="1"
        aria-label="Slide 2"
      ></button>
      <button
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide-to="2"
        aria-label="Slide 3"
      ></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <?php
        $banner = "SELECT * FROM bannertable WHERE bannerId=1";
        $bannerResult= mysqli_query($conn,$banner);
        $rowBan=mysqli_fetch_assoc($bannerResult);
        echo "
        <img src=".$rowBan['bannerPath']." class='d-block w-100' />
        
        ";
        ?>
        <div class="carousel-caption d-none d-md-block">
          <h5>Dress Wild</h5>
          <p>Create your own rules</p>
        </div>
      </div>
      <div class="carousel-item">
      <?php
        $banner = "SELECT * FROM bannertable WHERE bannerId=6";
        $bannerResult= mysqli_query($conn,$banner);
        $rowBan=mysqli_fetch_assoc($bannerResult);
        echo "
        <img src=".$rowBan['bannerPath']." class='d-block w-100' />
        
        ";
        ?>
        <div class="carousel-caption d-none d-md-block">
          <h5>"Style is something each of us already has, all we need to do is find it." </h5>
          <p>—Diane von Furstenberg </p>
        </div>
      </div>
      <div class="carousel-item">
      <?php
        $banner = "SELECT * FROM bannertable WHERE bannerId=7";
        $bannerResult= mysqli_query($conn,$banner);
        $rowBan=mysqli_fetch_assoc($bannerResult);
        echo "
        <img src=".$rowBan['bannerPath']." class='d-block w-100' />
        
        ";
        ?>        <div class="carousel-caption d-none d-md-block">
          <h5>Beard Care</h5>
          <p>With our apparels collection</p>
        </div>
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExampleCaptions"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExampleCaptions"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
            <div class="outerCategoryWrapper">  
    
<div class="exceptionnel">

<h2>Featured Items</h2>
</div>
    <div class="innerCategoryWrapper" style="padding: 20px;">
              <?php

$featuredSql = "SELECT * FROM featured LIMIT 4 ";

$aaa ="SELECT * FROM items,featured WHERE items.itemId=featured.itemId";
$featuredResult= mysqli_query($conn,$aaa);
while($row = mysqli_fetch_assoc($featuredResult)){

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

 
    </div>



    <div class="apparel-wrapper-desktop"> 
          <div class="apparel-textbox-wrapper">
            <h5>Apparel</h5>
            
            <form action='search.php' method="get">
              <input type='hidden' name='apparel-searchbox' value=".$rowBanner['itemCategory'].">
              <button type='submit' name='apparel-searchbox'>
              <p> shop now</p>
            </button>
            </form>
            </div>
            
          <div class="image-apparel-wrapper">
          <?php 


$sqlBannerApparel="SELECT * FROM items WHERE  itemId= 92";
$resultBannerApparel=mysqli_query($conn,$sqlBannerApparel);
        while($rowBanner = mysqli_fetch_assoc($resultBannerApparel)){
          echo "<img src=".$rowBanner['itemPath']." alt= ''>";
          }
          ?>
              </div>
   </div>
  
     <div class="about-us-wrapper-desktop">
      <div class="about-us-image-container">
      <img src="2guys.jpg" alt="" srcset="">
      </div>





      <div class="about-us-textbox">
        <h5>About Us</h5>
        <p>          <p>Here at Times, we aim to provide our valued customers with the latest trends at the most competitive prices. Your satisfaction is our utmost priority.</p>
      </div>
    </div>
</div>
</div>
<footer>

    <?php
    include "footer.php";
    ?>

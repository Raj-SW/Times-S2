<?php
$count=0;
 session_start();
 
  include 'includes/dbh.inc.php';
  include 'includes/function.inc.php';
if (isset($_GET['searchbox'])) {
    $search= mysqli_real_escape_string($conn,$_GET['searchbox']);
    $sql="SELECT * FROM items WHERE (itemName LIKE '%$search%' OR itemDescription LIKE '%$search%' OR itemGender LIKE '%$search%' OR itemCategory LIKE '%$search%' OR itemColor LIKE '%$search%') ";
  $_SESSION['searchquery'] = $sql;
  }
  
if(isset($_SESSION['uid'])){
    $id= $_SESSION['uid']; 
}
 

//Featured Owl Carousel Backend Process\
$sqlOwl="SELECT * FROM items WHERE  itemCategory ='bundle' AND itemGender='male' LIMIT 4";
$resultOwl=mysqli_query($conn,$sqlOwl);

$sqlBannerApparel="SELECT * FROM items WHERE  itemId= 92";
$resultBannerApparel=mysqli_query($conn,$sqlBannerApparel);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;300&family=Cormorant+Garamond:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
    href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet"
  />
  <script src="his_dropdown.js"></script>
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="ForHimHer.css">
  <link rel="stylesheet" href="search.css">
  <link rel="stylesheet" href="registrationStyle.css">
  <link rel="stylesheet" href="addToCart.css">
  <link rel="stylesheet" href="header-mobile.css" />
  <link rel="stylesheet" href="resetstylesheet.css">
  <link rel="stylesheet" href="profilepage.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="checkout.css">

  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/0471017f2a.js"
      crossorigin="anonymous"
    ></script>
    <script src="toggle.js"></script>
    <script src="show-hide.js"></script>
    
    <link rel="stylesheet" href="individualItemPage.css">


    <title>Document</title>
    </head>
    <body>
    
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"
      ></script>
      <header>
        <div class="mobile-header">
          <div class="icon-hamburger" id="icon-hamburger"><i class="fas fa-bars" onclick="toggleNav()"></i></div>
          <div class="logo"><a href="index.php">Times</a></div>
          <div class="icon-navigation-mobile">
            <ul>
                             
    <?php
      
      if(isset($_SESSION["uid"])){
        $sqlDetails = "SELECT * FROM userdetails WHERE uid = $id;";
        $resultDetails = mysqli_query($conn,$sqlDetails);
        $rowDetails = mysqli_fetch_assoc($resultDetails);
        echo "<li><a href='profilepage.php'><i class='fa-solid fa-user-check'></i></a></li>
        <span>".$rowDetails['aliasName']."</span>";
        echo"
        <li><i class='fas fa-shopping-cart'></i></li>";
      } else{
        echo "<li><a href='registration.php'><i class='far fa-user'></i></a></li>";
      }
      ?>
             
            </ul>
          </div>
        </div>
        <div class="" id="side-bar-mobile">
        <aside class="side-bar-mobile" id="abc">
            <div class="searchbar-mobile-wrapper">
                <form action="search.php" class="search-form-mobile" method="GET">
                    <input type="text" placeholder="Discover" name="searchbox"/>
                    <button type="submit" class="mobile-search-button"><i class="fas fa-search" ></i></button>
                  </form>

              </div>

                  <div class="drop-down-wrapper-mobile">
                      <div class="his-wrapper">
                              <div class="his-header">
                                  <a href="ForHim.php">His</a>
                                  <i class="fas fa-angle-down" onclick="hisToggle()"></i>
                              </div>
                              <div class="his-ul-dropdown">
                                  <ul class="his-ul">
                                      <li><a href="search.php?maleCategory=shirt">Shirt</a></li>
                                      <li><a href="search.php?maleCategory=trouser">Trousers</a></li>
                                      <li><a href="search.php?maleCategory=jacket">Jacket</a></li>
                                      <li><a href="search.php?maleCategory=apparel">Apparel</a></li>
                                  </ul>
                              </div>
                      </div>

                          <div class="her-wrapper">
                                  <div class="her-header">
                                      <a href="ForHer.php">Her</a>
                                      <i class="fas fa-angle-down" onclick="herToggle()"></i>
                                  </div>
                              <div class="her-ul-dropdown">
                                  <ul class="her-ul">
                                  <li><a href="search.php?femaleCategory=shirt">shirt</a></li>
                                      <li><a href="search.php?femaleCategory=trouser">Trousers</a></li>
                                      <li><a href="search.php?femaleCategory=jacket">Jacket</a></li>
                                      <li><a href="search.php?femaleCategory=jewellery">Jewellery</a></li>
                                  </ul>
                              </div>
                      </div>
                  </div>
                  <div class="otherlinks">
                      <ul class="other-ul">
                          <li><a href="">Wishlist</a></li>
                          <li><a href="">Sign in</a></li>
                          <li><a href="">Help Centre</a></li>
                          <li><a href="">Chat bot</a></li>
                          <li><a href="">Currency</a></li>
                      </ul>
                  </div>
        </aside>
      </div>
  <!--Desktop header now starts-->
  <div class="desktop-header-wrapper">
        <div class="gender-navigation">
          <nav class="gender-nav">
            <ul>
              <li id="his"><a href="ForHim.php">For Him</a>
                <div class="mega-menu-wrapper">
                  <div class="categories-link-wrapper">
                    <div class="grid-column-1">
                      <h5>Shirt</h5>
                      <ul>
                      <?php

$categoryQuery = "SELECT * FROM items WHERE itemCategory = 'shirt' AND itemGender='male' LIMIT 4;";
$resultItems = mysqli_query($conn,$categoryQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
  <li><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></li>
  ";
}

?>
                      </ul>
                    </div>
                    <div class="grid-column-2">
                      <h5>Trousers</h5>
                      <ul>
                      <?php

$categoryQuery = "SELECT * FROM items WHERE itemCategory = 'trouser' AND itemGender='male' LIMIT 4;";
$resultItems = mysqli_query($conn,$categoryQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
  <li><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></li>
  ";
}

?>
                      </ul>
                    </div>
                    <div class="grid-column-3">
                      <h5>Jackets</h5>
                      <ul>
                      <?php

$categoryQuery = "SELECT * FROM items WHERE itemCategory = 'jacket' AND itemGender='male' LIMIT 4;";
$resultItems = mysqli_query($conn,$categoryQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
  <li><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></li>
  ";
}

?>
                      </ul>
                    </div>
                  </div>
                  <div class="images-categories-wrapper">
                    <div class="images-grid-column-1">
                    <?php

$bundleQuery = "SELECT * FROM items WHERE itemCategory = 'bundle' AND itemGender='male' Limit 1,1";
$resultItems = mysqli_query($conn,$bundleQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
 
  <div class='image-container'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'><img src=".$rowItems['itemPath']."></a></div>
  ";
  Echo"

  <div class='image-container-txt'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></div>";
}

?>
                    </div>
                    <div class="images-grid-column-2">
                    <?php

$bundleQuery = "SELECT * FROM items WHERE itemCategory = 'bundle' AND itemGender='male' Limit 2,1";
$resultItems = mysqli_query($conn,$bundleQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
 
  <div class='image-container'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'><img src=".$rowItems['itemPath']."></a></div>
  ";
  Echo"

  <div class='image-container-txt'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></div>";
}

?>
                    </div>
                    <div class="images-grid-column-3">
                    <?php

$bundleQuery = "SELECT * FROM items WHERE itemCategory = 'bundle' AND itemGender='male' Limit 3,1";
$resultItems = mysqli_query($conn,$bundleQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
 
  <div class='image-container'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'><img src=".$rowItems['itemPath']."></a></div>
  ";
  Echo"

  <div class='image-container-txt'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></div>";
}

?>
                    </div>
                  </div>
                </div>
              </li>
              <li><a href="ForHer.php">For Her</a>
                <div class="mega-menu-wrapper">
                  <div class="categories-link-wrapper">
                    <div class="grid-column-1">
                      <h5>Shirt </h5>
                      <ul>
                      <?php

                        $categoryQuery = "SELECT * FROM items WHERE itemCategory = 'shirt' AND itemGender='female' LIMIT 4;";
                        $resultItems = mysqli_query($conn,$categoryQuery);
                        while($rowItems = mysqli_fetch_assoc($resultItems)){
                          Echo"
                          <li><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></li>
                          ";
                        }

                      ?>
                      </ul>
                    </div>
                    <div class="grid-column-2">
                      <h5>Trousers</h5>
                      <ul>
                      <?php

$categoryQuery = "SELECT * FROM items WHERE itemCategory = 'trouser' AND itemGender='female' LIMIT 4;";
$resultItems = mysqli_query($conn,$categoryQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
  <li><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></li>
  ";
}

?>
                      </ul>
                    </div>
                    <div class="grid-column-3">
                      <h5>Jacket</h5>
                      <ul>
                      <?php

$categoryQuery = "SELECT * FROM items WHERE itemCategory = 'jacket' AND itemGender='female' LIMIT 4;";
$resultItems = mysqli_query($conn,$categoryQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
  <li><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></li>
  ";
}

?>
                      </ul>
                    </div>
                  </div>
                  <div class="images-categories-wrapper">
                    <div class="images-grid-column-1">
                    <?php

$bundleQuery = "SELECT * FROM items WHERE itemCategory = 'bundle' AND itemGender='female' Limit 1,1";
$resultItems = mysqli_query($conn,$bundleQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
 
  <div class='image-container'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'><img src=".$rowItems['itemPath']."></a></div>
  ";
  Echo"

  <div class='image-container-txt'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></div>";
}

?>
                      
                      
                    </div>
                    <div class="images-grid-column-2">
                    <?php

$bundleQuery = "SELECT * FROM items WHERE itemCategory = 'bundle' AND itemGender='female' Limit 2,1";
$resultItems = mysqli_query($conn,$bundleQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
 
  <div class='image-container'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'><img src=".$rowItems['itemPath']."></a></div>
  ";
  Echo"

  <div class='image-container-txt'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></div>";
}

?>
                    </div>
                    <div class="images-grid-column-3">
                    <?php

$bundleQuery = "SELECT * FROM items WHERE itemCategory = 'bundle' AND itemGender='female' Limit 3,1";
$resultItems = mysqli_query($conn,$bundleQuery);
while($rowItems = mysqli_fetch_assoc($resultItems)){
  Echo"
 
  <div class='image-container'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'><img src=".$rowItems['itemPath']."></a></div>
  ";
  Echo"

  <div class='image-container-txt'><a href='individualItemPage.php?prodID=".$rowItems['itemId'].".'>".$rowItems['itemName']."</a></div>";
}

?>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      <div class="logo-header"><a href="index.php">Times</a></div>
      <div class="icon-navigation-desktop">
        <ul>
        <?php
   
   if(isset($_SESSION["uid"])){
     if (isset($_SESSION['cart'])) {
       
       $count=count($_SESSION['cart']);
     }
    $sqlDetails = "SELECT * FROM userdetails WHERE uid = $id;";
    $resultDetails = mysqli_query($conn,$sqlDetails);
    $rowDetails = mysqli_fetch_assoc($resultDetails);
    echo "<li><a href='profilepage.php'><i class='fa-solid fa-user-check'></i></a></li>
    <span>".$rowDetails['aliasName']."</span>";
    echo "<li><a href='addToCart.php'>$count<i class='fas fa-shopping-cart'></i></a></li>";
  } else{
    echo "<li><a href='registration.php'><i class='far fa-user'></i></a></li>";
  }


      ?>
        <li><a href=""><i class="fas fa-globe-africa"></i></a></li>
      </ul>
      </div>
  </div>
            <div class="form-wrapper">
            <form action="search.php" class="form" method="GET">
              <input type="text" name="searchbox" placeholder="Discover...." />
              
              <button class="button">
                <i class="material-icons" id="bttns1">search</i>
              </button>
            </form>
            </div>
  <!--Desktop header now ends-->


  </header>
  
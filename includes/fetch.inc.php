<?php

session_start();

include_once("dbh.inc.php");
if(!$conn){
    echo "Error";
  
}

if(isset($_POST['request'])){
   
  
    $request = $_POST['request'];
        if($request=='XS'||$request=='S'||$request=='M'||$request=='L'||$request=='XL'){
        $concatenate = " AND itemSize='$request'";
        $query = $_SESSION['searchquery'];
        $query.=$concatenate;
    } 
    else if($request=='male'||$request=='female'){
        $concatenate = " AND itemGender='$request'";
        $query = $_SESSION['searchquery'];
        $query.=$concatenate;
    }
    else if($request=='apparel'||$request=='bundle'||$request=='jacket'||$request=='shirt'||$request=='trouser'||$request=='dress'
    ||$request=='jewellery'){
        $concatenate = " AND itemCategory='$request'";
        $query = $_SESSION['searchquery'];
        $query.=$concatenate;
    }
    else
        if($request=="<25"){
        $concatenate = " AND itemPrice<25";
        $query = $_SESSION['searchquery'];
        $query.=$concatenate;
             
        }
        else if($request=="25-50"){
            $concatenate = " AND (itemPrice>25 AND itemPrice<50)";
            $query = $_SESSION['searchquery'];
            $query.=$concatenate;
        }
        else if($request=="50-75"){
            $concatenate = " AND (itemPrice>50 AND itemPrice<75)";
            $query = $_SESSION['searchquery'];
            $query.=$concatenate;
        }
        else if($request=="75-100"){
            $concatenate = " AND (itemPrice>75 AND itemPrice<100)";
            $query = $_SESSION['searchquery'];
            $query.=$concatenate;
        } 
        else if ($request=="100"){
          
            $concatenate = " AND itemPrice>100";
            $query = $_SESSION['searchquery'];
            $query.=$concatenate;
        }
        else{
            $query = $_SESSION['searchquery'];
        }
        
    
    
    
    
        $result = mysqli_query($conn,$query);
        $count = mysqli_num_rows($result);
        Echo"
         <h2 >Filter by: ".$_POST['request']."</h2>";

        while($row = mysqli_fetch_assoc($result)){
      
          Echo"
       
          <div class='product'>
          <img src=$row[itemPath]>
              <h2>$row[itemName]</h2>   
              <h2>$$row[itemPrice]</h2> 
              <form action='individualItemPage.php' method='POST'>   
              <input type='hidden' name='productId' value=$row[itemId] />
              <div class='view-item'>
              <input type='submit'  class='view-item' name='queryProduct' value='View'>
              </div>
              </form>
          </div>";

       
    

    }
   
   

}
     ?>

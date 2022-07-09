<?php include "header.php";?>

<div class="hero">
  <div class="form-box">
    <div class="buttons-container">
      <div id="togbut"></div>
      
<button type="button" class="toggle-btn" onclick="register()">Register</button>
<button type="button" class="toggle-btn" onclick="login()">Log in</button>
    </div>
    

<!--Registration form-->
<form class="input-group" id="register" action="includes/signup.inc.php" method="POST">
<div class="user-details">
    <div class="input-field">
        <span class="description">Name</span>
        <input type="text" name="full_name" placeholder=" Enter your name">
    </div>
    <div class="input-field">
        <span class="description">Username</span>
        <input type="text" name="username" placeholder=" Enter your username">
    </div>
    <div class="input-field">
        <span class="description">Email</span>
        <input type="text" name="email"placeholder=" Enter your email">
    </div>
    <div class="input-field">
        <span class="description">Phone Number</span>
        <input type="text" name="phone_number" placeholder=" Enter your phone number">
    </div>
    <div class="input-field">
        <span class="description">Password</span>
        <input type="password" name="password" placeholder=" Enter your password">
    </div>
    <div class="input-field">
        <span class="description">Confirm Password</span>
        <input type="password" name="confirm_password" placeholder=" Confirm your password">
    </div>
    <div class="input-field">
        <span class="description">Zip code</span>
        <input type="text" name="zipcode" placeholder=" Enter your Zip code">
    </div>
    <div class="input-field">
        <span class="description">Address</span>
        <input type="text" name="address" placeholder=" Enter your Address">
    </div>
</div>
<div class="gender-details">
    <input type="radio" name="gender" value="male" id="dot-1">
    <input type="radio" name="gender" value="female" id="dot-2">
    
    <span class="gender-title">Gender</span>
    <div class="category-gender">
        <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>

        </label>
        <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
            
        </label>


    </div>


</div>
<div class="button">
    <input type="submit" name="register" value="Register">
</div>

</form>

<?php
if(isset($_GET["error"])){
if($_GET["error"]== "emptyinput"){
  echo "<p> Please fill all fields. </p>";
} 
else if($_GET["error"]== "invalidusername"){
  echo "<p> Username takes in alphanumeric values only. </p>";
}
else if($_GET["error"]== "invalidemail"){
  echo "<p> Please enter a valid email format. </p>";
}
else if($_GET["error"]== "passwordsmismatch"){
  echo "<p> Please make sure password and confirm password are equal. </p>";
}
else if($_GET["error"]== "credentialstaken"){
  echo "<p>Usermame or email taken, please try again. </p>";
}
else if($_GET["error"]== "none"){
  echo "<p>You have been successfully registered. </p>";
}

}
?> 

   
<form id="log-in" class="input-group" action="includes/login.inc.php" method="POST">
<div class="user-details">
<div class="input-field">
<span class="description">Username</span>
    <input type="text" name="username" placeholder=" Enter your username or email">
    </div>
   
    <div class="input-field">
    <span class="description">Password</span>
    <input type="password" name="password" placeholder=" Enter your password">
    </div>
    </div>
   
    <div class="button">
    <input type="submit" name="login" value="login">
</div>

    </form>
    <?php
      if(isset($_GET["error"])){
         if($_GET["error"]== "wronglogin"){
          echo "<p> Wrong log in credentials. </p>";
        }
       
        
      }
    ?>     
  </div>
</div>
<script>

  var x = document.getElementById("register");
  var y = document.getElementById("log-in");
  var z = document.getElementById("togbut");
  function login(){
    x.style.left = "-450px";
    y.style.left = "8px";
    z.style.left = "110px";

  }
  function register(){
    x.style.left = "8px";
    y.style.left = "450px";
    z.style.left = "0px";

  }

  </script>

    
    <footer>
        <div class="footer-container">
          <div class="newsletter">
                    <p>Stay Updated</p>
            <form action="" class="Newsletter-subscribe">
                <input type="text" placeholder="Jone_Doe@gmail.com"/>
                <button>Submit</button>
            </form>
            </div>
    
              <div class="lorem1">
               <div id="a"> <h5>Contact</h5>
               </div> 
               <div id="b">   
                <p>
                   FOICDT, <br>
                      University Of 
                       Mauritius, <br>
                      Reduit, Moka, <br>
                      Mauritius
                    </p>
                  </div> 
              </div>
    
              <div class="lorem2">
                <div>
                  <h5>
                    Menu
                  </h5>
                  <div class="links1">
                    <a href="#">Men</a>
                    <a href="#">Women</a>
                    <a href="#">Featured</a>
                    <a href="#">On Discount</a>
                  </div>
                </div>
              </div>
    
              <div class="Additionnal-Links">
                <h5>Additionnal Links</h5>
                <div class="links1">
                  <a href="#">Apparel</a>
                  <a href="#">Know Your Size</a>
                  <a href="#">Policies</a>
                  <a href="#">Delivery</a>
                </div>
              </div>
    
              <div class="small">
                <a href=""><i class="fab fa-facebook"></i></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-pinterest"></i></i></a>
              </div>
    
              <div class="ARR">
              <p>All Rights Reserved, Times Inc.</p>
              </div>
            </div>
      </footer>
    
  </body>
  
</html>


function check_username(x){
   
    var http_request= new XMLHttpRequest();
   
    var userNamevalue=document.getElementById('user_name').value;
  
    
    var parameters = "username="+userNamevalue;
    http_request.open("POST", "ajaxPhp/usernamePOST.php", true);
    http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    http_request.onreadystatechange=function(){
     if (http_request.readyState==4){
      if (http_request.status==200) {
        
        var xmlResponse = http_request.responseXML;
        var status=xmlResponse.getElementsByTagName("status-message")[0].firstChild.nodeValue;
        
        if(status=="Field validated"){
          
          x.style.borderColor = "black";
          response = '<a><i class="fa-solid fa-square-check"></i></a>'  + status;
        } else{
          x.style.borderColor = "red";
          response = '<a><i class="fa-solid fa-circle-exclamation"></i></a>'  + status;
        }
        
        document.getElementById("username-form-message").innerHTML=response;
      }
      else{
       alert("An error has occured making the request");
      }
     }
    }
   
    http_request.send(parameters);
}















function check_name(x){

  //x.style.borderColor = "red";
  var http_request= new XMLHttpRequest();
 
  var namevalue=document.getElementById('full_name').value;

  //var agevalue=document.getElementById("age").value;
  //var parameters="name="+namevalue+"&age="+agevalue;
  var parameters = "name="+namevalue;
  http_request.open("POST", "ajaxPhp/namePost.php", true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  http_request.onreadystatechange=function(){
   if (http_request.readyState==4){
    if (http_request.status==200) {
      //xml element
      var xmlResponse = http_request.responseXML;
      var error=xmlResponse.getElementsByTagName("error")[0].firstChild.nodeValue;
      //var status=xmlResponse.getElementsByTagName("status")[0].firstChild.nodeValue;
      //construct and display response
      if(error=="Field validated"){
        
       // x.style.borderColor = "green";
        response = '<a><i class="fa-solid fa-square-check"></i></a>'  + error;
      } else{
        x.style.borderColor = "red";
        response = '<a><i class="fa-solid fa-circle-exclamation"></i></a>'  + error;
      }
    
      
      //<a><i class="fa-solid fa-square-check"></i></a>
      document.getElementById("name-form-message").innerHTML=response;
    }
    else{
     alert("An error has occured making the request");
    }
   }
  }
 
  http_request.send(parameters);
}
function check_mail(x){
 
  //x.style.borderColor = "red";
  var http_request= new XMLHttpRequest();
 
  var mailValue=document.getElementById('user_mail').value;
  
  //var agevalue=document.getElementById("age").value;
  //var parameters="name="+namevalue+"&age="+agevalue;
  var parameters = "email="+mailValue;
  http_request.open("POST", "ajaxPhp/emailPost.php", true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  http_request.onreadystatechange=function(){
   if (http_request.readyState==4){
    if (http_request.status==200) {
      //xml element
      var xmlResponse = http_request.responseXML;
      var error=xmlResponse.getElementsByTagName("error")[0].firstChild.nodeValue;
      //var status=xmlResponse.getElementsByTagName("status")[0].firstChild.nodeValue;
      //construct and display response
      if(error=="Field validated"){
        
        //x.style.borderColor = "green";
        response = '<a><i class="fa-solid fa-square-check"></i></a>'  + error;
      } else{
        x.style.borderColor = "red";
        response = '<a><i class="fa-solid fa-circle-exclamation"></i></a>'  + error;      }
  
      
      //<a><i class="fa-solid fa-square-check"></i></a>
      document.getElementById("email-form-message").innerHTML=response;
    }
    else{
     alert("An error has occured making the request");
    }
   }
  }
 
  http_request.send(parameters);
}


function check_phone(x){

  //x.style.borderColor = "red";
  var http_request= new XMLHttpRequest();
 
  var phone=document.getElementById('phone_number').value;

  //var agevalue=document.getElementById("age").value;
  //var parameters="name="+namevalue+"&age="+agevalue;
  var parameters = "phone="+phone;
  http_request.open("POST", "ajaxPhp/phonePOST.php", true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  http_request.onreadystatechange=function(){
   if (http_request.readyState==4){
    if (http_request.status==200) {
      //xml element
      var xmlResponse = http_request.responseXML;
      var error=xmlResponse.getElementsByTagName("error")[0].firstChild.nodeValue;
      //var status=xmlResponse.getElementsByTagName("status")[0].firstChild.nodeValue;
      //construct and display response
      if(error=="Field validated"){
        
       // x.style.borderColor = "green";
        response = '<a><i class="fa-solid fa-square-check"></i></a>'  + error;
      } else{
        x.style.borderColor = "red";
        response = '<a><i class="fa-solid fa-circle-exclamation"></i></a>'  + error;
      }
    
      
      //<a><i class="fa-solid fa-square-check"></i></a>
      document.getElementById("phone-form-message").innerHTML=response;
    }
    else{
     alert("An error has occured making the request");
    }
   }
  }
 
  http_request.send(parameters);
}

function check_password(x){

  //x.style.borderColor = "red";
  var http_request= new XMLHttpRequest();
 
  var password=document.getElementById('password').value;

  //var agevalue=document.getElementById("age").value;
  //var parameters="name="+namevalue+"&age="+agevalue;
  var parameters = "password="+password;
  http_request.open("POST", "ajaxPhp/password.php", true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  http_request.onreadystatechange=function(){
   if (http_request.readyState==4){
    if (http_request.status==200) {
      //xml element
      var xmlResponse = http_request.responseXML;
      var error=xmlResponse.getElementsByTagName("error")[0].firstChild.nodeValue;
      //var status=xmlResponse.getElementsByTagName("status")[0].firstChild.nodeValue;
      //construct and display response
      if(error=="Field validated"){
        
        //x.style.borderColor = "green";
        response = '<a><i class="fa-solid fa-square-check"></i></a>'  + error;
      } else{
        x.style.borderColor = "red";
        response = '<a><i class="fa-solid fa-circle-exclamation"></i></a>'  + error;
      }
    
      
      //<a><i class="fa-solid fa-square-check"></i></a>
      document.getElementById("password-form-message").innerHTML=response;
    }
    else{
     alert("An error has occured making the request");
    }
   }
  }
 
  http_request.send(parameters);
}

function check_confirm_password(x){

  //x.style.borderColor = "red";
  var http_request= new XMLHttpRequest();
 
  var password=document.getElementById('confirm_password').value;
 
  //var agevalue=document.getElementById("age").value;
  //var parameters="name="+namevalue+"&age="+agevalue;
  var parameters = "password="+password;
  http_request.open("POST", "ajaxPhp/confirmPasswordPOST.php", true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  http_request.onreadystatechange=function(){
   if (http_request.readyState==4){
    if (http_request.status==200) {
      //xml element
      var xmlResponse = http_request.responseXML;
      var error=xmlResponse.getElementsByTagName("error")[0].firstChild.nodeValue;
      //var status=xmlResponse.getElementsByTagName("status")[0].firstChild.nodeValue;
      //construct and display response
      if(error=="Field validated"){
        
        //x.style.borderColor = "green";
        response = '<a><i class="fa-solid fa-square-check"></i></a>'  + error;
      } else{
        x.style.borderColor = "red";
        response = '<a><i class="fa-solid fa-circle-exclamation"></i></a>'  + error;
      }
    
      
      //<a><i class="fa-solid fa-square-check"></i></a>
      document.getElementById("confirm-form-message").innerHTML=response;
    }
    else{
     alert("An error has occured making the request");
    }
   }
  }
 
  http_request.send(parameters);
}
function check_zipcode(x){
  
  //x.style.borderColor = "red";
  var http_request= new XMLHttpRequest();
 
  var zipcode=document.getElementById('zipcode').value;
 
  //var agevalue=document.getElementById("age").value;
  //var parameters="name="+namevalue+"&age="+agevalue;
  var parameters = "zipcode="+zipcode;
  http_request.open("POST", "ajaxPhp/zipcodePOST.php", true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  http_request.onreadystatechange=function(){
   if (http_request.readyState==4){
    if (http_request.status==200) {
      //xml element
      var xmlResponse = http_request.responseXML;
      var error=xmlResponse.getElementsByTagName("error")[0].firstChild.nodeValue;
      //var status=xmlResponse.getElementsByTagName("status")[0].firstChild.nodeValue;
      //construct and display response
      if(error=="Field validated"){
        
        //x.style.borderColor = "green";
        response = '<a><i class="fa-solid fa-square-check"></i></a>'  + error;
      } else{
        x.style.borderColor = "red";
        response = '<a><i class="fa-solid fa-circle-exclamation"></i></a>'  + error;
      }
    
      
      //<a><i class="fa-solid fa-square-check"></i></a>
      document.getElementById("zip-form-message").innerHTML=response;
    }
    else{
     alert("An error has occured making the request");
    }
   }
  }
 
  http_request.send(parameters);
}

function check_address(x){
 
  //x.style.borderColor = "red";
  var http_request= new XMLHttpRequest();
 
  var address=document.getElementById('address').value;
  
  //var agevalue=document.getElementById("age").value;
  //var parameters="name="+namevalue+"&age="+agevalue;
  var parameters = "address="+address;
  http_request.open("POST", "ajaxPhp/addressPOST.php", true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  http_request.onreadystatechange=function(){
   if (http_request.readyState==4){
    if (http_request.status==200) {
      //xml element
      var xmlResponse = http_request.responseXML;
      var error=xmlResponse.getElementsByTagName("error")[0].firstChild.nodeValue;
      //var status=xmlResponse.getElementsByTagName("status")[0].firstChild.nodeValue;
      //construct and display response
      if(error=="Field validated"){
        
        //x.style.borderColor = "green";
        response = '<a><i class="fa-solid fa-square-check"></i></a>'  + error;
      } else{
        x.style.borderColor = "red";
        response = '<a><i class="fa-solid fa-circle-exclamation"></i></a>'  + error;
      }
      
      
      //<a><i class="fa-solid fa-square-check"></i></a>
      document.getElementById("address-form-message").innerHTML=response;
    }
    else{
     alert("An error has occured making the request");
    }
   }
  }
 
  http_request.send(parameters);
}
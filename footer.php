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
    <script>

$(document).ready(function(){
  
    $(".fetchval").on('change',function(){
        var value = $(this).val() 
        $.ajax({
            url:"includes/fetch.inc.php",
            type:"POST",
            data:'request='+value,
            

           beforeSend:function(){
             $(".item-results-container").html("<span>Working....</span>");

           },
           success:function(data){
             $(".item-results-container").html(data);
             
           },
           error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
        });
    });
});
</script>
    </body>
</html>
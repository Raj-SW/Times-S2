 var index;
 var banner_index;
 window.addEventListener('load', function() {
     index = 0;
     show_images(index);
     
    });
     
 
    
    function show_images(i){
        
        index += i;
        
        var images= document.getElementsByClassName("Featured-item-carousel");
        var dots = document.getElementsByClassName("dot");
        
        for(i = 0; i<images.length;i++){
            images[i].style.display = "none";
            
        }
        
        for(i=0; i<dots.length;i++){
            dots[i].className = dots[i].className.replace(" active","");
        }
        
        if(index > images.length -1)
        {
            index = 0;
        }
        else if(index < 0)
        {
            index = images.length -1;
        }
        
        images[index].style.display = 'block'; 
        dots[index].className += " active";
    }
    
    window.addEventListener('load', function() {
        banner_index = 0;
        show_banners(banner_index);
       });
    function show_banners(i){
        
        banner_index += i;
        
    var images= document.getElementsByClassName("Banner-item-carousel");
   
    
    for(i = 0; i<images.length;i++){
        images[i].style.display = "none";
        
    }
  
    if(banner_index > images.length -1)
    {
        banner_index = 0;
    }
    else if(banner_index < 0)
    {
        banner_index = images.length -1;
    }
  
images[banner_index].style.display = 'block'; 
   
}





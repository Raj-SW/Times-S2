let toggleNavStatus=false;

let toggleNav= function(){
    let getSidebar=document.querySelector(".side-bar-mobile");
    //let getSidebarTitle=document.querySelector(".nav-sidebar span");
    //let getSidebarLinks=document.querySelectorAll(".nav-sidebar a");
    let icon_hamburger =document.querySelector(".icon-hamburger");
    let his_wrapper=document.querySelector(".his-wrapper");
    let her_wrapper=document.querySelector(".her-wrapper");
    let other_links=document.querySelector(".otherlinks");
    let search_icon_mobile=document.querySelector(".searchbar-mobile-wrapper i");
    let mobile_search_button=document.querySelector(".search-form-mobile button");
    if(toggleNavStatus===false)
    {
        console.log("hi");
        
        icon_hamburger.innerHTML='<i class="fas fa-times" onclick="toggleNav()"></i> ';
        getSidebar.style.width="100%";

        his_wrapper.style.opacity="1";
        her_wrapper.style.opacity="1";
       his_wrapper.style.visibility="visible";
       her_wrapper.style.visibility="visible";
       other_links.style.opacity="1";
       other_links.style.visibility="visible";
       search_icon_mobile.style.visibility="visible";
       search_icon_mobile.style.opacity="1";
       
     
        toggleNavStatus=true;
        
        
    }
    
    else if   ( toggleNavStatus===true){
        console.log("hi2");

        icon_hamburger.innerHTML='<i class="fas fa-bars" onclick="toggleNav()"></i>';
        getSidebar.style.width="0%";


        his_wrapper.style.visibility="invisible";
        his_wrapper.style.opacity="0";
        her_wrapper.style.visibility="invisible";
        her_wrapper.style.opacity="0";
        other_links.style.opacity="0";
        other_links.style.visibility="invisible";

        search_icon_mobile.style.visibility="invisible";
        search_icon_mobile.style.opacity="0";
        
       /* getSidebar.style.width="50px";
        getSidebarTitle.style.opacity="0";

        for(var i=0;i<getSidebarLinks.length;i++)
        {
            getSidebarLinks[i].style.opacity="0";
        }
        */
        toggleNavStatus=false;
    }

}
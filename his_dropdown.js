let hisDropdownStatus=false;
let herDropdownStatus=false;

let hisToggle= function(){
    let icon=document.querySelector(".his-header i")
    let hisdropDown =document.querySelector(".his-ul-dropdown");
    if(hisDropdownStatus===false){
   icon.classList="fas fa-angle-up";
    hisdropDown.style.height="auto";
    hisdropDown.style.opacity="1";
    hisdropDown.style.visibility="visible";
    hisDropdownStatus=true;

}
else if(hisDropdownStatus===true)
{
    icon.classList="fas fa-angle-down";
    hisdropDown.style.height="0";
    hisdropDown.style.opacity="0";
    hisdropDown.style.visibility="hidden";
    hisDropdownStatus=false;
}

}
    let herToggle= function(){
        let icon=document.querySelector(".her-header i")
        let herdropDown =document.querySelector(".her-ul-dropdown");
    if(herDropdownStatus===false){
        icon.classList="fas fa-angle-up";
        herdropDown.style.height="auto";
        herdropDown.style.opacity="1";
        herdropDown.style.visibility="visible";
        herDropdownStatus=true;
    }
    else if(herDropdownStatus===true)
    {
        icon.classList="fas fa-angle-down";
        herdropDown.style.height="0";
        herdropDown.style.opacity="0";
        herdropDown.style.visibility="hidden";
    // hisdropDown.style.display="none";
        herDropdownStatus=false;
    }

}
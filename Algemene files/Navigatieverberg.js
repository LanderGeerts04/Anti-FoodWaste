function verberg(){
    if(document.getElementById("nav").style.display=="none"){
        document.getElementById("nav").style.display = "block"
        document.getElementsByClassName("artikel")[0].style.marginLeft="300px";
    }
    else{
        document.getElementById("nav").style.display="none";
        document.getElementsByClassName("artikel")[0].style.marginLeft="70px";
    }  
}

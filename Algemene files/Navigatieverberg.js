function verberg(){
    if(document.getElementById("nav").style.display=="none"){
        document.getElementById("nav").style.display = "block"
        document.getElementById("keuzemenu").style.marginLeft="300px";
    }
    else{
        document.getElementById("nav").style.display="none";
        document.getElementById("keuzemenu").style.marginLeft=0;
    }  
}

function cusregistration(){
    document.getElementById("cuslogin").style.display="none";
    document.getElementById("cusregistration").style.display="flex";
}
function cuslogin(){
    document.getElementById("cuslogin").style.display="flex";
    document.getElementById("cusregistration").style.display="none";
    document.getElementById("worlogin").style.display="none";
    document.getElementById("adminlogin").style.display="none";
}
function worlogin(){
    document.getElementById("cuslogin").style.display="none";
    document.getElementById("worregistration").style.display="none";
    document.getElementById("worlogin").style.display="flex";
    document.getElementById("adminlogin").style.display="none";
}
function worregistration(){
    document.getElementById("worlogin").style.display="none";
    document.getElementById("worregistration").style.display="flex";
}
function adminlogin(){
    document.getElementById("adminlogin").style.display="flex";
    document.getElementById("cuslogin").style.display="none";
}
/* quick assist page*/

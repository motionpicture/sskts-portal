var defImg;
function ImgChange(target, img){
  if(document.getElementById){
    defImg = document.getElementById(target).getAttribute("src");
    document.getElementById(target).setAttribute("src", img);
  }
}
function ImgBack(target){
  if(document.getElementById){
    document.getElementById(target).setAttribute("src",defImg);
  }
}

function menuLink(linkLoc)
{ if(linkLoc !="") { window.location.href=linkLoc;} }

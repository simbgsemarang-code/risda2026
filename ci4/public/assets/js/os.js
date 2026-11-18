window.onscroll = function() {skroll()};

function skroll() {
    var element = document.getElementById("navtick");
  if (document.documentElement.scrollTop > 100) {
    element.classList.add("fixed-top");
  } 
  else {
    element.classList.remove("fixed-top");
  } 
}

document.getElementById("btnmasuk").onclick = function() {nav_coll()};
function nav_coll() {
  document.getElementById("navtick").classList.add("none");
}
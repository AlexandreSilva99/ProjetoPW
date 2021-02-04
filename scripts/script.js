//-------------------------------------------------------------------------------
// Header
function user_over() {
    document.getElementById("header_user").src = 'img/header/cliente_hover.png';
    document.getElementById("header_user").style.cursor = "pointer";
}

function user_out() {
    document.getElementById("header_user").src = 'img/header/cliente.png';
}

function admin_over() {
    document.getElementById("header_user").src = 'img/header/admin_hover.png';
    document.getElementById("header_user").style.cursor = "pointer";
}

function admin_out() {
    document.getElementById("header_user").src = 'img/header/admin.png';
}




/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropuser() {
    document.getElementById("dropdownuser").classList.toggle("show");
}
  
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropuserbtt')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
}




// SlideShow

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

// var slideIndex = 0;
// showSlides();

// function showSlides() {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   slideIndex++;
//   if (slideIndex > slides.length) {slideIndex = 1}
//   slides[slideIndex-1].style.display = "block";
//   setTimeout(showSlides, 6000); // Change image every 2 seconds
// }
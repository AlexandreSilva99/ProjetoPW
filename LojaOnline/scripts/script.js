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
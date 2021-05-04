// document.getElementById("btn__registrarse").addEventListener('click',register);
// document.getElementById("btn__iniciar-sesion").addEventListener('click',iniciarSesion);

// window.addEventListener("resize", anchoPage);

// let contenedor_login_register = document.querySelector(".contenedor__login-register");
// let formulario_login = document.querySelector(".formulario__login");
// let formulario_register = document.querySelector(".formulario__register");
// let caja_trasera_login = document.querySelector(".caja__trasera-login");
// let caja_trasera_register = document.querySelector(".caja__trasera-register");


// function anchoPage(){
//     if(window.innerWidth > 768){
//         caja_trasera_login.style.display = "block";
//         caja_trasera_register.style.display = "block";
//     }else{
//         caja_trasera_register.style.display = "block";
//         caja_trasera_register.style.opacity = "1";
//         caja_trasera_login.style.display = "none";
//         formulario_login.style.display = "block";
//         formulario_register.style.display = "none";
//         contenedor_login_register.style.left = "0px";
//     }
// }

// anchoPage();
// function iniciarSesion(){
//     if(window.innerWidth > 768){
//     formulario_register.style.display = "none";
//     contenedor_login_register.style.left = "1rem" ;
//     formulario_login.style.display = "block";
//     caja_trasera_register.style.opacity = "1";
//     caja_trasera_login.style.opacity = "0";
//     }else{
//         formulario_register.style.display = "none";
//         contenedor_login_register.style.left = "0px" ;
//         formulario_login.style.display = "block";
//         caja_trasera_register.style.display = "block";
//         caja_trasera_login.style.display = "none";
//     }
// }
// function register(){
//     if(window.innerWidth > 768){
//     formulario_register.style.display = "block";
//     contenedor_login_register.style.left = "41rem" ;
//     formulario_login.style.display = "none";
//     caja_trasera_register.style.opacity = "0";
//     caja_trasera_login.style.opacity = "1";
//     }else{
//         formulario_register.style.display = "block";
//         contenedor_login_register.style.left = "0px" ;
//         formulario_login.style.display = "none";
//         caja_trasera_register.style.display = "none";
//         caja_trasera_login.style.display = "block";
//         caja_trasera_login.style.opacity = "1";
//     }
// }
// function valideKey(event){
			
//     var code = (event.which) ? event.which : event.keyCode;
    
//     if(code==8) { // backspace.
//       return true;
//     } else if(code>=65 && code<=90) { 
//       return true;
//     } else if(code>=97 && code<=122){
//         return true;
//     } else{ 
//       return false;
//     }
// }

let menu_toggle = document.getElementById('menu-toggle');
let wrapper = document.getElementById('wrapper');

menu_toggle.addEventListener('click', function(e){
    e.preventDefault();
    wrapper.classList.toggle('toggled');
});
// $("#menu-toggle").click(function(e) {
//     e.preventDefault();
//     $("#wrapper").toggleClass("toggled");
//   });

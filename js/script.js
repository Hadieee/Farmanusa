let menu = document.querySelector('#menu-btn');
let tempat = document.querySelector('.tempat');
let kepala = document.querySelector('.kepala');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    if(menu.style.left == "310px"){
        menu.style.left = "50px";
    }else{
        menu.style.left = "310px"; 
    }
    kepala.classList.toggle("active");
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

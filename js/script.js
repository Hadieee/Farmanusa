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

var storedTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");

if (storedTheme){
    document.documentElement.setAttribute('data-theme', storedTheme);
}

let img_dark = document.querySelector('.dark');
let img_light = document.querySelector('.light');

var currentTheme = document.documentElement.getAttribute('data-theme');
let toggle = document.querySelector('#toggle');

if(currentTheme === "light") {
    toggle.checked = false;
    img_light.style.display = "block";
    img_dark.style.display = "none";
}

else {
    toggle.checked = true;
    img_light.style.display = "none";
    img_dark.style.display = "block";
}

toggle.onclick = function(){
    var currentTheme = document.documentElement.getAttribute('data-theme');
    var targetTheme = "light";

    img_light.style.display = "block";
    img_dark.style.display = "none";

    if (currentTheme === "light") {
        targetTheme = "dark";
        img_light.style.display = "none";
        img_dark.style.display = "block";
    }

    document.documentElement.setAttribute('data-theme', targetTheme);
    localStorage.setItem('theme', targetTheme);
}
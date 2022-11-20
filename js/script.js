let menu = document.querySelector('#menu-btn');
let tempat = document.querySelector('.tempat');
let kepala = document.querySelector('.kepala');

if(menu){
    menu.onclick = () =>{
        menu.classList.toggle('fa-times');
        if(menu.style.left == "310px"){
            menu.style.left = "50px";
        }else{
            menu.style.left = "310px"; 
        }
        kepala.classList.toggle("active");
    }
}

var storedTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");

if (storedTheme){
    document.documentElement.setAttribute('data-theme', storedTheme);
}

let img_dark = document.querySelector('.image .dark');
let img_light = document.querySelector('.image .light');
let img_dark1 = document.querySelector('.image .dark1');
let img_light1 = document.querySelector('.image .light1');

var currentTheme = document.documentElement.getAttribute('data-theme');
let toggle = document.querySelector('#toggle');

if(img_dark && img_light){
    
    if(currentTheme === "light") {
        toggle.checked = false;
        img_light.style.display = "block";
        img_dark.style.display = "none";
        if(img_dark1 && img_light1){
            img_light1.style.display = "block";
            img_dark1.style.display = "none";
        }
    }
    
    else {
        toggle.checked = true;
        img_light.style.display = "none";
        img_dark.style.display = "block";
        if(img_dark1 && img_light1){
            img_light1.style.display = "none";
            img_dark1.style.display = "block";
        }
    }
    
    toggle.onclick = function(){
        var currentTheme = document.documentElement.getAttribute('data-theme');
        var targetTheme = "light";
        
        img_light.style.display = "block";
        img_dark.style.display = "none";
        if(img_dark1 && img_light1){
            img_light1.style.display = "block";
            img_dark1.style.display = "none";
        }
    
        if (currentTheme === "light") {
            targetTheme = "dark";
            img_light.style.display = "none";
            img_dark.style.display = "block";
            if(img_dark1 && img_light1){
                img_light1.style.display = "none";
                img_dark1.style.display = "block";
            }
        }
    
        document.documentElement.setAttribute('data-theme', targetTheme);
        localStorage.setItem('theme', targetTheme);
    }
}else if(toggle){
    toggle.onclick = function(){
        var currentTheme = document.documentElement.getAttribute('data-theme');
        var targetTheme = "light";
    
        if (currentTheme === "light") {
            targetTheme = "dark";
        }
    
        document.documentElement.setAttribute('data-theme', targetTheme);
        localStorage.setItem('theme', targetTheme);
    }
}

function cart_add(){
    return alert(" Obat berhasil ditambahkan ke Keranjang.");
}

function beli(){
    if (!confirm("Selesai memilih dan lakukan pemesanan?")){
            return false;}
    
    this.form.submit();
}

function konfirmasi(){
    if (!confirm("Konfirmasi Pembayaran Obat?")){
            return false;}
    this.form.submit();
}

function warning(){
    alert("mohon gunakan tombol 'Pesan Sekarang'");
    return false;
}

function loggingPop(){
    if(document.getElementById('popup').style.display != 'flex'){
        document.getElementById('popup2').style.display = 'none';
        document.getElementById('popup').style.display = 'flex';
    }
    else{
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popup2').style.display = 'flex';
    }
}

function imposeMinMax(el){
    if(el.value != ""){
      if(parseInt(el.value) < parseInt(el.min)){
        el.value = el.min;
      }
      if(parseInt(el.value) > parseInt(el.max)){
        el.value = el.max;
      }
    }
}

function totalHarga(el, harga, jalur){
    var change = document.getElementsByClassName('value');
    if (jalur == "+"){
        var harga_total = parseInt(change[0].innerHTML) + el.value * parseInt(harga);
    }
    else{
        var harga_total = parseInt(change[0].innerHTML) - el.value * parseInt(harga);
    }

    if(harga_total <= 0){
        harga_total = 0;
    }

    change[0].innerHTML = harga_total;
}
const toggler = document.querySelector("#sidebarToggle");
toggler.addEventListener("click",function(){
    document.querySelector("#layoutSidenav_nav").classList.toggle("collapsed")
    document.querySelector("#layoutSidenav_main").classList.toggle("collapsed")
});
// navbar 
const Menu = document.querySelector(".close-nav");
const Openmenu = document.querySelector("#navbar-open");
const Closemenu = document.querySelector(".back-button");
const Chevron = document.querySelector(".tw-chevron");


Menu.addEventListener('click',  function (){
    Openmenu.classList.toggle('open')
    Chevron.classList.toggle('top')
});

Closemenu.addEventListener('click', function () {
    Openmenu.classList.toggle('open')
})

// notify  js

const Notify  = document.querySelector("#notification");
const OpenNotify = document.querySelector(".notification--none");
const CloseNotify = document.querySelector(".dimmer-close")

Notify.addEventListener('click', function () {
    if (!OpenNotify.classList.contains("dimmer--block")) {
        OpenNotify.classList.add("dimmer--block")
    } 
})

CloseNotify.addEventListener('click', function () {
    if(OpenNotify.classList.contains("dimmer--block")) {
        OpenNotify.classList.remove("dimmer--block")
    }
})


// filter
const Filter  = document.querySelector("#filter");
const OpenFilter = document.querySelector(".filter--none");
const CloseFilter = document.querySelector(".dimmer--close")

Filter.addEventListener('click', function () {
    if (!OpenFilter.classList.contains("filter--block")) {
        OpenFilter.classList.add("filter--block")
    } 
})

CloseFilter.addEventListener('click', function () {
    if(OpenFilter.classList.contains("filter--block")) {
        OpenFilter.classList.remove("filter--block")
    }
})


// downlaod
const Download  = document.querySelector("#download");
const OpenDownload = document.querySelector(".download--none");
const CloseDownload = document.querySelector(".download-close")

Download.addEventListener('click', function () {
    if (!OpenDownload.classList.contains("download--block")) {
        OpenDownload.classList.add("download--block")
    } 
})

CloseDownload.addEventListener('click', function () {
    if(OpenDownload.classList.contains("download--block")) {
        OpenDownload.classList.remove("download--block")
    }
})



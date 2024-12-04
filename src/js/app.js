document.addEventListener('DOMContentLoaded', function(){

    eventListener();
});

function eventListener() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navMobile);
}

function navMobile() {
    console.log('Diste click');
}
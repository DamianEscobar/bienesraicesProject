document.addEventListener('DOMContentLoaded', function(){

    eventListener();

    darkMode();
});

function eventListener() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navMobile);
}

function navMobile() {
    const navegacion = document.querySelector('.navegacion');

    // Esta linea de codigo hace los mismo que el if de abajo
    navegacion.classList.toggle('mostrar');

    /*if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    } else {
        navegacion.classList.add('mostrar');
    }*/
}

function darkMode() {
    const prefiereDark = window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(prefiereDark.matches)

    if (prefiereDark.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDark.addEventListener('change', () => {
        if (prefiereDark.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    })

    const bntDark = document.querySelector('.btn-dark');
    bntDark.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    })
}
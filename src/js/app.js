document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function darkMode(){

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)'); // obtiene la preferencia del sistema

    // console.log(prefiere.matches);

    // Pone el modo segun la preferencia
    if(prefiereDarkMode.matches){ 
        document.body.classList.add('dark-mode');
    } else{
        document.body.classList.remove('dark-mode');
    }

    // Hace el cambio en tiempo real
    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else{
            document.body.classList.remove('dark-mode');
        }
    })

    const darkModeBoton = document.querySelector('.dark-mode-boton');

    darkModeBoton.addEventListener('click', function(){
        
        document.body.classList.toggle('dark-mode'); // Si esta la elimina sino la agrega
    });
}


function eventListeners(){
    
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')){ // Si la navegacion tiene la clase de mostrar
        navegacion.classList.remove('mostrar'); // elimina
    } else{
        navegacion.classList.add('mostrar'); // agrega
    }
}
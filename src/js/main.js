//
// Main Scripts
//

// jQuery
window.$ = window.jQuery = $;

// INITIALIZE AOS
AOS.init();

// Header
// Resize header when scrolls down
var resizeHeader = () => {
    var scroll = $(window).scrollTop();
    var body = $('body');
    var header = $('#header');

    if( scroll >= 50 ) {
        body.removeClass('body-expand').addClass('body-shrink');
        header.removeClass('nav-expand').addClass('nav-shrink');
    } else {
        body.removeClass('body-shrink').addClass('body-expand');
        header.removeClass('nav-shrink').addClass('nav-expand');
    }
}

$(document).ready( function() {
    resizeHeader();
    $(window).scroll( resizeHeader );
    verifyToggleDarkMode();
});

const darkModeToggle = document.querySelector('dark-mode-toggle');

let verifyToggleDarkMode = () => {
    if ( darkModeToggle.mode == 'light' ) {  
        $('html').attr( 'data-theme', 'light' ); 
    } else {
        $('html').attr( 'data-theme', 'dark' );
    }
}

let toggleDarkMode = () => {
    if ( darkModeToggle.mode == 'light' ) {  
        $('html').attr( 'data-theme', 'dark' ); 
    } else {
        $('html').attr( 'data-theme', 'light' );
    }
}

$('#dark-mode-toggle').on('click', function () {
    toggleDarkMode();
});

// Toggle active item menu
$(window).scroll(function() { 
    var initial_section = $( '.initial-banner' ).height();  
    var projects_section = $( '.projects-section' ).height();    
    var scroll = $( window ).scrollTop(); 

    if ( scroll > projects_section ) {
        $( '.nav-link' ).removeClass( 'active' );
        $( '.nav-link[title="Sobre"]' ).addClass( 'active' );
    } else if ( scroll > initial_section ) {
        $( '.nav-link' ).removeClass( 'active' );
        $( '.nav-link[title="Projetos"]' ).addClass( 'active' );
    } else {
        $( '.nav-link' ).removeClass( 'active' );
    }
});

// Single project modal
const hash_project_modals = [
    'addera',
    'acessibilidade-e-usabilidade',
    'afronte',
    'mural',
    'interacao-humano-computador',
    'integracao',
    'revista-master',
    'priscila-kiguchi–microfisioterapia',
    'brunch',
    'cerqueira-leite',
    'tamarine',
    'neoquimica',
    'buscopan',
    'buscofem',
];

function toggleLoader() {
    if( $('.loader').hasClass('no-opacity') ) {
        $('.loader').removeClass('no-opacity');    
    } else {
        $('.loader').addClass('no-opacity');
    }
}

function showModal( event ) {
    let link = event.data.project;
   
    $('#content').addClass('modal-full-height');
    $('#' + link + '-content').removeClass('start-d-none');
   
    setTimeout( toggleLoader, 2500);
   
    $('#' + link + '-content').addClass('open-modal').removeClass('close-modal');
}

function hideModal( event ) {
    let link = event.data.project;
    
    toggleLoader();
    
    $('#content').removeClass('modal-full-height');
    $('#' + link + '-content').addClass('close-modal').removeClass('open-modal');

    setTimeout(
        function(){
            $('#' + link + '-content').addClass('start-d-none');
        },
        1000
    );
}

hash_project_modals.forEach( project => {
    $('#' + project + '-link').click( {project: project}, showModal );
    
    $('#' + project + '-btn').click( {project: project}, hideModal );

    $(document).keyup( {project: project}, function( event ) {
        let link = event.data.project;
        if($('#' + link + '-content').hasClass('open-modal')) {
            if ( event.key == 'Escape' ) {
                hideModal(event);
            }
        }
    });
});
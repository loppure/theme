// import Load from "./scripts/Load.js";
// import React from "react";

// document.addEventListener('DOMContentLoaded', () => {
//     var load= new Load();
//     load.load();
// });

import More from './old-theme/LoadMore';
import love from './old-theme/Love';

import $ from 'jquery';

document.addEventListener('DOMContentLoaded', () => {
    // TODO: remove!
    window.debug_card          = [];
    window.max_length          = 500;
    window.tolerance           = 10;
    window.comments_tolerance  = 1;
    window.ax_length           = 30;

    // initialize theme
    // start loving around
    love();

    // load more
    More();

    $('button.menu-toggle').on('click', e => {
        $('nav.main-navigation').toggleClass('toggle');
    });
});

//tab function

$(document).ready(function(){

  $('.content-col-servizi ul li').click(function(){
    $('.content-col-servizi').addClass('vissible');
    var tab_id = $(this).attr('data-tab');

    $('.content-col-servizi ul li').removeClass('vissible');
    $('.contento-servizio').removeClass('vissible');

    $(this).addClass('vissible');
    $(".content-contenuto-servizi #"+tab_id).addClass('vissible');
  })
    $('.content-contenuto-servizi button.close-servizi').click(function(){
      $('.content-col-servizi').removeClass('vissible');
      $('.content-contenuto-servizi .contento-servizio').removeClass('vissible');
    })
})

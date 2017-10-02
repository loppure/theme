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

//js temporaneo messo qua per le funziona navigazione menu -> home e menu
$(document).ready(function(){

  //tabs action per spazio di navigazione
  $('.content-col-servizi ul li').click(function(){
    $('.content-col-servizi').addClass('vissible');
    var tab_id = $(this).attr('data-tab');

    $('.content-col-servizi ul li').removeClass('vissible');
    $('.contento-servizio').removeClass('vissible');

    $(this).addClass('vissible');
    $(".content-contenuto-servizi #"+tab_id).addClass('vissible');
  })

  //Bottone cliusura spazio navigazione
  $('.content-contenuto-servizi button.close-servizi').click(function(){
    $('.content-col-servizi').removeClass('vissible');
    $('.content-contenuto-servizi .contento-servizio').removeClass('vissible');
  })

  //Button action general
  $('button#click-action-open-close').click(function(){
    var tab_id = $(this).attr('data-tab');

    $(this).toggleClass('vissible');
    $("#"+tab_id).toggleClass('vissible');
  })

  //tabs action per spazio di navigazione MENU
  $('.content-col-servizi-menu ul li').click(function(){
    $('.content-col-servizi-menu').addClass('vissible');
    var tab_id = $(this).attr('data-tab');

    $('.content-col-servizi-menu ul li').removeClass('vissible');
    $('.contento-servizio-menu').removeClass('vissible');

    $(this).addClass('vissible');
    $(".content-contenuto-servizi-menu #"+tab_id).addClass('vissible');
  })

})

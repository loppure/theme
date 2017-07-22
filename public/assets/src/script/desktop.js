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
    window.max_length          = 30;
    window.tolerance           = 10;
    window.comments_tolerance  = 1;
    window.ax_length           = 30;

    // initialize theme
    // start loving around
    love();

    // load more
    More();

    $('button.menu-toggle').on('click', e => {
        // TODO togglare la classe
    });
});

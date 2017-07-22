// import Load from "./scripts/Load.js";
// import React from "react";

// document.addEventListener('DOMContentLoaded', () => {
//     var load= new Load();
//     load.load();
// });

import Card from './old-theme/Card';
import love from './old-theme/Love';

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
});

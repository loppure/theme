import React from "react"
import ReactDOM from "react-dom"
import Application from "../component/Application";

import {URL} from '../scripts/config.js'

// render the Application component into .section-cont-article
export default class Load {
    constructor(locationHost) {
        this.cards= [];
        this.container =  document.getElementsByClassName('section-cont-article');
    }
    load() {
        console.log(URL.posts());
        fetch(URL.posts())
        .then( response => response.json()
        )
        .then(
            obj => {
                for (let card of obj) {
                    this.cards.push(card)
                }
                ReactDOM.render(
                    <Application
                    initialCards={this.cards}/>, document.querySelector('.section-cont-article'));
            }
        )
    }
}

import React from "react"
import ReactDOM from "react-dom"
import Application from "../component/Application";

// render the Application component into .section-cont-article
export default class Load {
    constructor(locationHost) {
        this.cards= [];
        this.container =  document.getElementsByClassName('section-cont-article');
        this.url = window.location.protocol + '//' + window.location.host + '/loppure/wp-json/wp/v2/posts'
    }
    load() {
        console.log(this.url);
        fetch(this.url)
        .then( response => response.json()
        )
        .then(
            obj => {
                for (let card of obj) {
                    this.cards.push(card) 
                }
                ReactDOM.render(
                    <Application
                    initialCards={this.cards}
                    initialURL = {this.url}/>, document.querySelector('.section-cont-article'));
            }
        )
    }
}

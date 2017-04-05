import React from 'react'

import {URL} from '../scripts/config.js'

import Article from './Article'

export default class Application extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            page: 1,
            cardsURL: this.props.initialURL,
            cards: this.props.initialCards,
            categoriesURL: URL.post_categories(),
            categories: [],
            overlay_mark: document.getElementById('overlay_mark'),
            like_url : document.querySelector('#ajax-url').value,
            myID: localStorage['love'] ? JSON.parse(localStorage['love']).myID : 'none',
            nonce: document.getElementById('love-nonce').value,
        };
        this.onLoad = this.onLoad.bind(this);
    }

    render() {
        return (
            <div>
                {this.state.cards.map((card, index) => (
                    <Article key={index}
                             card={card}
                             categories = {this.state.categories}
                             overlay_mark = {this.state.overlay_mark}
                             like_url = {this.state.like_url}
                             like = {this.state.like}
                             myID = {this.state.myID}
                             nonce = {this.state.nonce}
                    />
                ))}
                <a onClick={this.onLoad}>Pagina successiva »</a>
            </div>
        );
    }

    componentDidMount() {
        //Prende l'elenco di tutte le categorie
        let obj = [];
        fetch(this.state.categoriesURL)
        .then( response => response.json() )
        .then( categories => {
            for (let category of categories) {
                let id = category.id;
                let name = category.name;
                obj[id] = name;
            }
            this.setState({
                categories: obj
            });
        });
    }

    onLoad() {
        let pageUP = this.state.page + 1;
        console.log(URL.page_number(pageUP));
        fetch (URL.page_number(pageUP))
        .then ( response => response.json())
        .then ( cards => {
            console.log(cards);
            for (var card of cards) {
                this.state.cards.push(card);
            }
            this.state.page = pageUP;
            this.setState(this.state.cards);
        });
    }
}

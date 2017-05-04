import React from 'react'

import {URL} from '../scripts/config.js'

import Article from './Article'

export default class Application extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            page: 1,
            cards: this.props.initialCards,
            categories: new Array(),
            media: new Array(),
            city: new Array(),
            like_url : document.querySelector('#ajax-url').value,
            myID: localStorage['love'] ? JSON.parse(localStorage['love']).myID : 'none',
            nonce: document.getElementById('love-nonce').value,
            overlay_mark: document.getElementById('overlay_mark'),
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
                             media = {this.state.media}
                             city = {this.state.city}
                             like_url = {this.state.like_url}
                             myID = {this.state.myID}
                             nonce = {this.state.nonce}
                             overlay_mark = {this.state.overlay_mark}
                    />
                ))}
                <a onClick={this.onLoad}>Pagina successiva »</a>
            </div>
        );
    }

    componentDidMount() {
        /*----TAKE CATEGORIES JSON----*/
        fetch(URL.post_categories())
        .then( response => response.json())
        .then( categories => {
            this.setState({categories: categories});
            console.log(this.state.categories);
        });

        /*----TAKE MEDIA JSON----*/
        fetch(URL.media())
        .then( response => response.json())
        .then( media => {
            this.setState({media: media});
            console.log(this.state.media);
        });

        /*----TAKE CITY JSON----*/
        fetch(URL.city())
        .then( response => response.json())
        .then( city => {
            this.setState({city: city});
            console.log(this.state.city);
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

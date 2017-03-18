import React from 'react';
import ReactDOM from 'react-dom';

import {URL} from '../scripts/config.js';

import Header from './Header';
import Section from './Section';
import Footer from './Footer';
import Overlay from './Overlay';


export default class Article extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            id: this.props.card.id,
            content: this.props.card.content.rendered,
            categories: [],
            comments: [],
            date: this.props.card.date,
            featured_media:(this.props.card.featured_media != 0) ? this.props.card.featured_media : null,
            link: this.props.card.link,
            title: this.props.card.title.rendered,
            showOverlay: false,
            like: localStorage['love'] ? JSON.parse(localStorage['love']).list.length : '0',
        };
        this.hide_show = this.hide_show.bind(this);
        this.sendLike = this.sendLike.bind(this);
    }
    render() {
        return (
            <article className="post card" data-id={this.state.id}>
                <Header date={this.state.date} categories={this.state.categories}/>
                <Section
                link ={this.state.link}
                title ={this.state.title}
                media = {this.state.featured_media}
                mediaURL = {this.state.mediaURL}
                sourceMedium = {this.state.sourceMedium}
                sourceLarge = {this.state.sourceLarge}
                style = {this.state.style}
                hide_show = {this.hide_show}
                />
                <Footer
                id = {this.state.id}
                comments = {this.state.comments}
                comments_number = {this.state.comments_number}
                like = {this.state.like}
                sendLike = {this.sendLike}
                />
            </article>
        );
    }

    componentDidMount() {
        /* prende i riferimenti dell'immagine (media) */
        if (this.state.featured_media) {
            fetch(URL.media_id(this.state.featured_media))
            .then( response => response.json())
            .then( media => {
                this.setState({
                    mediaURL: URL.media_id(this.state.featured_media),
                    sourceMedium: media.media_details.sizes.medium.source_url,
                    sourceLarge : media.media_details.sizes.large.source_url,
                    style: {
                        backgroundImage: 'url(' + media.media_details.sizes.medium.source_url + ')'
                    }
                });
            });
        }
        // prende i commenti
        fetch(URL.comments_post_id(this.state.id))
        .then( response => response.json())
        .then( comments => {
            let obj = [];
            for (let comment of comments) {
                let commenti = {
                    comment_id: comment.id,
                    comment_author_name: comment.author_name,
                    comment_content: comment.content.rendered
                };
                obj.push(commenti);
            }

            this.setState({
                comments_number: comments.length,
                comments: obj,
            });
        });
    }

    componentWillReceiveProps (nextProps) {
        /* analizza le categorie e gli assegna un nome */
        let array = [];
        //per ogni categoria persente nelle card
        for (let category of this.props.card.categories){
            // se la suddetta categoria è presente nell'elenco di categorie
            if (nextProps.categories.hasOwnProperty(category)) {
                array.push(nextProps.categories[category]);
            }
            this.setState({
                categories: array
            });
        }
    }

    hide_show() {
        ReactDOM.render(
            <Overlay
                id = {this.state.id}
                comments = {this.state.comments}
                comments_number = {this.state.comments_number}
                like = {this.state.like}
                sendLike = {this.sendLike}


            sourceLarge = {this.state.sourceLarge}
            content = {this.state.content}
            date={this.state.date}
            categories={this.state.categories}
            overlay_mark = {this.props.overlay_mark}
            /> , this.props.overlay_mark
        );
    }

    sendLike() {
        console.log('parte la chiamata ajax');

        let dati = {
            _ajax_nonce:this.props.nonce,
            myID:this.props.myID,
            post_id:this.state.id,
            action:'love'
        };
        console.log(dati);
        let data = new FormData();
        data.append("_ajax_nonce", this.props.nonce);
        data.append("myID", this.props.myID);
        data.append("post_id", this.state.id);
        data.append("action", 'love');


        console.log(data)
        var xhr = new XMLHttpRequest();
        xhr.open('GET', this.props.like_url, true);
        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200) {
                // do something
                console.log('messaggio inviato!!')
            }
        }
        xhr.send(data);


    }
}

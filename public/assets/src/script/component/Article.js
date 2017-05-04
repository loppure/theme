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
            category_name: "",
            category_slug: "",
            category_link: "",
            city_name: "",
            city_slug: "",
            city_link: "",

            media_slug: "",
            media_link: "",
            media_medium_large: "",
            media_full: "",

            comments: [],

            date: this.props.card.date,
            // featured_media:(this.props.card.featured_media != 0) ? this.props.card.featured_media : null,
            showOverlay: false,
            like: localStorage['love'] ? JSON.parse(localStorage['love']).list.length : '0',
            open: false,
        };
        this.hide_show = this.hide_show.bind(this);
        this.sendLike = this.sendLike.bind(this);
        this.open_close_comments_wrapper = this.open_close_comments_wrapper.bind(this);
    }
    render() {
        return (
            <article
            className={"post card type-post format-standard hentry category-" + this.state.category_slug}
            data-id={this.props.card.id} >
                <Header
                date={this.state.date}
                category_name={this.state.category_name}
                category_link={this.state.category_link}
                city_name={this.state.city_name}
                />
                <Section
                link ={this.props.card.link}
                title ={this.props.card.title.rendered}
                content = {this.props.card.excerpt.rendered}

                media_medium_large = {this.state.media_medium_large}
                media_full = {this.state.media_full}


                // mediaURL = {this.state.mediaURL}
                // sourceMedium = {this.state.sourceMedium}
                // sourceLarge = {this.state.sourceLarge}
                // style = {this.state.style}

                hide_show = {this.hide_show}
                sendLike = {this.sendLike}
                like = {this.state.like}
                comments_number = {this.state.comments_number}
                open_close_comments_wrapper = {this.open_close_comments_wrapper}
                />
                <Footer
                id = {this.state.id}
                comments = {this.state.comments}
                open = {this.state.open}
                // comments_number = {this.state.comments_number}
                // like = {this.state.like}
                // sendLike = {this.sendLike}
                />
            </article>
        );
    }

    componentDidMount() {
        // prende i commenti
        // fetch(URL.comments_post_id(this.state.id))
        // .then( response => response.json())
        // .then( comments => {
        //     let obj = [];
        //     for (let comment of comments) {
        //         let commenti = {
        //             comment_id: comment.id,
        //             comment_author_name: comment.author_name,
        //             comment_content: comment.content.rendered
        //         };
        //         obj.push(commenti);
        //     }
        //     this.setState({
        //         comments_number: comments.length,
        //         comments: obj,
        //     });
        // });
    }

    componentWillReceiveProps (nextProps) {
        // FIND CATEGORY DATE BY THE CATEGORIES LIST
        if (nextProps.categories.length > 0) {
            let obj = nextProps.categories.find( n => n.id == this.props.card.categories[0] );
            this.setState({
                category_name: obj.name,
                category_slug: obj.slug,
                category_link: obj.link,
            });
        }

        // FIND CITY DATE BY THE CITIES LIST
        if (nextProps.city.length > 0) {
            let obj = nextProps.city.find( n => n.id == this.props.card.citta[0] );
            this.setState({
                city_name: obj.name,
                city_slug: obj.slug,
                city_link: obj.link,
            });
        }

        // FIND MEDIA DATE BY THE MEDIA LIST
        if (nextProps.media.length > 0) {
            let obj = nextProps.media.find( n => n.id == this.props.card.featured_media );
            this.setState({
                media_slug: obj.slug,
                media_link: obj.link,
                media_medium_large: obj.media_details.sizes.medium_large.source_url,
                media_full: obj.media_details.sizes.full.source_url,
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

    open_close_comments_wrapper() {
        if (this.state.open == false) {
            this.setState({
                open: true,
            });
        } else {
            this.setState({
                open: false,
            });
        }
    }
}

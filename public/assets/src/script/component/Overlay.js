import React from 'react';
import ReactDOM from 'react-dom';
import Footer from './Footer';
import Header from './Header';
import ReactHtmlParser from 'react-html-parser';

export default class Overlay extends React.Component{
    constructor(props) {
        super(props);
        self = this;
        this.html = document.documentElement;
        this.onRemove = this.onRemove.bind(this);
    }
    onRemove() {
        this.html.className = "";
        ReactDOM.unmountComponentAtNode(this.props.overlay_mark);
    }
    render() {
        this.html.className = "noScroll";

        return (
            <div id="overlay" className="seq card overlay" onClick={this.onRemove}>
                <span className="x"></span>
                <ul className="seq-canvas" onClick={ e => e.stopPropagation() }>
                    <li>
                        <div className="image">
                            <div className="pseudo-image" style={{
                                backgroundImage: 'url(' + this.props.sourceLarge + ')'
                            }}>
                            </div>
                        </div>
                        <article className="body" data-id={this.props.id}>
                            <Header
                                date={this.props.date}
                                categories={this.props.categories}
                            />
                            <section>{ReactHtmlParser(this.props.content)}</section>
                            <Footer
                                id = {this.props.id}
                                comments = {this.props.comments}
                                comments_number = {this.props.comments_number}
                                like = {this.props.like}
                                sendLike = {this.props.sendLike}
                            />
                        </article>
                    </li>
                </ul>
            </div>
        );
    }
}

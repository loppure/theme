import React from 'react';
import ReactHtmlParser from 'react-html-parser';
import Respond from './Respond';

export default class Comment extends React.Component {
    constructor(props) {
        super(props);
        this.open_close = this.open_close.bind(this);
    }
    render() {
        return (
            <article data-comment-id= {this.props.comment_id}>
                <header className="vcard author entry-title">
                    <h3>{this.props.comment_author_name}</h3>
                </header>
                <section className="comment-body">
                    {ReactHtmlParser(this.props.comment_content)}
                </section>
                <footer className="rispondi">
                    <button className="reply-anchor" onClick={this.open_close}>rispondi</button>
                    {(this.props.chiave == this.props.showResults_Comment)
                        ? <Respond
                        comment_id = {this.props.id}
                        comment_parent = {this.props.comment_id}/>
                        : null}
                </footer>
            </article>
        );
    }

    open_close() {
        this.props.open_close_respond(this.props.chiave, this.props.showResults_Comment);
    }
}

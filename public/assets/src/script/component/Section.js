import React from 'react';

export default class Section extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            content: this.props.content.split(" "),
            more: false,
        };
        this.showMore = this.showMore.bind(this);
    }
    render() {
        return (
            <section>
                <div className="tex-card">
                    <h3>
                        <a href={this.props.link}>{this.props.title}</a>
                    </h3>
                    <p>{ !this.state.more ?
                        this.state.content.slice(0, 4).join(" ") :
                        this.state.content.slice(0, 9).join(" ")}</p>
                    <a onClick={this.showMore}>{!this.state.more ? 'Altro' : 'Chiudi'}</a>
                </div>
                <div className="img-post"
                    style={this.props.style}
                    data-image-url={this.props.sourceLarge}
                    onClick={this.props.media
                    ? this.props.hide_show
                    : log}>
                </div>
                <button className="button-like-post" onClick={this.props.sendLike} data-love="0">{this.props.like + " ♥"}</button>
                <button className="comments-button" onClick={this.props.open_close_comments_wrapper}>
                {(() => {
                    switch (this.props.comments_number) {
                    case 0:     return "Commenta";
                    case 1:     return this.props.comments_number + " commento";
                    default:    return this.props.comments_number + " commenti";
                }
            })()}
            </button>
            </section>
        );
    }

    funzione() {
        this.props.hide_show();
    }

    showMore() {
        this.setState({
            more: !this.state.more,
        });
    }

}

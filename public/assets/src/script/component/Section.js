import React from 'react';

export default class Section extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            content: this.props.content.split(" "),
            more: false,
            style: { backgroundImage: 'url(' + this.props.media_medium_large + ')' }
        };
        this.showMore = this.showMore.bind(this);
    }
    render() {
        return (
            <section>
                <div className="text-card">
                    <h3>
                        <a href={this.props.link}>{this.props.title}</a>
                    </h3>
                    <p>{ !this.state.more ?
                        this.state.content.slice(0, 40).join(" ") :
                        this.state.content.slice(0, 100).join(" ")}</p>
                    <a className="altro" onClick={this.showMore}>{!this.state.more ? 'Altro' : 'Chiudi'}</a>
                </div>
                <div className="img-post"
                    style={this.state.style}
                    data-image-url={this.props.media_full}
                    // onClick={this.props.media
                    // ? this.props.hide_show
                    // : log}
                    >
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

    componentWillReceiveProps (nextProps) {
        this.setState({
            style: { backgroundImage: 'url(' + nextProps.media_medium_large + ')' }
        });
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

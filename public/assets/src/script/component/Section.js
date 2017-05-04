import React from 'react';
import ReactHtmlParser from 'react-html-parser';

export default class Section extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            style: { backgroundImage: 'url(' + this.props.media_medium_large + ')' },
            content: this.props.content.split(" "),
            more: false,
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
                    { ReactHtmlParser(
                        !this.state.more ?
                        this.state.content.slice(0, 40).join(" ") :
                        this.state.content.slice(0, 100).join(" ")
                    )}
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
                <button className="comments-button" onClick={this.props.switch_footer}>
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

    /* SHOW MORE OR LESS TEXT IN THE EXCERPT*/
    showMore() {
        this.setState({
            more: !this.state.more,
        });
    }

    // funzione() {
    //     this.props.hide_show();
    // }


}

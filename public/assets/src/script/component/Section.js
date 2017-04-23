import React from 'react';

export default class Section extends React.Component {
    render() {
        return (
            <section>
                <div className="tex-card">
                    <h3>
                        <a href={this.props.link}>{this.props.title}</a>
                    </h3>
                    {this.props.content}
                </div>
                <div
                    className="img-post"
                    style={this.props.style}
                    data-image-url={this.props.sourceLarge}
                    onClick={this.props.media
                        ? this.props.hide_show
                        : log}>

                    <div className="title-article-post">
                        <div className="cicle-color-category-post"></div>
                    </div>
                </div>
            </section>
        );
    }

    funzione () {
        this.props.hide_show();
    }
}

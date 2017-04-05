import React from 'react';

export default class Section extends React.Component {
    render() {
        return (
            <section>
                <div className="content-article-post">
                    <div
                        className={this.props.media ? "img-post loppure_image" : "img-post"}
                        style={this.props.style}
                        data-image-url={this.props.sourceLarge}
                        onClick={this.props.media
                            ? this.props.hide_show
                            : null}>

                    </div>

                    <div className="title-article-post">
                        <div className="cicle-color-category-post"></div>
                        <h3>
                            <a href={this.props.link}>{this.props.title}</a>
                        </h3>
                    </div>
                </div>
            </section>
        );
    }

    funzione () {
        this.props.hide_show();
    }
}

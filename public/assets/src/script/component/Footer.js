import React from 'react';
import Collapse from 'react-collapse';
import Comment from './Comment';
import Respond from './Respond';

export default class Footer extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            showResults_Comment: (this.props.comments_number == 0) ? -1 : null,
            open: false,
        };
        this.open_close_comments_wrapper = this.open_close_comments_wrapper.bind(this);
        this.open_close_respond = this.open_close_respond.bind(this);
    }

    render() {
        return(
            <footer>
                <button className="button-like-post" onClick={this.props.sendLike} data-love="0">{this.props.like + " ♥"}</button>
                    <button className="comments-button" onClick={this.open_close_comments_wrapper}>
                    {(() => {
                        switch (this.props.comments_number) {
                        case 0:     return "Commenta";
                        case 1:     return this.props.comments_number + " commento";
                        default:    return this.props.comments_number + " commenti";
                    }
                })()}
                </button>
                <Collapse isOpened={this.state.open} className="comments-wrapper">
                    {this.props.comments.map((comment, index) => (
                        <Comment isOpened={this.state.open} className="comments-wrapper"
                            id = {this.props.id}
                            key = {index}
                            chiave = {index}
                            comment_author_name = {comment.author_name}
                            comment_content = {comment.comment_content}
                            comment_id = {comment.comment_id}
                            showResults_Comment = {this.state.showResults_Comment}
                            open_close_respond = {this.open_close_respond}/>
                    ))}
                    {
                        ((this.props.comments_number != 0 && this.state.open == true)
                        ? <button className="comments-button" onClick={this.open_close_respond.bind(null,-1, this.state.showResults_Comment)}>Commenta</button>
                        : null)
                    }
                    { (this.state.showResults_Comment == -1)
                        ? <Respond comment_id = {this.props.id}
                                   comment_parent = "0" />
                        : null }
                </Collapse>
            </footer>
        );
    }

    componentWillReceiveProps (nextProps) {
        this.setState({
            showResults_Comment: ((nextProps.comments_number == 0) ? -1 : null),
        });
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

    open_close_respond(i, j) {
        if (i == j) {
            this.setState({
                showResults_Comment: null,
            });
        } else {
            this.setState({
                showResults_Comment: i,
            });
        }
    }
}

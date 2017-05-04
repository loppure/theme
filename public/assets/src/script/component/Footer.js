import React from 'react';
import Collapse from 'react-collapse';
import Comment from './Comment';
import Respond from './Respond';

export default class Footer extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            showResults_Comment: (this.props.comments_number == 0) ? -1 : null,
        };
        this.open_close_respond = this.open_close_respond.bind(this);
    }

    render() {
        return(
            <footer>
                <Collapse isOpened={this.props.open_footer} className="comments-wrapper">
                    <button className={"close_comments"} onClick={this.props.switch_footer}></button>
                    {this.props.comments.map( (comment, index) => (
                        <Comment
                            key = {index}
                            chiave = {index}
                            id = {comment.card_id}
                            comment_id = {comment.id}
                            comment_author_name = {comment.author_name}
                            comment_content = {comment.content.rendered}

                            showResults_Comment = {this.state.showResults_Comment}
                            open_close_respond = {this.open_close_respond}/>
                    ))}
                    {
                        ((this.props.comments_number != 0 && this.props.open_footer == true)
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

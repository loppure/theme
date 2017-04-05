import React from 'react';

import {URL} from "../scripts/config.js"

export default class Respond extends React.Component {
    constructor(props){
        super(props);
        this.state = {value: ''};
        this.onSubmit = this.onSubmit.bind(this);
    }
    render() {
        return (
            <div className="respond">
                <form
                    onSubmit={this.onSubmit}
                    action={URL.comments_post()}
                    method="post"
                    data-id= {this.props.comment_id}
                    className="comment-form"
                    data-selector="form">
                    {window.logged ?
                        null : <p className="comment-form-author">
                        <input type="text" name="author" className="op-input" placeholder="Nome" size="22" aria-required="true" required=""/>
                        </p>
                    }
                    {window.logged ?
                        null : <p className="comment-form-email">
                        <input type="email" name="email" className="op-input" placeholder="Email" size="22" aria-required="true" required=""/>
                        </p>
                    }
                    <p className="comment-form-comment">
                        <textarea name="comment" tabIndex="4" className="op-input" aria-required="true" required="" defaultValue="" />
                    </p>
                    {window.logged ?
                        null : <p className="comment-notes">
                        Nel rispetto della privacy non rendermo pubblica la tua mail. </p>
                    }
                    <p className="form-submit">
                        <input name="submit" type="submit" className="submit" value="Commenta"/>
                    </p>
                    <input type="hidden" name="comment_post_ID" value={this.props.comment_id} className="comment_post_ID"/>
                    <input type="hidden" name="comment_parent" className="comment_parent" value={this.props.comment_parent} />

                </form>
            </div>
        );
    }

    onSubmit(event) {

        event.preventDefault();

        var XHR = new XMLHttpRequest();

        // We bind the FormData object and the form element
        var FD  = new FormData(event.target);
        console.log("pare la chiamata ai commetni")
        // We define what will happen if the data are successfully sent
        XHR.addEventListener("load", function(event) {
            console.log("mostrare il messaggio di riuscita dell'invio dei commenti" + event)
            // ------------------modificare la textarea in modo che visualizzi un messaggio di RIUSCITA ----------------
        });

        // We define what will happen in case of error
        XHR.addEventListener("error", function(event) {
            console.log("mostrare il messaggio di errore per l'invio dei commenti" + event)
            // ------------------modificare la textarea in modo che visualizzi un messaggio di ERRORE ----------------
        });

        // We setup our request
        XHR.open("POST", URL.comments_post());

        // The data sent are the one the user provide in the form
        XHR.send(FD);
    }
}

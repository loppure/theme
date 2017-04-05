import React from 'react';

import {URL} from '../scripts/config.js'

export default class Header_Categories extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return(
                <li>
                    <a href={(URL.category(this.props.category))}
                       rel="category tag">
                        {this.props.category}
                    </a>
                </li>
        );
    }
}

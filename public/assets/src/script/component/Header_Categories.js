import React from 'react';

import {URL} from '../scripts/config.js'

export default class Header_Categories extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return(
                <li>
                    <a href={(URL.base + "rubriche/" + this.props.category.slug)}
                       rel="category tag">
                        {this.props.category.name}
                    </a>
                </li>
        );
    }
}

import React from 'react';
import moment from 'moment';
import 'moment/locale/it';
import Header_Categories from './Header_Categories';

export default class Header extends React.Component {
    render() {
        return (
            <header>
                <span className="img-category-post"></span>
                <ul className="post-categories">
                    <li>
                        <a href={this.props.category_link}
                            rel="category tag">
                            {this.props.category_name}
                        </a>
                    </li>
                </ul>
                    <span className="text-name-citta">{this.props.city_name}</span>
            </header>
        );
    }
}

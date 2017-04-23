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
                {this.props.categories.map((category, index) => (
                    <Header_Categories key={index}
                    category={category}
                    />
                ))}
                </ul>
                    <span className="text-name-città">{this.converDate()}</span>
            </header>
        );
    }

    converDate() {
        moment.locale('it');
        return moment(this.props.date).format('LL');
    }

}

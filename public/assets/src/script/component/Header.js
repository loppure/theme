import React from 'react';
import moment from 'moment';
import 'moment/locale/it';
import Header_Categories from './Header_Categories';

export default class Header extends React.Component {
    render() {
        return (
            <header>
                <div className="img-category-post"></div>
                <div className="img-article-post"></div>
                <div className="text-header-post">
                <ul className="post-categories">
                {this.props.categories.map((category, index) => (
                    <Header_Categories key={index}
                    category={category}
                    />
                ))}
                </ul>
                    <span className="date-post">{this.converDate()}</span>
                </div>
            </header>
        );
    }

    converDate() {
        moment.locale('it');
        return moment(this.props.date).format('LL');
    }

}

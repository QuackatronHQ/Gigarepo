import { Component } from "react";
import propTypes from 'prop-types'

class Header extends Component {
  render() {
    <div class={this.props.class_name}>Header Component is {this.props.title}</div>;
  }
}

Header.propTypes = {
  title: propTypes.string.isRequired
};

export default Header;

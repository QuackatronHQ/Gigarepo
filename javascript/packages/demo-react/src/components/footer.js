import { Component } from "react";
import propTypes from 'prop-types'

class Footer extends Component {
  render() {
    <div class={this.props.class_name}>Footer Component is {this.props.title}</div>;
  }
}

Footer.propTypes = {
  title: propTypes.string.isRequired
};

export default Footer;

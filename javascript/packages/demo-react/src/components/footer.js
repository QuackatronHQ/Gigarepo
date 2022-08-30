import { Component } from "react";
import propTypes from "prop-types";

class Footer extends Component {
  render() {
    <>
      <div class={this.props.class_name}>{this.props.text}</div>
    </>;
  }
}

Footer.propTypes = {
  text: propTypes.string.isRequired,
};

export default Footer;

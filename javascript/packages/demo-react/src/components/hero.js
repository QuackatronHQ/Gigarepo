import { Component } from "react";
import propTypes from 'prop-types'

class Hero extends Component {
  render() {
    <div class={this.props.class_name}>Welcome to {this.props.title} Hero Component</div>;
  }
}

Hero.propTypes = {
  title: propTypes.string.isRequired
};

export default Hero;

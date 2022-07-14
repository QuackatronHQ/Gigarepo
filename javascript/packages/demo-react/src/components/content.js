import React from "react";
import propTypes from 'prop-types'

class Content extends React.Component {
  handleClick(){
    console.log('We must not use bind in JSX props')
  }

  render() {
    <div onClick={() => this.handleClick.bind(this)} class={this.props.class_name}>{this.props.title}</div>;
  }
}

Content.propTypes = {
  title: propTypes.string.isRequired
};

export default Content;

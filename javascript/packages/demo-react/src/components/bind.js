import React from "react";
import propTypes from "prop-types";

class TestingComponent extends React.Component {
  handleClick() {
    console.log("TestingComponent was clicked");
  }

  render() {
    <div
      onClick={() => this.handleClick.bind(this)}
      class={this.props.class_name}
    >
      Welcome to {this.props.title} TestingComponent Component
    </div>;
  }
}

TestingComponent.propTypes = {
  title: propTypes.string.isRequired,
};

export default TestingComponent;

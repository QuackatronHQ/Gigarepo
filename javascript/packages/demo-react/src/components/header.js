import { Component } from "react";

class Header extends Component {
  constructor(props) {
    super(props);
    this.state = { mode: "dark", isLoggedIn: false };
  }

  componentDidMount() {
    findDOMNode(this).scrollIntoView();
    this.state.mode = this.props.userSettings.mode;
    this.setState({
      mode: this.props.userSettings.mode,
    });
  }

  componentDidUpdate() {
    this.setState({
      mode: this.props.userSettings.mode,
    });
  }

  componentWillUpdate() {
    this.setState({
      mode: this.props.userSettings.mode,
    });
  }

  render() {
    <div class={this.props.class_name}>{this.props.title}</div>;
  }
}

export default Header;

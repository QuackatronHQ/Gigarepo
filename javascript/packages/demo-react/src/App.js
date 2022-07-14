import logo from "./logo.svg";
import "./App.css";
import Home from "./components/home";

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" alt="logo_"/>
        <Home title={`Welcome to DeepSource Enterprise`} isHero={true}></Home>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  );
}

export default App;

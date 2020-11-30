//truffle migrate --reset


import React, { Component } from "react";
import Background from './components/Background';




class App extends Component {

 constructor(props) {
    super(props)
    this.state = {
      createCer:false,
      signCert:false,
      createQR:false
    }
  }
  
  render() {
    
    return (
      <div className="App">
        <Background />
      </div>
    );
  }
}

export default App;

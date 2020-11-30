import React from 'react';
import { render} from 'react-dom';
 
var Table = React.createClass({
  getInitialState(){
      return {def: defvar} 
  },
  render: function () {
    return <div>FUNCIONA</div>;
  }
});
render(<Table/>, document.getElementById('root'));
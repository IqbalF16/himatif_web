import React from 'react';
import ReactDOM from 'react-dom';

// class OnOff extends React.Component {
//     constructor(){
//            super();
  
//            this.state = {
//                 black: true
//            }
//       }
  
//       changeColor(){
//           this.setState({black: !this.state.black})
//       }
  
//       render(){
//           let btn_class = this.state.black ? "blackButton" : "whiteButton";
  
//           return (
//                <div>
//                    <button className={btn_class}
//                            onClick={this.changeColor.bind(this)}>
//                              Button
//                     </button>
//                </div>
//           )
//       }
//   }

function tick() {
    const element = (
      <div>
        <h1>Hello, world!</h1>
        <h2>It is {new Date().toLocaleTimeString()}.</h2>
      </div>
    );
    ReactDOM.render(element, document.getElementById('root'));
  }
  
//   ReactDOM.render(<OnOff />, document.querySelector("OnOff"))
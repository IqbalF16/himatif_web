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

 class OnOff extends React.Component {
    render() {
       return (
          <div>
             <h1>Header</h1>
          </div>
       );
    }
 }

 ReactDOM.render(<OnOff/>, document.getElementById('root'));


//   ReactDOM.render(<OnOff />, document.querySelector("OnOff"))

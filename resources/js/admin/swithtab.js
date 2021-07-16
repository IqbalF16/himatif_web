// import React from 'react';
// import ReactDOM from 'react-dom';

// function switchtab() {
//     // return (
//     //     <div className="container">
//     //         <div className="row justify-content-center">
//     //             <div className="col-md-8">
//     //                 <div className="card">
//     //                     <div className="card-header">switchtab Component</div>

//     //                     <div className="card-body">I'm an switchtab component!</div>
//     //                 </div>
//     //             </div>
//     //         </div>
//     //     </div>
//     // );

//     addClass(e) {
//         e.target.classList.add('yourclass');
//     }
//     removeClass(e){
//         e.target.classList.remove('yourclass');
//     }

//     return
// }

// export default switchtab;

// if (document.getElementById('switchtab')) {
//     ReactDOM.render(<switchtab />, document.getElementById('switchtab'));
// }
$(document).ready(function(){
    $('#showwrite').on('click', function (event) {
        event.preventDefault();
        $('#write').show();
        $('#preview').hide();
    });
    $('#showpreview').on('click', function (event) {
        event.preventDefault();
        $('#write').hide();
        $('#preview').show();
    });
});

import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route } from 'react-router-dom';

import Header from  './components/Header';
import Main from  './components/Main';

// import Navbar from './components/Navs';

//
// // import './index.css';
//
// ReactDOM.render(
//     <Navbar />,
//     document.getElementById('root')
// );


const App = () => (
    <div>
        <Header />
        <Main />
    </div>
);

ReactDOM.render((
    <BrowserRouter>
        <App />
    </BrowserRouter>
), document.getElementById('root'))

//<Route path='/contact' component={Contact} />


// import {createStore, applyMiddleware} from 'redux';
// import thunk from 'redux-thunk';
// import {composeWithDevTools} from 'redux-devtools-extension';
// import {Provider} from 'react-redux';
//
// import reducers from 'reducers';
// import Layout from 'containers/layout'
// import Users from 'containers/users'
//
// const store = createStore(reducers, composeWithDevTools(
//     applyMiddleware(thunk)
// ));
//
// ReactDOM.render((
//     <Provider store={store}>
//         <BrowserRouter>
//             <div>
//                 <Route component={Layout}>
//                     <Route path='/users' component={Users}/>
//                 </Route>
//             </div>
//         </BrowserRouter>
//     </Provider>
// ), document.getElementById('root'));



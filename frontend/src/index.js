import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux'
import { BrowserRouter as Router, Route } from 'react-router-dom'

import './index.css';
import './font-config.css';
import '@fortawesome/fontawesome-free/css/fontawesome.css'
import '@fortawesome/fontawesome-free/css/solid.css'
import '@fortawesome/fontawesome-free/css/regular.css'
import '@fortawesome/fontawesome-free/css/brands.css'

import App from 'components/App';
import * as serviceWorker from './serviceWorker';

import { createStore } from 'redux'
import rootReducer from './reducers'

export const store = createStore(rootReducer)

ReactDOM.render(
  <Provider store={store}>
    <Router>
      <Route path={""} component={App}/>
    </Router>
  </Provider>,
  document.getElementById('root')
);

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.unregister();

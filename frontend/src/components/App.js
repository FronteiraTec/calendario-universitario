import React, { Component } from 'react';

import './App.css';
import AppHader from './AppHeader'

import Event from '../containers/Event'

class App extends Component {
  render() {
    return (
      <div className="App">
        <AppHader/>
        <Event/>
      </div>
    )
  }
}

export default App;

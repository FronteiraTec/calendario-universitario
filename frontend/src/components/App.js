import React, { Component } from 'react';

import AppHeader from './AppHeader'

import Event from '../containers/Event'

class App extends Component {
  render() {
    return (
      <div className="App">
        <AppHeader/>
        <Event/>
      </div>
    )
  }
}

export default App;

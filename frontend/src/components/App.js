import React, { Component } from 'react';
import './App.css';

import MealList from '../containers/MealList'

class App extends Component {
  render() {
    return (
      <div className="App">
        <MealList/>
      </div>
    )
  }
}

export default App;

import React, { Component } from 'react';

import './App.css';
import AppHader from './AppHeader'

import MealList from '../containers/MealList'

class App extends Component {
  render() {
    return (
      <div className="App">
        <AppHader/>
        <MealList/>
      </div>
    )
  }
}

export default App;

import React, { Component } from 'react';
import MealItem from "./MealItem"
import './App.css';

class App extends Component {
  render() {
    return (
      <div className="App">
        <ul class="MealList">
          <li>
            <MealItem day={10}/>
          </li>
          <li>
            <MealItem day={12}/>
          </li>
        </ul>
      </div>
    );
  }
}

export default App;

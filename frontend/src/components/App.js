import React, { Component } from 'react';
import { Switch, Route } from 'react-router-dom'

// import Router from '../router'

import './App.css'

import AppHeader from './AppHeader'
import AppMenu from './AppMenu'

import Calendar from 'pages/Calendar'
import About from 'pages/About'

class App extends Component {
  constructor () {
    super()
    this.state = {
      isMenuOpened: false
    }
  }

  openMenu () {
    this.setState({
      ...this.state,
      isMenuOpened: true
    })
  }

  closeMenu () {
    this.setState({
      ...this.state,
      isMenuOpened: false
    })
  }

  render() {
    return (
      <div className="App">
        <AppMenu
          isOpened={this.state.isMenuOpened}
          handleCloseMenu={() => this.closeMenu()}
        />
        <AppHeader
          handleMenuClick={() => this.openMenu()}
        />
        <Switch>
          <Route path={"/sobre"} component={About}/>
          <Route path={"/"} component={Calendar}/>
        </Switch>
      </div>
    )
  }
}

export default App;

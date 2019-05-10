import React, { Component } from 'react';

import './App.css'

import AppHeader from './AppHeader'
import AppMenu from './AppMenu'

import Event from '../containers/Event'

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
        <Event/>
      </div>
    )
  }
}

export default App;

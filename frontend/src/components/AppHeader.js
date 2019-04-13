import React, { Component } from 'react'

import './AppHeader.css'

class AppHeader extends Component {
  render () {
    return (
      <header className="AppHeader">
        <button className="AppHeader__menu-button">
          <i className="fa fa-bars"></i>
        </button>
        <h1 className="AppHeader__app-name">Calendário UFFS</h1>
      </header>
    )
  }
}

export default AppHeader
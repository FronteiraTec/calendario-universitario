import React, { Component } from 'react'

import './AppHeader.css'

class AppHeader extends Component {
  render () {
    return (
      <div>
        <div className="AppHeader-offsize"></div>
        <header className="AppHeader">
          <button className="AppHeader__menu-button">
            <i className="fa fa-bars"></i>
          </button>
          <h1 className="AppHeader__app-name">Calendário UFFS</h1>
        </header>
      </div>
    )
  }
}

export default AppHeader
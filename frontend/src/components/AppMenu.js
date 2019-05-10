import React from 'react'

import './AppMenu.css'

const AppMenu = (props) => (
  <div className={`AppMenu ${props.isOpened ? 'AppMenu--opened' : ''}`}>
    <div
      className="AppMenu__cover"
      onClick={() => props.handleCloseMenu()}
    ></div>
    <div className="AppMenu__content">
      <h3>Calendário UFFS</h3>
      <nav className="AppMenu__list">
        <a className="AppMenu__item">
          <i className="AppMenu__icon fa fa-calendar-alt"></i>
          Calendário
        </a>
        <a className="AppMenu__item">
          <i className="AppMenu__icon fa fa-info"></i>
          Sobre
        </a>
      </nav>
    </div>
  </div>
)

export default AppMenu
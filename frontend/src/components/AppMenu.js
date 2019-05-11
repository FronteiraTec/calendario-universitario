import React from 'react'
import Swipe from 'react-easy-swipe'

import './AppMenu.css'

const handleSwipeMove = handler => event => {
  if (event.x < -70) {
    handler()
  }
}

const AppMenu = (props) => (
  <div className={`AppMenu ${props.isOpened ? 'AppMenu--opened' : ''}`}>
    <div
      className="AppMenu__cover"
      onClick={() => props.handleCloseMenu()}
    ></div>
    <Swipe
      onSwipeMove={handleSwipeMove(props.handleCloseMenu)}
    >
      <div className="AppMenu__content">
        <h3 className="AppMenu__title">Calendário UFFS</h3>
        <nav className="AppMenu__list">
          <span className="AppMenu__item AppMenu__item--active">
            <i className="AppMenu__icon fa fa-calendar-alt"></i>
            Calendário
          </span>
          <span className="AppMenu__item">
            <i className="AppMenu__icon fa fa-info"></i>
            Sobre
          </span>
        </nav>
      </div>
    </Swipe>
  </div>
)

export default AppMenu
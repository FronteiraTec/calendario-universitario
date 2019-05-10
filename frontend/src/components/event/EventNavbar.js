import React from 'react';

import './EventNavbar.css'

import { nextMonth, prevMonth } from "../../actions/event";

const getMonthName = month => {
  const monthNames = [
    'Janeiro', 
    'Feveireiro',
    'Março',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
  ]
  return monthNames[month] || 'NotAMonth'
}

const EventNavbar = props => (
  <div className="EventNavbar">
    <div className="EventNavbar__controls">
      <button onClick={() => {prevMonth({month : props.month, year: props.year})}} className="EventNavbar__buttons">
        <i className="fas fa-angle-left"></i>
      </button>
    </div>
    <div className="EventNavbar__label">{getMonthName(props.month)}</div>
    <div className="EventNavbar__controls">
      <button onClick={() => {nextMonth({month : props.month, year: props.year})}} className="EventNavbar__buttons">
        <i className="fas fa-angle-right"></i>
      </button>
    </div>
    <div className={`EventNavbar__loading ${
      props.isLoading ? 'EventNavbar__loading--active' : ""
    }`}></div>
  </div>
)

export default EventNavbar
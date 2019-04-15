import React from 'react'
import "./EventItem.css"

import sanitalize from 'sanitize-html'
import { store } from '../index'

import { toggleOpened } from '../actions/event' 

const getWeekDay = (dateProp, complete = false) => {
  const date = new Date(dateProp)
  const weekNumberDay = date.getDay()
  const daysConfig = [
    {short: 'Dom', long: 'Domingo'},
    {short: 'Seg', long: 'Segunda'},
    {short: 'Ter', long: 'Terça'},
    {short: 'Qua', long: 'Quarta'},
    {short: 'Qui', long: 'Quinta'},
    {short: 'Sex', long: 'Sexta'},
    {short: 'Sab', long: 'Sabádo'},
  ]
  return daysConfig[weekNumberDay][complete ? 'long' : 'short']
}

const handleClick = index => {
  store.dispatch(toggleOpened(index))
}

const getDateNumber = dateProp => {
  const date = new Date(dateProp)
  return date.getDate()
}

const formatNameByTime = (name, scheduledDay, type) => {
  if (type === "event") return name
  return `Cardário RU de ${getWeekDay(scheduledDay, true)}`
}

const formatDescription = description => {
  return sanitalize(description.replace(/\n/g, "<br>"))
}

const EventInfo = (props) => {
  return props.isOpened && (
    <div className="EventItem__info">
    <div className="EventItem__attributes">
      {
        props.place && <div><strong>Local:</strong> {props.place}</div>
      }
      {
        props.scheduledTime && <div><strong>Horário:</strong> {props.scheduledTime}</div>
      }
    </div>
    <div className="EventItem__description"
      dangerouslySetInnerHTML={{
        __html: sanitalize(formatDescription(props.description))
      }}>
    </div>
  </div>
  )
}

const EventItem = (props) => {
  return (
    <div className={`EventItem EventItem--${props.type}`} onClick={() => handleClick(props.index)}>
      <div className="EventItem__card">
        <div className="EventItem__day">
          <div className="EventItem__week-day">
            { getWeekDay(props.scheduledDay) }
          </div>
          <div className="EventItem__day-number">
            { getDateNumber(props.scheduledDay) }
          </div>
        </div>
        <div className="EventItem__name">
          { formatNameByTime(props.name, props.scheduledDay, props.type) }
        </div>
      </div>
      { EventInfo(props) }
    </div>
  )
}

export default EventItem
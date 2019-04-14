import React from 'react'
import "./EventItem.css"

import sanitalize from 'sanitize-html'

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
  console.log(date)
  return daysConfig[weekNumberDay][complete ? 'long' : 'short']
}

const getDateNumber = dateProp => {
  const date = new Date(dateProp)
  return date.getDay()
}

const formatNameByTime = (name, scheduledDay, type) => {
  if (type == "event") return name
  return `Cardário RU de ${getWeekDay(scheduledDay, true)}`
}

const formatDescription = description => {
  return sanitalize(description.replace(/\n/g, "<br>"))
}

const EventItem = (props) => {
  return (
    <div className={`EventItem EventItem--${props.type}`}>
      <div className="EventItem__day">
        <div className="EventItem__week-day">
          { getWeekDay(props.scheduledDay) }
        </div>
        <div className="EventItem__day-number">
          { getDateNumber(props.scheduledDay) }
        </div>
      </div>
      <div className="EventItem__description">
        { formatNameByTime(props.name, props.scheduledDay, props.type) }
      </div>
      {/* <div className="EventItem__description"
        dangerouslySetInnerHTML={{
          __html: sanitalize(formatDescription(props.description))
        }}>
      </div> */}
    </div>
  )
}

export default EventItem
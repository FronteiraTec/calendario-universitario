import React from 'react'
import "./EventItem.css"

import sanitalize from 'sanitize-html'

const getWeekDay = dateProp => {
  const date = new Date(dateProp)
  switch (date.getDay()) {
    case 0:
      return 'Dom'
    case 1:
      return 'Seg'
    case 2:
      return 'Ter'
    case 3:
      return 'Qua'
    case 4:
      return 'Qui'
    case 5:
      return 'Sex'
    case 6:
      return 'Sab'
    default:
      return 'NaN'
  }
}

const getDateNumber = dateProp => {
  const date = new Date(dateProp)
  return date.getDay()
}

const formatDescription = description => {
  return sanitalize(description.replace(/\n/g, "<br>"))
}

const EventItem = (props) => {
  return (
    <div className="EventItem">
      <div className="EventItem__day">
        <div className="EventItem__week-day">
          { getWeekDay(props.scheduledDay) }
        </div>
        <div className="EventItem__day-number">
          { getDateNumber(props.scheduledDay) }
        </div>
      </div>
      <div className="EventItem__description"
        dangerouslySetInnerHTML={{
          __html: sanitalize(formatDescription(props.description))
        }}>
      </div>
    </div>
  )
}

export default EventItem
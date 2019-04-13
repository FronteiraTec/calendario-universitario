import React from 'react'
import "./MealItem.css"

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
  }
}

const getDateNumber = dateProp => {
  const date = new Date(dateProp)
  return date.getDay()
}

const formatDescription = description => {
  return sanitalize(description.replace(/\n/g, "<br>"))
}

const MealItem = (props) => {
  return (
    <div className="MealItem">
      <div className="MealItem__day">
        <div className="MealItem__week-day">
          { getWeekDay(props.day) }
        </div>
        <div className="MealItem__day-number">
          { getDateNumber(props.day) }
        </div>
      </div>
      <div className="MealItem__description"
        dangerouslySetInnerHTML={{
          __html: sanitalize(formatDescription(props.description))
        }}>
      </div>
    </div>
  )
}

export default MealItem
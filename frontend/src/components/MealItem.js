import React from 'react'
import "./MealItem.css"

export default (props) => {
  return (
    <div className="MealItem">
      <div className="MealItem__day">
        <div className="MealItem__week-day">
          Qua
        </div>
        <div className="MealItem__day-number">
          { (props.day || '- - - ').split("-")[2].split(' ')[0] }
        </div>
      </div>
      <div className="MealItem__description">
        { props.description }
      </div>
    </div>
  )
}
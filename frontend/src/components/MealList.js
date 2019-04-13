import React from 'react'
import MealItem from './MealItem'

const MealList = ({meals}) => {
  return (
    <ul className="MealList">
      { meals.map((item, index) => (
        <li key={index}>
          <MealItem day={item.day} description={item.description}/>
        </li>
      )) }
    </ul>
  )
}

export default MealList
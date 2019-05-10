import React from 'react'
import EventItem from './EventItem'

import './EventList.css'

const EventList = ({events}) => {
  return (
    <ul className="EventList">
      { events.map((item, index) => (
        <li key={index}>
          <EventItem
            index={index}
            type={item.type}
            name={item.name}
            description={item.description}
            place={item.place}
            scheduledDay={item.scheduledDay}
            scheduledTime={item.scheduledTime}
            isOpened={item.isOpened}
          />
        </li>
      )) }
    </ul>
  )
}

export default EventList
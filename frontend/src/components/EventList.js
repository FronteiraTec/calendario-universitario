import React from 'react'
import EventItem from './EventItem'

const EventList = ({events}) => {
  return (
    <ul className="EventList">
      { events.map((item, index) => (
        <li key={index}>
          <EventItem
            scheduledDay={item.scheduledDay}
            description={item.description}
          />
        </li>
      )) }
    </ul>
  )
}

export default EventList
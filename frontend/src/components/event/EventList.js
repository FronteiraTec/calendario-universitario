import React from 'react'
import EventItem from './EventItem'

import './EventList.css'

import Alert from 'components/ui/Alert'
import LoadingCircle from 'components/ui/LoadingCircle'

const renderList = (events) => (
  <ul className="EventList__list">
    { events.map((item, index) => (
      <li key={index} className="EventList__item">
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

const warningNoEvent = (
  <Alert
    title="Nenhum evento cadastrado"
    icon="far fa-grimace"
    color="blue"
  />
)

const EventList = props => (
  <div className="EventList">
    {props.events.length == 0 && props.isLoading
      ? <div class="EventList__loading">
          <LoadingCircle/>
        </div>
      : props.events.length > 0
        ? renderList(props.events)
        : warningNoEvent
    }
  </div>
)

export default EventList
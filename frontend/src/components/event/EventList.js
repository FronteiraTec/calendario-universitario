import React from 'react'
import Swipe from 'react-easy-swipe'

import './EventList.css'

import { nextMonth, prevMonth } from "../../actions/event";

import EventItem from './EventItem'

import Alert from 'components/ui/Alert'
import LoadingCircle from 'components/ui/LoadingCircle'

const handleSwipeMove = ({month, year}) => event => {
  const swipeRange = 100
  if (event.x < swipeRange * -1) {
    nextMonth({month, year})
  } else if(event.x > swipeRange) {
    prevMonth({month, year})
  }
}

const renderList = events => (
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

const WarningNoEvent = () => (
  <Alert
    title="Nenhum evento cadastrado"
    icon="far fa-grimace"
    color="blue"
    align="center"
  />
)

const EventList = props => (
  <Swipe
    onSwipeMove={handleSwipeMove({month: props.month, year: props.year})}
  >
    <div className="EventList">
      {props.events.length === 0 && props.isLoading
        ? <div className="EventList__loading">
            <LoadingCircle/>
          </div>
        : props.events.length > 0
          ? renderList(props.events)
          : <WarningNoEvent/>
      }
    </div>
  </Swipe>
)

export default EventList
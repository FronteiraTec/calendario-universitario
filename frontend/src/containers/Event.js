import React, { Component } from 'react';
import { connect } from 'react-redux'

import { fetchEvents } from '../actions/event'

import EventList from '../components/EventList'
import EventNavbar from '../components/EventNavbar'

class EventListContainer extends Component {
  componentDidMount () {
    fetchEvents()
  }

  render () {
    return (
      <div>
        <EventNavbar month={this.props.actualMonth}/>
        <EventList events={this.props.events} />
      </div>
    )
  }
}

const mapStateToProps = state => {
  return {
    actualMonth: state.event.actualMonth,
    events: state.event.events
  }
}

const container = connect(
  mapStateToProps
)(EventListContainer)

export default container
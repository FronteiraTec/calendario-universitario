import React, { Component } from 'react';
import { connect } from 'react-redux'

import { fetchEvents } from '../actions/event'

import EventList from '../components/EventList'

class EventListContainer extends Component {
  componentDidMount () {
    const { dispatch } = this.props
    fetchEvents()(dispatch)
  }

  render () {
    return (
      <EventList events={this.props.events} />
    )
  }
}

const mapStateToProps = state => {
  return {events: state.event.events}
}

const container = connect(
  mapStateToProps
)(EventListContainer)

export default container
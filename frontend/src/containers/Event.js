import React, { Component } from 'react';
import { connect } from 'react-redux'

import { fetchEvents } from '../actions/event'

import EventList from '../components/event/EventList'
import EventNavbar from '../components/event/EventNavbar'

class EventListContainer extends Component {
  componentDidMount () {
    fetchEvents()
  }

  render () {
    return (
      <div>
        <EventNavbar
          month={this.props.filter.month}
          year={this.props.filter.year}
          isLoading={this.props.isFetching}
        />
        <EventList
          month={this.props.filter.month}
          year={this.props.filter.year}
          events={this.props.events}
          isLoading={this.props.isFetching}
        />
      </div>
    )
  }
}

const mapStateToProps = state => {
  return {
    filter: state.event.filter,
    events: state.event.events,
    isFetching: state.event.isFetching
  }
}

const container = connect(
  mapStateToProps
)(EventListContainer)

export default container
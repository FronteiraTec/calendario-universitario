import { store } from "../index";
import config from "config"

export const RECEIVE_EVENTS = 'RECEIVE_EVENTS'
export const receiveEvents = (events) => ({
  type: RECEIVE_EVENTS,
  events
});

export const TOGGLE_OPENED = 'TOGGLE_OPENED'
export const toggleOpened = index => ({
  type: TOGGLE_OPENED,
  index
})

export const UPDATE_FILTER = 'UPDATE_FILTER'
export const updateFilter = ({filter, events}) => ({
  type: UPDATE_FILTER,
  filter,
  events
})

export const SET_FETCHING = 'SET_FETCHING'
export const setFetching = isFetching => ({
  type: SET_FETCHING,
  isFetching
})

const date = new Date()
const actualMonth = date.getMonth() + 1
const actualYear =  date.getFullYear()

export const fetchEvents = (month = `${actualYear}-${actualMonth}`) => {
  store.dispatch(setFetching(true))
  return fetch(`${config.API_ADDRESS}/event/month/${month}`, {
    mode: "cors",
  })
    .then(response => {
      store.dispatch(setFetching(false))
      return response.json()
    })
    .then(data => {
      store.dispatch(receiveEvents(data))
      return data
    })
}
  
export const prevMonth = (filter) => {
  const newFilter = {...filter}
  if (filter.month === 0) {
    newFilter.month = 11
    newFilter.year--
  } else {
    newFilter.month--
  }
  updateFilterAndFetch(newFilter)
}

export const nextMonth = (filter) => {
  const newFilter = {...filter}
  if (filter.month === 11) {
    newFilter.month = 0
    newFilter.year++
  } else {
    newFilter.month++
  }
  updateFilterAndFetch(newFilter)
}

export const updateFilterAndFetch = (filter) => {
  return fetchEvents(`${filter.year}-${filter.month + 1}`)
    .then(events => {
      store.dispatch(updateFilter({
        filter,
        events
      }))
      return events
    })
}
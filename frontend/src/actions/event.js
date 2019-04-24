import { store } from "../index";

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

export const UPDATE_MONTH = 'UPDATE_MONTH'
export const updateMonth = ({actualMonth, events}) => ({
  type: UPDATE_MONTH,
  actualMonth,
  events
})

const actualMonth = (new Date()).getMonth() 
export const fetchEvents = (month = actualMonth) =>
    fetch("http://localhost:8080/api/event/", {
      mode: "cors",
    })
      .then(response => {
        return response.json()
      })
      .then(data => {
        store.dispatch(receiveEvents(data))
        return data
      })

export const nextMonth = (month) => {
  console.log(month)
  updateMonthAndFetch(month + 1)
}

export const prevMonth = (month) => {
  console.log(month)
  updateMonthAndFetch(month - 1)
}

export const updateMonthAndFetch = (month) => {
  console.log(month)
  store.dispatch(receiveEvents([]))
  return fetchEvents(month)
    .then(data => {
      store.dispatch(updateMonth({
        actualMonth: month,
        events: data
      }))
      return data
    })
}
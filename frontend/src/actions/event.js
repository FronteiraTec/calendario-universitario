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

export const fetchEvents = () =>
  dispatch =>
    fetch("http://localhost:8080/api/event/", {
      mode: "cors",
    })
      .then(response => {
        return response.json()
      })
      .then(data => {
        dispatch(receiveEvents(data))
      })
      .catch((err) => console.error(err.message));
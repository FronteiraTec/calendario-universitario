import { RECEIVE_EVENTS, TOGGLE_OPENED, UPDATE_FILTER } from "../actions/event"

const month = (new Date()).getMonth()
const year = (new Date()).getFullYear()

const initialState = {
  events: [],
  filter: {
    month,
    year
  }
}

const events = (state = initialState, action) => {
  const newState = {...state};
  switch (action.type) {
    case RECEIVE_EVENTS:
      newState.events = [...action.events]
      break
    case TOGGLE_OPENED:
      newState.events = [...newState.events]
      newState.events[action.index] = {
        ...newState.events[action.index],
        isOpened: !newState.events[action.index].isOpened
      }
      break
    case UPDATE_FILTER:
      newState.events = [...action.events]
      newState.filter = {...action.filter}
      break
    default:
      return state
  }
  
  return newState
}

export default events
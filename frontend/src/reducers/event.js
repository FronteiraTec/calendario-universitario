import { RECEIVE_EVENTS, TOGGLE_OPENED, UPDATE_MONTH } from "../actions/event"

const actualMonth = (new Date()).getMonth()

const initialState = {
  events: [],
  actualMonth
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
    case UPDATE_MONTH:
      newState.events = [...action.events]
      newState.actualMonth = action.actualMonth
      break
    default:
      return state
  }
  
  return newState
}

export default events
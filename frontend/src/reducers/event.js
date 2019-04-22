import { RECEIVE_EVENTS, TOGGLE_OPENED } from "../actions/event"

const initialState = {
  events: [],
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
    default:
      return state
  }

  console.log(newState.events[action.index])
  return newState
}

export default events
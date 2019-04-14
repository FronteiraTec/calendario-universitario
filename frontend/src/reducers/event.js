import { RECEIVE_EVENTS } from "../actions/event"

const initialState = {
  events: [],
}

const events = (state = initialState, action) => {
  const newState = {...state};
  switch (action.type) {
    case RECEIVE_EVENTS:
      newState.events = [...action.events]
      break
    default:
      return state
  }

  return newState
}

export default events
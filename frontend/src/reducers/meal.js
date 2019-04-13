import { RECEIVE_MEALS } from "../actions/meal"

const initialState = {
  meals: [],
}

const meals = (state = initialState, action) => {
  const newState = {...state};
  switch (action.type) {
    case RECEIVE_MEALS:
      newState.meals = [...action.meals]
      break
    default:
      return state
  }

  return newState
}

export default meals
export const RECEIVE_MEALS = 'RECEIVE_MEALS'

export const receiveMeals = (meals) => ({
  type: RECEIVE_MEALS,
  meals
});

export const fetchMeals = () =>
  dispatch =>
    fetch("http://localhost:8080/api/meal/", {
      mode: "cors",
    })
      .then(response => {
        return response.json()
      })
      .then(data => {
        dispatch(receiveMeals(data))
      })
      .catch((err) => console.error(err.message));
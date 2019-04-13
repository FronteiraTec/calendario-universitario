import React, { Component } from 'react';
import { connect } from 'react-redux'

import { fetchMeals, receiveMeals } from '../actions/meal'

import MealList from '../components/MealList'

class MealListContainer extends Component {
  componentDidMount () {
    const { dispatch } = this.props
    fetchMeals()(dispatch)
  }

  constructor (props) {
    super()
    console.log(props)
    console.log(this.state)
  }

  render () {
    console.log(this.props);
    return (
      <MealList meals={this.props.meals} />
    )
  }
}

const mapStateToProps = state => {
  return {meals: state.meal.meals}
}

const mapDispatchToProps = dispatch => ({
  receiveMeals (id) {
    dispatch(receiveMeals(id))
  }
});

const container = connect(
  mapStateToProps
)(MealListContainer)

export default container
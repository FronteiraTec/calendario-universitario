import React, { Component } from 'react';
import { connect } from 'react-redux'

import { fetchMeals } from '../actions/meal'

import MealList from '../components/MealList'

class MealListContainer extends Component {
  componentDidMount () {
    const { dispatch } = this.props
    fetchMeals()(dispatch)
  }

  render () {
    return (
      <MealList meals={this.props.meals} />
    )
  }
}

const mapStateToProps = state => {
  return {meals: state.meal.meals}
}

const container = connect(
  mapStateToProps
)(MealListContainer)

export default container
import React from 'react'
import "./MealItem.css"

export default (props) => {
    return (
        <div class="MealItem">
            <div class="MealItem__day">
                <div class="MealItem__week-day">
                    Qua
                </div>
                <div class="MealItem__day-number">
                    { props.day }
                </div>
            </div>
            <div class="MealItem__description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus cursus tincidunt.
            </div>
        </div>
    )
}
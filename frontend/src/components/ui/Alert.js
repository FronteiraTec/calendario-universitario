import React from 'react'

import "./Alert.css"

const Alert = props => (
  <div className={`Alert ${props.color ? `Alert--${props.color}` : ''}`}>
    {props.icon ?
      <div className="Alert__icon"><i className={props.icon}></i></div>
    : ""}
    {props.title ? <h3 className="Alert__title">{props.title}</h3> : ""}
    {props.children ? <div className="Alert__description">{props.children}</div> : ""}
  </div>
)

export default Alert
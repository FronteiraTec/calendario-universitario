import React from 'react'

import "./Alert.css"

const alertClassName = props => `
  Alert
  ${props.color ? `Alert--${props.color}` : ''}
  ${props.align ? `Alert--text-${props.align}` : ''}
`

const Alert = props => (
  <div className={alertClassName(props)}>
    {props.icon ?
      <div className="Alert__icon"><i className={props.icon}></i></div>
    : ""}
    {props.title ? <h3 className="Alert__title">{props.title}</h3> : ""}
    {props.children ? <div className="Alert__description">{props.children}</div> : ""}
  </div>
)

export default Alert
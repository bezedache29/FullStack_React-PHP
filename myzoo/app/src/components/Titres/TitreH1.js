import React from 'react'
import css from './TitreH1.module.css'

const titreH1 = (props) => {
    let monCss = `border border-dark text-white rounded p-2 text-center ${props.bgColor} ${css.policeTitre}`
    return (
        <>
            <h1 className={monCss}>{props.children}</h1>
        </>
    )
}

export default titreH1
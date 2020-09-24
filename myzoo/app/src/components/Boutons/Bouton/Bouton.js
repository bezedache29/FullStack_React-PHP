import React from 'react'

const bouton = (props) => {
    let boutonColor = ""
    if(props.continent === 'Europe') {
        boutonColor = 'btn-primary'
    }else if(props.continent === 'Asie') {
        boutonColor = 'btn-danger'
    }else if(props.continent === 'Afrique') {
        boutonColor = 'btn-warning'
    }else if(props.continent === 'Océanie') {
        boutonColor = 'btn-success'
    }else if(props.continent === 'Amérique') {
        boutonColor = 'btn-info'
    }

    let monCss = `btn ${boutonColor} ${props.btnColor}`

    return (
        <>
            <button className={monCss} onClick={props.clic}>{props.children}</button>
        </>
    )
}

export default bouton
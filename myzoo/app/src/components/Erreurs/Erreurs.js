import React from 'react'

const erreurs = (props) => {
    return (
        <>
            <div className="container mt-1">
                {props.children}
            </div>
        </>
    )
}

export default erreurs
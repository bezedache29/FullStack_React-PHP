import React from 'react'
import TitreH1 from '../../Titres/TitreH1'

const erreur404 = (props) => {
    return (
        <>
            <TitreH1 bgColor='bg-danger'>Erreur 404</TitreH1>
            <p>Cette page n'existe pas !</p>
        </>
    )
}

export default erreur404
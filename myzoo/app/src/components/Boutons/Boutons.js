import React from 'react'
import Bouton from './Bouton/Bouton'

const boutons = (props) => {
    return (
        <>
            {props.listeContinents.map((continent, index) => {
                return (
                    <div key={index} className="m-1">
                        <Bouton clic={() => {props.clic(continent.id_continent)}} continent={continent.nom_continent}>{continent.nom_continent}</Bouton>
                    </div>
                ) 
            })}
        </>
    )
}

export default boutons
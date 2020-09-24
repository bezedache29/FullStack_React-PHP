import React from 'react'
import Boutons from '../../../../components/Boutons/Boutons'
import Bouton from '../../../../components/Boutons/Bouton/Bouton'

const animal = (props) => {
    return (
        <>
        <div className="card justify-content-center" style={{"height": "500px"}}>
            <div className="card-header">
                <h3 className="text-center m-0">{props.id_animal} - {props.type_animal}</h3>
            </div>
            <p className="text-center mt-3 mb-0">{props.description_animal}</p>
            <div className="card-body row no-guuters align-items-center mt-0">
                <div className="col-6">
                    <img src={props.image_animal} alt={props.type_animal} width="80%" />
                </div>
                <div className="col-6 d-flex flex-column align-items-center">
                    <h6 className="m-0">Famille :</h6>
                    <Bouton clic={() => props.clicFamille(props.famille.id_famille)} btnColor='btn-dark'>{props.famille.nom_famille.toUpperCase()}</Bouton>
                </div>
            </div>
            <div>
                <p className="text-center px-2">{props.famille.description_famille}</p>
            </div>
            <div className="row no-gutters justify-content-center">
                <Boutons clic={props.clicContinent} listeContinents={props.continents} />
            </div>
        </div>
        </>
    )
}

export default animal
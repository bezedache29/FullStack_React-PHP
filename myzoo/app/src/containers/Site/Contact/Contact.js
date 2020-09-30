import React, { Component, Fragment } from 'react'
import Carte from '../../../components/Map/Map'
import Bouton from '../../../components/Boutons/Bouton/Bouton'
import Formulaire from './Formulaire/Formulaire'
import Titre from '../../../components/Titres/TitreH1'
import axios from 'axios'

class Contact extends Component {
    state = {
        formulaire: false
    }

    componentDidMount = () => {
        // Pour changer le title du head dans html
        document.title = "Contactez MyZoo"
    }

    handleForm = () => {
        if(this.state.formulaire === false) {
            this.setState({formulaire:true})
        }else if(this.state.formulaire === true) {
            this.setState({formulaire:false})
        }
    }

    handleValidation = (nom, email, message) => {
        this.setState({formulaire:false})
        const infosForm = {
            nom: nom,
            email: email,
            message: message
        }

        // On envoie le formulaire
        axios.post("http://localhost/Udemy/H2prog/React/ProjetReact2/myzoo/serv/front/sendForm", infosForm)
            .then(reponse => {
                console.log(reponse)
                console.log(reponse.data)
            })
            .catch(error => {
                console.log(error)
            })

    }

    render() {
        return (
            <Fragment>
                <div className="container mb-1">
                    <Titre bgColor="bg-primary mt-1">Contacter MyZoo</Titre>
                    <div className="row no-gutters mt-4">
                        <div className="col-12 col-md-6">
                            <Carte />
                        </div>
                        <div className="col-md-3"></div>
                        <div className="col-12 col-md-3">
                            <h2>Adresse</h2>
                            <p className="mb-0">Saint Louis de Rosay</p>
                            <p className="mt-0">44170 ABBARETZ</p>
                            <h2>Téléphone</h2>
                            <p>06 68 18 67 62</p>
                            <h2>Horaires</h2>
                            <p className="mb-0">Du lundi au venrdredi</p>
                            <p className="mt-0">De 9h à 12h et de 14h à 18h</p>
                            <p className="mb-0">Le samedi</p>
                            <p className="mt-0">de 8h à 12h et de 13h à 19h</p>
                        </div>
                    </div>
                    <div className="text-center mt-3">
                        <Bouton btnColor="btn-primary" clic={() => this.handleForm()} >{(this.state.formulaire === false) ? "Ouvrir le formulaire" : "Fermer le formulaire"}</Bouton>
                    </div>
                    {(this.state.formulaire === true) && 
                            <Formulaire validation={this.handleValidation} />
                        }
                </div>
            </Fragment>
        )
    }
}

export default Contact
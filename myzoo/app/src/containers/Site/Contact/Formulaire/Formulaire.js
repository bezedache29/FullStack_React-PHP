import React, { Component, Fragment } from 'react'
import Bouton from '../../../../components/Boutons/Bouton/Bouton'
import {withFormik} from 'formik'
import * as Yup from 'yup'

class Formulaire extends Component {
    render() {
        return (
            <Fragment>
                <h2>Formulaire de contact</h2>
                <form className="mb-2">
                    <div className="form-group">
                        <label htmlFor="nom">Votre Nom <span className="badge badge-pill badge-warning text-dark">Obligatoire</span></label>
                        {/* onChange permet de savoir si une valeur d'un input a changé. Si c'est le cas, on fait apel a une fonction qui va changer la state en inscrivant la nouvelle valeur */}
                        <input 
                            type="text" 
                            name="nom" 
                            className="form-control" 
                            id="nom" 
                            onChange={this.props.handleChange} 
                            value={this.props.values.nom}
                            onBlur={this.props.handleBlur}
                        />
                        {(this.props.errors.nom !== null && (this.props.touched.nom)) ? <span style={{color:"red"}}>{this.props.errors.nom}</span> : null}
                    </div>
                    <div className="form-group">
                        <label htmlFor="email">Votre adresse email <span className="badge badge-pill badge-warning text-dark">Obligatoire</span></label>
                        <input 
                            type="email" 
                            name="email" 
                            className="form-control" 
                            id="email" 
                            onChange={this.props.handleChange} 
                            value={this.props.values.auteur}
                            onBlur={this.props.handleBlur}
                        />
                        {(this.props.errors.email !== null) && (this.props.touched.email) ? <span style={{color:"red"}}>{this.props.errors.email}</span> : null}
                    </div>
                    <div className="form-group">
                        <label htmlFor="message">Votre message <span className="badge badge-pill badge-warning text-dark">Obligatoire</span></label>
                        <textarea 
                            className="form-control" 
                            name="message" 
                            id="message" 
                            rows="3" 
                            onChange={this.props.handleChange}
                            value={this.props.values.message}
                            onBlur={this.props.handleBlur}
                        ></textarea>
                        {(this.props.errors.message !== null) && (this.props.touched.message) ? <span style={{color:"red"}}>{this.props.errors.message}</span> : null}
                    </div>
                    <Bouton btnColor="btn-warning mr-1" clic={this.props.handleReset} >Reset</Bouton>
                    <Bouton btnColor="btn-primary ml-1" clic={this.props.handleSubmit} >Envoyer</Bouton>
                </form>
            </Fragment>
        )
    }
}

export default withFormik({
    mapPropsToValues: () => ({
        // Permet de supprimer tout ce qu'on a fait au niveau des states
        // Ce qui est présent dans le name des inputs fait référence au nom ci-dessous
        nom: "",
        email: "",
        message: ""
    }),
    // validate: (values) => {

    //     const errors = {}
    //     if(!values.nom) {
    //         errors.nom = "Le nom doit être renseigné"
    //     }else if(values.nom && values.nom.length < 3) {
    //         errors.nom = "Le nom doit avoir plus de 3 caractères"
    //     }else if(values.nom && values.nom.length > 18) {
    //         errors.nom = "Le nom ne doit pas dépasser 18 caractères"
    //     }

    //     if(!values.email) {
    //         errors.email = "L'adresse email doit être renseigné"
    //     }else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(values.email)) {
    //         errors.email = "L'adresse email est invalide"
    //     }

    //     if(!values.message) {
    //         errors.message = "Un message doit être renseigné"
    //     }else if(values.message && values.message.length < 100) {
    //         errors.message = "Le message doit comporté 100 caractères minimum"
    //     }
    //     return errors
    // },
    validationSchema : Yup.object().shape({
        // On verifie qu'il y a 5 caractère dans le champ nom
        nom: Yup.string()
            .min(5, "Le nom doit faire minimum 5 caratères")
            .required("Le nom est obligatoire"),

        email: Yup.string()
            .email("Votre adresse email n'a pas le bon format")
            .required("L'adresse email est obligatoire"),
        
        message: Yup.string()
            .min(50, "Le message doit faire minimum 50 caractères")
            .max(100, "Le message ne doit pas faire plus de 100 caratères")
            .required("Le message est obligatoire")
    }),
    handleSubmit: (values, {props}) => {
        props.validation(values.nom, values.email, values.message)
    }
})(Formulaire)
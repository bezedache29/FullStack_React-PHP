import React, { Component, Fragment } from 'react'
import TitreH1 from '../../../components/Titres/TitreH1'
import axios from 'axios'

class Animaux extends Component {
    state = {
        animaux: null,
        loading: false
    }

    componentDidMount = () => {
        // Pour changer le title du head dans html
        document.title = "Tous les animaux du parc MyZoo"

        this.setState({loading: true})

        axios.get("http://localhost/Udemy/H2prog/React/ProjetReact2/myzoo/admin/front/animaux")
        .then(reponse => {
            const listeAnimaux = Object.values(reponse.data)
            this.setState({
                animaux:listeAnimaux,
                loading:false
            })
        }).catch(error => {
            console.log(error)
            this.setState({loading:false})
        })
    }

    render() {
        return (
            <Fragment>
                <div className="container mt-1">
                    <TitreH1 bgColor="bg-primary">Les animaux du parc My Zoo</TitreH1>
                    {(this.state.loading) && <div>Chargement des animaux...</div>}
                    {(!this.state.loading) && (this.state.animaux) &&
                        this.state.animaux.map((animal, index) => {
                            return <div key={index}>Type : {animal.type_animal}</div>
                        })
                    }
                </div>
            </Fragment>
        )
    }
}

export default Animaux
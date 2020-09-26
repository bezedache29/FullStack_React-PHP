import React, { Component, Fragment } from 'react'
import TitreH1 from '../../../components/Titres/TitreH1'
import axios from 'axios'
import Animal from '../Animaux/Animal/Animal'
import Bouton from '../../../components/Boutons/Bouton/Bouton'

class Animaux extends Component {
    state = {
        animaux: null,
        loading: false,
        continent: null,
        famille: null,
        listeContinents: null,
        listeFamilles: null
    }

    chargementAnimaux = (famille, continent) => {
        this.setState({loading: true})

        axios.get(`http://localhost/Udemy/H2prog/React/ProjetReact2/myzoo/admin/front/animaux/${famille}/${continent}`)
        .then(reponse => {
            const listeAnimaux = Object.values(reponse.data)
            this.setState({
                animaux:listeAnimaux,
                loading:false,
            })
        }).catch(error => {
            console.log(error)
            this.setState({loading:false})
        })
    }

    chargementContinents = () => {
        axios.get(`http://localhost/Udemy/H2prog/React/ProjetReact2/myzoo/admin/front/continents`)
            .then(reponse => {
                this.setState({listeContinents:reponse.data})
            })
    }

    chargementfamilles= () => {
        axios.get(`http://localhost/Udemy/H2prog/React/ProjetReact2/myzoo/admin/front/familles`)
            .then(reponse => {
                this.setState({listeFamilles:reponse.data})
            })
    }

    componentDidMount = () => {
        // Pour changer le title du head dans html
        document.title = "Tous les animaux du parc MyZoo"
        
        this.chargementAnimaux(-1, -1)
        this.chargementContinents()
        this.chargementfamilles()
    }

    handleClicContinent = (continent) => {
        if(this.state.famille === null) {
            this.chargementAnimaux(-1, continent)
        }else {
            this.chargementAnimaux(this.state.famille, continent)
        }
        
        this.setState({continent:continent})
    }

    handleClicFamille = (famille) => {
        if(this.state.continent === null) {
            this.chargementAnimaux(famille, -1)
        }else {
            this.chargementAnimaux(famille, this.state.continent)
        }
        
        this.setState({famille:famille})
    }

    handleSupprFamille = () => {
        if(this.state.continent !== null) {
            this.chargementAnimaux(-1, this.state.continent)
        }else {
            this.chargementAnimaux(-1, -1)
        }

        this.setState({famille:null})
    }

    handleSupprContinent = () => {
        if(this.state.famille !== null) {
            this.chargementAnimaux(this.state.famille, -1)
        }else {
            this.chargementAnimaux(-1, -1)
        }

        this.setState({continent:null})
    }

    
    render() {
        return (
            <Fragment>
                <div className="container mt-1">
                    <TitreH1 bgColor="bg-primary">Les animaux du parc My Zoo</TitreH1>
                    {(this.state.continent || this.state.famille) && (this.state.animaux) &&
                        <span>Filtres : </span>
                    }
                        
                    {(this.state.listeContinents) && (this.state.continent || this.state.famille) && 
                        <select className="col-3 mx-2">
                        {this.state.listeContinents.map((continent, index) => {
                                return <option key={index}>{continent.nom_continent}</option>
                            })}
                        </select>
                    }

                    {(this.state.listeFamilles) && (this.state.continent || this.state.famille) && 
                        <select className="col-3 mx-2">
                        {this.state.listeFamilles.map((famille, index) => {
                                return <option key={index}>{famille.nom_famille}</option>
                            })}
                        </select>
                    }
                        
                    {(this.state.famille) && (this.state.animaux) &&
                        <Bouton btnColor='btn-secondary' clic={() => this.handleSupprFamille()}>{this.state.famille}</Bouton>
                    }
                    {(this.state.continent) && (this.state.animaux) &&
                        <Bouton btnColor='btn-secondary' clic={() => this.handleSupprContinent()}>{this.state.continent}</Bouton>
                    }
                    <div className="row no-gutters mb-3">
                        {(this.state.loading) && <div>Chargement des animaux...</div>}
                        {(!this.state.loading) && (this.state.animaux) &&
                            this.state.animaux.map((animal, index) => {
                                return (
                                    <div key={index} className="col-12 col-md-4 p-1">
                                        <Animal clicFamille={this.handleClicFamille} clicContinent={this.handleClicContinent} {...animal} />
                                    </div>
                                )
                            })
                        }
                    </div>
                </div>
            </Fragment>
        )
    }
}

export default Animaux
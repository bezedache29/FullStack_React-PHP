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

        if(continent === "-1") {
            this.handleSupprContinent()
        }else {
            this.setState({continent:continent})
        }
    }

    handleClicFamille = (famille) => {
        if(this.state.continent === null) {
            this.chargementAnimaux(famille, -1)
        }else {
            this.chargementAnimaux(famille, this.state.continent)
        }

        if(famille === "-1") {
            this.handleSupprFamille()
        }else {
            this.setState({famille:famille})
        }
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

        // Pour afficher le nom des familles dans le boutons lors des filtres
        let nomFamilleFiltre = ""
        // On check si on a bien une valeur dans le state famille
        if(this.state.famille) {
            // On boucle pour recupéer l'index de la famille voulu
            const numCaseFamille = this.state.listeFamilles.findIndex(famille => {
                // On retourne le numero de la famille lorque les numero sont identique
                return this.state.famille === famille.id_famille
            })
            // On recupere le nom de la famille a placer dans le bouton
            nomFamilleFiltre = this.state.listeFamilles[numCaseFamille].nom_famille
        }

        // Idem aavec les continents
        let nomContinentFiltre = ""
        
        if(this.state.continent) {
            const numCaseContinent = this.state.listeContinents.findIndex(continent => {
                return this.state.continent === continent.id_continent
            })
            nomContinentFiltre = this.state.listeContinents[numCaseContinent].nom_continent
        }

        return (
            <Fragment>
                <div className="container mt-1">
                    <TitreH1 bgColor="bg-primary">Les animaux du parc My Zoo</TitreH1>
                    <span>Filtres : </span>

                    {(this.state.listeFamilles) &&  
                        <select className="col-3 mx-2" onChange={(event) => this.handleClicFamille(event.target.value)}>
                            <option value="-1" selected={(this.state.famille === null) && "selected"}>Familles</option>
                        {this.state.listeFamilles.map((famille, index) => {
                                return <option 
                                            key={index} 
                                            selected={(this.state.famille === famille.id_famille) && "selected"}
                                            value={famille.id_famille}>{famille.nom_famille}</option>
                            })}
                        </select>
                    }

                    {(this.state.listeContinents) &&  
                        <select className="col-3 mx-2" onChange={(event) => this.handleClicContinent(event.target.value)}>
                            <option value="-1" selected={(this.state.continent === null) && "selected"}>Continents</option>
                        {this.state.listeContinents.map((continent, index) => {
                                return <option 
                                            key={index} 
                                            selected={(this.state.continent === continent.id_continent) && "selected"} 
                                            value={continent.id_continent}>{continent.nom_continent}</option>
                            })}
                        </select>
                    }
                        
                    {(this.state.famille) && (this.state.animaux) &&
                        <Bouton btnColor='btn-secondary' clic={() => this.handleSupprFamille()}>{nomFamilleFiltre}</Bouton>
                    }
                    {(this.state.continent) && (this.state.animaux) &&
                        <Bouton btnColor='btn-secondary' clic={() => this.handleSupprContinent()}>{nomContinentFiltre}</Bouton>
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
import React, { Component, Fragment } from 'react'
import Accueil from './Accueil/Accueil'
import Animaux from './Animaux/Animaux'
import Contact from './Contact/Contact'
import NavBar from '../../components/NavBar/NavBar'
import {Route, Switch} from 'react-router-dom'
import Erreurs from '../../components/Erreurs/Erreurs'
import Erreur404 from '../../components/Erreurs/Erreur404/Erreur404'
import Footer from '../../components/Footer/Footer'

class Site extends Component {
    render() {
        return (
            <Fragment>
                <div className="site">
                    <Route path="/" render={() => <NavBar />} />
                    <Switch>
                        <Route path="/" exact render={(props) => <Accueil />} />
                        <Route path="/animaux" exact render={(props) => <Animaux />} />
                        <Route path="/contact" exact render={(props) => <Contact />} />
                        <Route path="/mentions" exact render={(props) => <h1>Pages des mentions légales</h1>} />
                        <Route render={(props) => <Erreurs><Erreur404 {...props} /></Erreurs>} />
                    </Switch>
                    <div className="minSite"></div>
                </div>
                <Route path="/" render={() => <Footer />} />
            </Fragment>
        )
    }
}

export default Site
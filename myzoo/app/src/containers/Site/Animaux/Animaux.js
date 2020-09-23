import React, { Component, Fragment } from 'react'

class Animaux extends Component {
    componentDidMount = () => {
        // Pour changer le title du head dans html
        document.title = "Tous les animaux du parc MyZoo"
    }
    render() {
        return (
            <Fragment>
                <div>Page des Animaux</div>
            </Fragment>
        )
    }
}

export default Animaux
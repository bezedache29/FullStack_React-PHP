import React, { Component, Fragment } from 'react'

class Contact extends Component {
    componentDidMount = () => {
        // Pour changer le title du head dans html
        document.title = "Contactez MyZoo"
    }
    render() {
        return (
            <Fragment>
                <div>Page Contact</div>
            </Fragment>
        )
    }
}

export default Contact
import React from 'react'
import {NavLink} from 'react-router-dom'

const navBar = (props) => {
    return (
        <>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">MyZoo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <NavLink exact to="/" className="nav-link">Accueil</NavLink>
                        </li>
                        <li class="nav-item">
                            <NavLink exact to="/animaux" className="nav-link">Les animaux du parc</NavLink>
                        </li>
                        <li class="nav-item">
                            <NavLink exact to="/contact" className="nav-link">Contact</NavLink>
                        </li>
                    </ul>
                </div>
            </nav>
        </>
    )
}

export default navBar
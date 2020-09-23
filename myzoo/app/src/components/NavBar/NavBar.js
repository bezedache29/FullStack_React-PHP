import React from 'react'
import {NavLink} from 'react-router-dom'
import imageLogo from '../../assets/images/logo.png'

const navBar = (props) => {
    return (
        <>
            <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                <NavLink to="/" className="navbar-brand mr-2">
                    <img className="rounded-circle" src={imageLogo} alt="Logo MyZoo" width="50px" />
                </NavLink>
                <NavLink to="/" className="navbar-brand ml-2">MyZoo</NavLink>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul className="navbar-nav ml-auto">
                        <li className="nav-item">
                            <NavLink exact to="/" className="nav-link">Accueil</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink exact to="/animaux" className="nav-link">Les animaux du parc</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink exact to="/contact" className="nav-link">Contact</NavLink>
                        </li>
                    </ul>
                </div>
            </nav>
        </>
    )
}

export default navBar
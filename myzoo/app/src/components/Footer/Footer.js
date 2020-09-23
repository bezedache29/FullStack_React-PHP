import React from 'react'
import imageFB from '../../assets/images/footer/fb.png'
import imageTW from '../../assets/images/footer/twitter.png'
import imageYT from '../../assets/images/footer/youtube.png'
import {NavLink} from 'react-router-dom'

const footer = (props) => {
    return (
        <>
            <footer className="bg-success">
                <p className="text-center text-white h6 py-2">MyZoo - TOUS DROIT RESERVE | 2020</p>
                <div className="row no-gutters align-items-center">
                    <div className="col-3 d-flex justify-content-center">
                        <a href="https://www.facebook.com/" target='_blank' rel="noopener noreferrer">
                            <img src={imageFB} alt="Facebook MyZoo" width="80px" />
                        </a>
                    </div>
                    <div className="col-3 d-flex justify-content-center">
                        <a href="https://twitter.com/" target='_blank' rel="noopener noreferrer">
                            <img src={imageTW} alt="Twitter MyZoo" width="80px" />
                        </a>
                    </div>
                    <div className="col-3 d-flex justify-content-center">
                        <a href="https://www.youtube.com/?gl=FR" target='_blank' rel="noopener noreferrer">
                            <img src={imageYT} alt="Youtube MyZoo" width="100px" />
                        </a>
                    </div>
                    <div className="col-3 d-flex flex-column align-items-center">
                        <p className="font-weight-bold m-0">Liens</p>
                        <p className="m-0"><NavLink className="perso_link" to="/mentions">Mentions légales</NavLink></p>
                        <p className="m-0"><a href="mailto:contact@myzoo.com" className="perso_link">contact@myzoo.com</a></p>
                    </div>
                </div>
            </footer>
        </>
    )
}

export default footer
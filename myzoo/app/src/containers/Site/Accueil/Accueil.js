import React, { Component, Fragment } from 'react'
import TitreH1 from '../../../components/Titres/TitreH1'
import ImageSlider1 from '../../../assets/images/banderole.png'
import Image1 from '../../../assets/images/logo.png'

class Accueil extends Component {
    componentDidMount = () => {
        // Pour changer le title du head dans html
        document.title = "Site Web du parc d'animaux MyZoo"
    }
    
    render() {
        return (
            <Fragment>
                <div id="carouselExampleControls" className="carousel slide" data-ride="carousel">
                    <div className="carousel-inner">
                        <div className="carousel-item active">
                            <img className="d-block w-100" src={ImageSlider1} alt="First slide" />
                        </div>
                        <div className="carousel-item">
                            <img className="d-block w-100" src={ImageSlider1} alt="Second slide" />
                        </div>
                        <div className="carousel-item">
                            <img className="d-block w-100" src={ImageSlider1} alt="Third slide" />
                        </div>
                    </div>
                </div>
                <div className="container mt-1">
                    <TitreH1 bgColor='bg-primary'>Venez visiter le parc MyZoo !!</TitreH1>
                    <p className="my-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. Condimentum vitae sapien pellentesque 
                        habitant morbi tristique senectus et. Sed blandit libero volutpat sed cras ornare 
                        arcu. Condimentum lacinia quis vel eros. Id volutpat lacus laoreet non curabitur 
                        gravida arcu. Enim sed faucibus turpis in eu mi bibendum neque. Ipsum consequat 
                        nisl vel pretium lectus quam id leo in. Ultrices in iaculis nunc sed augue lacus 
                        viverra vitae. Nisl tincidunt eget nullam non nisi est. Aliquam ultrices sagittis 
                        orci a. Et ultrices neque ornare aenean euismod elementum nisi.
                    </p>
                    <div className="row no-gutters my-4 align-items-center">
                        <div className="col-12 col-md-4">
                            <img src={Image1} alt="Animal" width="100%"/>
                        </div>
                        <div className="col">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua. Condimentum vitae sapien pellentesque 
                                habitant morbi tristique senectus et. Sed blandit libero volutpat sed cras ornare 
                                arcu. Condimentum lacinia quis vel eros. Id volutpat lacus laoreet non curabitur 
                                gravida arcu. Enim sed faucibus turpis in eu mi bibendum neque. Ipsum consequat 
                                nisl vel pretium lectus quam id leo in. Ultrices in iaculis nunc sed augue lacus 
                                viverra vitae. Nisl tincidunt eget nullam non nisi est. Aliquam ultrices sagittis 
                                orci a. Et ultrices neque ornare aenean euismod elementum nisi.
                            </p>
                        </div>
                    </div>
                    <div className="row no-gutters my-4 align-items-center ">
                        <div className="col">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua. Condimentum vitae sapien pellentesque 
                                habitant morbi tristique senectus et. Sed blandit libero volutpat sed cras ornare 
                                arcu. Condimentum lacinia quis vel eros. Id volutpat lacus laoreet non curabitur 
                                gravida arcu. Enim sed faucibus turpis in eu mi bibendum neque. Ipsum consequat 
                                nisl vel pretium lectus quam id leo in. Ultrices in iaculis nunc sed augue lacus 
                                viverra vitae. Nisl tincidunt eget nullam non nisi est. Aliquam ultrices sagittis 
                                orci a. Et ultrices neque ornare aenean euismod elementum nisi.
                            </p>
                        </div>
                        <div className="col-12 col-md-4">
                            <img src={Image1} alt="Animal" className="img-fluid" />
                        </div>
                    </div>
                </div>
            </Fragment>
        )
    }
}

export default Accueil
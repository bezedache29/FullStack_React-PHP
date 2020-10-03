import React from 'react';
import Site from './containers/Site/Site'
import {BrowserRouter} from 'react-router-dom'
import './App.css'

function App() {
  return (
    <BrowserRouter basename="/myzoo/">
      <Site />
    </BrowserRouter>
  );
}

export default App;

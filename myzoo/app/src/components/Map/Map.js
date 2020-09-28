import React from "react";
import { Map, Marker, Popup, TileLayer } from "react-leaflet";
import { Icon } from "leaflet";

export default function carte() {
    const position = [47.55183410644531, -1.4316028356552124]
  return (
    <Map center={position} zoom={14} style={{
            "boxShadow" : "0px 0px 5px 1px grey"
        }}>
      <TileLayer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        attribution='&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      />
      <Marker position={position}>
          <Popup>
            <h2>MyZoo</h2>
            <p>Adresse de myZoo</p>
          </Popup>
        </Marker>
    </Map>
  );
}
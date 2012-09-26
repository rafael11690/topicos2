<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class gallery {

    private $idGallery;
    private $idCity;

    function __construct($idGallery, $idCity) {
        $this->idGallery = $idGallery;
        $this->idCity = $idCity;
    }

    public function getIdGallery() {
        return $this->idGallery;
    }

    public function setIdGallery($idGallery) {
        $this->idGallery = $idGallery;
    }

    public function getIdCity() {
        return $this->idCity;
    }

    public function setIdCity($idCity) {
        $this->idCity = $idCity;
    }

}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class city {

    private $idCity;
    private $name;
    private $state;
    private $country;
    private $description;
    private $thumbnail;
    private $idGallery;
    private $idUser;

    public function getIdCity() {
        return $this->idCity;
    }

    public function setIdCity($idCity) {
        $this->idCity = $idCity;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getThumbnail() {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }

    public function getIdGallery() {
        return $this->idGallery;
    }

    public function setIdGallery($idGallery) {
        $this->idGallery = $idGallery;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

}

?>

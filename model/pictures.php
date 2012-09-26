<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class pictures {

    private $idPictures;
    private $idGallery;
    private $url;
    private $legend;

    public function getIdPictures() {
        return $this->idPictures;
    }

    public function setIdPictures($idPictures) {
        $this->idPictures = $idPictures;
    }

    public function getIdGallery() {
        return $this->idGallery;
    }

    public function setIdGallery($idGallery) {
        $this->idGallery = $idGallery;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getLegend() {
        return $this->legend;
    }

    public function setLegend($legend) {
        $this->legend = $legend;
    }

}

?>

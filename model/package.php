<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class package {

    private $idPackage;
    private $idCity;
    private $name;
    private $description;
    private $price;
    private $pricePromo;
    private $dateStart;
    private $dateEnd;
    private $idUser;
    private $flag;
    
    function __construct($idPackage, $idCity, $name, $description, $price, $pricePromo, $dateStart, $dateEnd, $idUser, $flag) {
        $this->idPackage = $idPackage;
        $this->idCity = $idCity;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->pricePromo = $pricePromo;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->idUser = $idUser;
        $this->flag = $flag;
    }

    public function getIdPackage() {
        return $this->idPackage;
    }

    public function setIdPackage($idPackage) {
        $this->idPackage = $idPackage;
    }

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

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPricePromo() {
        return $this->pricePromo;
    }

    public function setPricePromo($pricePromo) {
        $this->pricePromo = $pricePromo;
    }

    public function getDateStart() {
        return $this->dateStart;
    }

    public function setDateStart($dateStart) {
        $this->dateStart = $dateStart;
    }

    public function getDateEnd() {
        return $this->dateEnd;
    }

    public function setDateEnd($dateEnd) {
        $this->dateEnd = $dateEnd;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getFlag() {
        return $this->flag;
    }

    public function setFlag($flag) {
        $this->flag = $flag;
    }

}

?>

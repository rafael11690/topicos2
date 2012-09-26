<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class form {

    private $idForm;
    private $idPackage;
    private $firstName;
    private $lastName;
    private $guestsNumber;
    private $coupleRoom;
    private $individualRoom;
    private $doubleRoom;
    private $tripleRoom;
    private $observation;
    private $email;
    private $areaCode;
    private $phone;
    private $newsletter;

    public function getIdForm() {
        return $this->idForm;
    }

    public function setIdForm($idForm) {
        $this->idForm = $idForm;
    }

    public function getIdPackage() {
        return $this->idPackage;
    }

    public function setIdPackage($idPackage) {
        $this->idPackage = $idPackage;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getGuestsNumber() {
        return $this->guestsNumber;
    }

    public function setGuestsNumber($guestsNumber) {
        $this->guestsNumber = $guestsNumber;
    }

    public function getCoupleRoom() {
        return $this->coupleRoom;
    }

    public function setCoupleRoom($coupleRoom) {
        $this->coupleRoom = $coupleRoom;
    }

    public function getIndividualRoom() {
        return $this->individualRoom;
    }

    public function setIndividualRoom($individualRoom) {
        $this->individualRoom = $individualRoom;
    }

    public function getDoubleRoom() {
        return $this->doubleRoom;
    }

    public function setDoubleRoom($doubleRoom) {
        $this->doubleRoom = $doubleRoom;
    }

    public function getTripleRoom() {
        return $this->tripleRoom;
    }

    public function setTripleRoom($tripleRoom) {
        $this->tripleRoom = $tripleRoom;
    }

    public function getObservation() {
        return $this->observation;
    }

    public function setObservation($observation) {
        $this->observation = $observation;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAreaCode() {
        return $this->areaCode;
    }

    public function setAreaCode($areaCode) {
        $this->areaCode = $areaCode;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getNewsletter() {
        return $this->newsletter;
    }

    public function setNewsletter($newsletter) {
        $this->newsletter = $newsletter;
    }

}

?>

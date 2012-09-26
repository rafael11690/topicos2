<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class user {

    private $idUser;
    private $login;
    private $password;
    private $name;
    private $privilege;

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrivilege() {
        return $this->privilege;
    }

    public function setPrivilege($privilege) {
        $this->privilege = $privilege;
    }

}

?>

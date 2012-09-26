<?php

class user {

    private $id;
    private $login;
    private $password;
    private $name;
    private $privilege;
    
    function __construct($id, $login, $password, $name, $privilege) {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->privilege = $privilege;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
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

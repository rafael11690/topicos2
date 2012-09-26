<?php

include_once 'bd.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/model/user.php';

class userDAO {

    public function getUser($login, $password) {
        
        $con = new bd();
        
        $sql = 'Select * from user where login="'.$login.'" AND password = MD5("'.$password.'")';

        $r = $con->prepare($sql);
        $r->execute();
        
        $result = $r->fetch();
        
        $user = new user(
                $result['iduser'],
                $result['login'],
                $result['password'],
                $result['name'],
                $result['privilege']
            );
        
        return $user;
    }
    
}

?>

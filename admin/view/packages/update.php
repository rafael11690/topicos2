<?php

include_once _URL . 'controller/packageDAO.php';
include_once _URL . 'model/package.php';

if ($_POST['name']) {

    $package = new package(1,
            $_POST['id_city'],
            $_POST['name'],
            $_POST['description'],
            $_POST['price'],
            $_POST['pricePromo'],
            $_POST['dateStart'],
            $_POST['dateEnd'],
            0,
            1
        );
            
}

?>

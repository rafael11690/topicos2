<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/topicos2/settings.php';
include_once _URL . 'controller/core.php';
include_once _URL . 'controller/packageDAO.php';

if (isset($_POST['remove_id'])) {

    print_r($_POST['remove_id']);
    
    foreach ($_POST['remove_id'] as $value) {
        $controller = new packageDAO();
        $controller->setFlag($value);
    }
}

header('Location: packages_remove.php');

?>

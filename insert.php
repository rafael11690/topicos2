<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/settings.php';
include_once _URL . 'controller/formDAO.php';
include_once _URL . 'model/form.php';

if ($_POST['first_name']) {
    
    $newsletter = (isset($_POST['newsletter'])) ? $_POST['newsletter'] : 0;
    
    $form = new form(
                        0,
                        $_POST['id_package'],
                        $_POST['first_name'],
                        $_POST['last_name'],
                        $_POST['guests_number'],
                        $_POST['couple_room'],
                        $_POST['individual_room'],
                        $_POST['double_room'],
                        $_POST['triple_room'],
                        $_POST['observation'],
                        $_POST['email'],
                        $_POST['area_code'],
                        $_POST['phone'],
                        $newsletter
        );

    $controller = new formDAO();
    $controller->insert($form);

    header('Location: index.php?ms=1');
}

?>

<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/topicos2/settings.php';
include_once _URL . 'controller/cityDAO.php';
include_once _URL . 'model/city.php';

if ($_POST['name']) {

    if ((isset($_FILES["thumbnail"]))
            && (($_FILES["thumbnail"]["type"] == "image/gif")
            || ($_FILES["thumbnail"]["type"] == "image/jpeg")
            || ($_FILES["thumbnail"]["type"] == "image/pjpeg"))) {


            if ($_FILES["thumbnail"]["error"] > 0) {
                echo "Não foi possível enviar o aquivo. Erro #" . $_FILES["thumbnail"]["error"] . "<br />";
                die();
            } else {
                $url_image = $_SERVER['DOCUMENT_ROOT'] . '/topicos2/topicos2/images/' . $_FILES["thumbnail"]["name"];
                if (file_exists($url_image)) {
                    echo "O " . $_FILES["thumbnail"]["name"] . " já existe! ";
                    die();
                } else {
                    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $url_image);
                }
            }
            $thumbnail = $_FILES["thumbnail"]["tmp_name"];
    } else {
        $thumbnail = '';
    }

    $city = new city(
                    0,
                    $_POST['name'],
                    $_POST['state'],
                    $_POST['country'],
                    $_POST['description'],
                    $thumbnail,
                    1,
                    1
    );

    $controller = new cityDAO();
    $controller->insert($city);

    header('Location: city.php?ms=1');
}
?>

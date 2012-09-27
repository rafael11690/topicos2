<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/settings.php';
include_once _URL . 'controller/packageDAO.php';
include_once _URL . 'model/package.php';

if ($_POST['name']) {

    $pricePromo = (isset($_POST['pricePromo']) && ($_POST['pricePromo'] != "")) ? $_POST['pricePromo'] : 'NULL';

    if ((isset($_FILES))
            && (($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg"))) {

            if ($_FILES["file"]["error"] > 0) {
                echo "Não foi possível enviar o aquivo. Erro #" . $_FILES["file"]["error"] . "<br />";
                die();
            } else {
                $url_image = $_SERVER['DOCUMENT_ROOT'] . '/topicos2/topicos2/images/' . $_FILES["file"]["name"];
                if (file_exists($url_image)) {
                    echo "O " . $_FILES["file"]["name"] . " já existe! ";
                    die();
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $url_image.date());
                }
            }
            $thumbnail = $_FILES["file"]["name"];
    } else {
        $thumbnail = 'a';
    }

    $package = new package(
                    $_POST['idpackage'],
                    $_POST['id_city'],
                    $_POST['name'],
                    $_POST['description'],
                    $_POST['price'],
                    $pricePromo,
                    $_POST['dateStart'],
                    $_POST['dateEnd'],
                    1,
                    1,
                   $thumbnail
    );

    $controller = new packageDAO();
    print_r($package);
    if ($_POST['type'] == 'insert') {
        $controller->insert($package);
        echo $_POST['type'];
    } else {
        $controller->update($package);
        echo $_POST['type'];
    }

    header('Location: packages.php?ms=1');
}
?>

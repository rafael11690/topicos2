<?php

include_once '../../../settings.php';
include_once _URL . 'controller/core.php';
include_once _URL . 'controller/cityDAO.php';

$privilege = isLogged();

if ((isset($_GET['page'])) && ($_GET['qty'])) {
    $page = $_GET['page'];
    $qty = $_GET['qty'];
} else {
    $page = 0;
    $qty = 10;
}

$controller = new cityDAO();
$cities = $controller->getCities($page, $qty);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../../style/admin.css" rel="stylesheet" type="text/css" />
        <title>Aoba's Tur - Admin</title>
    </head>
    <body>
        <div id="menu">
            <?php
            getMenuAdmin($privilege);
            ?>
        </div>
        <div id="sidebar">
            <ul>
                <li><a href="'._URL.'admin/view/city/city.php">Editar</a></li>
                <li><a href="'._URL.'admin/view/city/city_add.php">Cadastrar</a></li>
                <li><a href="'._URL.'admin/view/city/city_remove.php">Remover</a></li>
            </ul>
        </div>
        <div id="content">
            <table id="cities">
                <thead>
                    <th><input type="checkbox" id="selectAll" /></th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>País</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($cities as $key => $value) :
                    ?>
                    <tr>
                        <td><input type="checkbox" name="<?php echo $cities[$key]->getIdCity(); ?>" /></td>
                        <td><?php echo $cities[$key]->getName(); ?></td>
                        <td><?php echo $cities[$key]->getState(); ?></td>
                        <td><?php echo $cities[$key]->getCountry(); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

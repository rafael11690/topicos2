<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/settings.php';
include_once _URL . 'controller/core.php';
include_once _URL . 'controller/formDAO.php';
include_once _URL . 'controller/packageDAO.php';
include_once _URL . 'controller/cityDAO.php';

$privilege = isLogged();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../../style/admin.css" rel="stylesheet" type="text/css" />
        <title>Aoba's Tur - Admin</title>
    </head>
    <body class="admin">
        <div id="menu">
            <?php
            getMenuAdmin($privilege);
            ?>
        </div>
        <div id="sidebar">
            <ul>
                <li>&nbsp;</li>
            </ul>
        </div>
        <div id="content">
            <?php
            $controller = new formDAO();
            $form = $controller->getForm($_GET['form']);

            $controller2 = new packageDAO();
            $package = $controller2->getPackageById($form->getIdPackage());

            $controller3 = new cityDAO();
            $city = $controller3->getCityById($package->getIdCity());
            ?>
            <table id="reserve">
                <tbody>
                    <tr>
                        <td width="200px">Pacote: </td>
                        <td><?php echo $package->getName(); ?></td>
                    </tr>
                    <tr>
                        <td>Cidade: </td>
                        <td><?php echo $city->getName(); ?></td>
                    </tr>
                    <tr>
                        <td>Nome: </td>
                        <td><?php echo $form->getFirstName(); ?></td>
                    </tr>
                    <tr>
                        <td>Sobrenome: </td>
                        <td><?php echo $form->getLastName(); ?></td>
                    </tr>
                    <tr>
                        <td>e-mail: </td>
                        <td><?php echo $form->getEmail(); ?></td>
                    </tr>
                    <tr>
                        <td>Telefone: </td>
                        <td><?php echo $form->getAreaCode().'-'.$form->getPhone(); ?></td>
                    </tr>
                    <tr>
                        <td>Quantidade<br />de hóspedes: </td>
                        <td><?php echo $form->getGuestsNumber(); ?></td>
                    </tr>
                    <tr>
                        <td>Quantidade de quartos<br />para casal: </td>
                        <td><?php echo $form->getCoupleRoom(); ?></td>
                    </tr>
                    <tr>
                        <td>Quantidade de quartos<br />individuais: </td>
                        <td><?php echo $form->getIndividualRoom(); ?></td>
                    </tr>
                    <tr>
                        <td>Quantidade< de quartos<br />para 2 pessoas: </td>
                        <td><?php echo $form->getDoubleRoom(); ?></td>
                    </tr>
                    <tr>
                        <td>Quantidade de quartos<br />para 3 pessoas: </td>
                        <td><?php echo $form->getTripleRoom(); ?></td>
                    </tr>
                    <tr>
                        <td>Oberservação: </td>
                        <td><?php echo $form->getObservation(); ?></td>
                    </tr>
                </tbody>
            </table>
            <input type="button" value="Voltar" onclick="window.location.href='reserve.php';" />
        </div>
    </body>
</html>

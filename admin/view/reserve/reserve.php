<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/topicos2/settings.php';
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
        <title>Aoba's Tur - Admin</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            <table id="reserve">
                <thead>
                    <th>Pacote</th>
                    <th>Cidade</th>
                    <th>Nome</th>
                    <th>e-mail</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    <?php
                    $controller = new formDAO();
                    $forms = $controller->getForms(0, 30);

                    foreach ($forms as $form) :

                        $controller2 = new packageDAO();
                        $package = $controller2->getPackageById($form->getIdPackage());

                        $controller3 = new cityDAO();
                        $city = $controller3->getCityById($package->getIdCity());
                        ?>
                        <tr>
                            <td><?php echo $package->getName(); ?></td>
                            <td><?php echo $city->getName(); ?></td>
                            <td><?php echo $form->getFirstName(); ?></td>
                            <td><?php echo $form->getEmail(); ?></td>
                            <td><input type="button" value="Visualizar" onclick="window.location.href='form_viewer.php?form=<?php echo $form->getIdForm(); ?>';" /></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </form>
        </div>
    </body>
</html>

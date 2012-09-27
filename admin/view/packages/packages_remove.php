<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/topicos2/topicos2/settings.php';
include_once _URL . 'controller/core.php';
include_once _URL . 'controller/packageDAO.php';
include_once _URL . 'controller/cityDAO.php';

$privilege = isLogged();

if ((isset($_GET['page'])) && ($_GET['qty'])) {
    $page = $_GET['page'];
    $qty = $_GET['qty'];
} else {
    $page = 0;
    $qty = 30;
}

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
                <li><a href="<?php echo _HTTP; ?>admin/view/packages/packages.php">Editar</a></li>
                <li><a href="<?php echo _HTTP; ?>admin/view/packages/packages_update.php">Cadastrar</a></li>
                <li><a href="<?php echo _HTTP; ?>admin/view/packages/packages_remove.php">Remover</a></li>
            </ul>
        </div>
        <div id="content">
            <form name="packages_remove" method="POST" action="remove.php">
                <table id="packages">
                    <thead>
                        <th><input type="checkbox" id="selectAll" /></th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Preço promocional</th>
                        <th>Data início</th>
                        <th>Data final</th>
                        <th>Cidade</th>
                    </thead>
                    <tbody>
                        <?php
                        
                        $controller = new packageDAO();
                        $packages = $controller->getPackages($page, $qty);

                        foreach ($packages as $key => $value) :
                            
                            $controller2 = new cityDAO();
                            $city = $controller2->getCityById($packages[$key]->getIdCity());
                            
                            ?>
                            <tr>
                                <td><input type="checkbox" name="remove_id[]" value="<?php echo $packages[$key]->getIdPackage(); ?>" /></td>
                                <td><?php echo $packages[$key]->getName(); ?></td>
                                <td><?php echo $packages[$key]->getPrice(); ?></td>
                                <td><?php echo $packages[$key]->getPricePromo(); ?></td>
                                <td><?php echo $packages[$key]->getDateStart(); ?></td>
                                <td><?php echo $packages[$key]->getDateEnd(); ?></td>
                                <td><?php echo $city->getName(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="submit" value="Deletar" />
            </form>
        </div>
    </body>
</html>

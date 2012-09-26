<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/topicos2/settings.php';
include_once _URL . 'controller/core.php';
include_once _URL . 'controller/packageDAO.php';
include_once _URL . 'controller/cityDAO.php';

$privilege = isLogged();

if (isset($_REQUEST['update_id'])) {
    $id = $_REQUEST['update_id'];
    
    $controller = new packageDAO();
    $package = $controller->getPackageById($id);

    $controller2 = new cityDAO();
    $city = $controller2->getCityById($package->getIdCity());
} else {
    $id=-1;
}

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
                <li><a href="<?php echo _HTTP; ?>admin/view/packages/packages.php">Editar</a></li>
                <li><a href="<?php echo _HTTP; ?>admin/view/packages/packages_update.php">Cadastrar</a></li>
                <li><a href="<?php echo _HTTP; ?>admin/view/packages/packages_remove.php">Remover</a></li>
            </ul>
        </div>
        <div id="content">
            <form name="packages_remove" method="POST" action="packages_update.php">
                <table id="packages">
                    <tbody>
                        <tr>
                            <td>Nome: </td>
                            <td><input type="text" name="name" value="<?php if ($id!=-1) echo $package->getName(); ?>" /></td>
                        </tr>
                        <?php if ($id!=-1) : ?>
                        <tr>
                            <td>Cidade: </td>
                            <td><?php echo $city->getName(); ?>"</td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td>Preço: </td>
                            <td><input type="text" name="price" value="<?php if ($id!=-1) echo $package->getPrice(); ?>" /></td>
                        </tr>
                        <tr>
                            <td>Preço promocional: </td>
                            <td><input type="text" name="price_promo" value="<?php if ($id!=-1) echo $package->getPricePromo(); ?>" /></td>
                        </tr>
                        <tr>
                            <td>Data início: </td>
                            <td><input type="text" name="date_start" value="<?php if ($id!=-1) echo $package->getDateStart(); ?>" /></td>
                        </tr>
                        <tr>
                            <td>Data final: </td>
                            <td><input type="text" name="date_end" value="<?php if ($id!=-1) echo $package->getDateEnd(); ?>" /></td>
                        </tr>
                        <tr>
                            <td>Descrição: </td>
                            <td><textarea name="description"><?php if ($id!=-1) echo $package->getDescription(); ?></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="Atualizar" />
            </form>
        </div>
    </body>
</html>

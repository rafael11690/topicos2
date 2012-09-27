<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/settings.php';
include_once _URL . 'controller/core.php';
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
                <li><a href="<?php echo _HTTP; ?>admin/view/city/city_insert.php">Cadastrar</a></li>
            </ul>
        </div>
        <div id="content">
            <form name="city_insert" method="POST" action="insert.php">
                <table id="city">
                    <tbody>
                        <tr>
                            <td>Nome: </td>
                            <td><input type="text" name="name" value="" /></td>
                        </tr>
                        <tr>
                            <td>Estado: </td>
                            <td><input type="text" name="state" value="" /></td>
                        </tr>
                        <tr>
                            <td>País: </td>
                            <td><input type="text" name="country" value="" /></td>
                        </tr>
                        <tr>
                            <td>Descrição: </td>
                            <td><textarea name="description"></textarea></td>
                        </tr>
                        <tr>
                            <td>Miniatura: </td>
                            <td><input type="file" name="thumbnail" /></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="Inserir" />
            </form>
        </div>
    </body>
</html>

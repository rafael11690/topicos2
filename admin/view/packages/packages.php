<?php
include_once '../../controller/core.php';

$privilege = isLogged();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../style/admin.css" rel="stylesheet" type="text/css" />
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
                <li><a href="#">Cadastrar</a></li>
                <li><a href="#">Remover</a></li>
            </ul>
        </div>
        <div id="content">
            <?php
            echo 'pacotes';
            ?>
        </div>
    </body>
</html>

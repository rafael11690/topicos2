<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/topicos2/settings.php';
include_once _URL . 'controller/core.php';
include_once _URL . 'controller/cityDAO.php';
include_once _URL . 'controller/packageDAO.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="template/style.css" rel="stylesheet" type="text/css" />
        <title>Aoba's Tur - Admin</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="sidebar">
                <ul>
                    <li>Cidades</li>
                    <?php
                    $controller = new cityDAO();
                    $cities = $controller->getCities(0, 10);
                    foreach ($cities as $key => $value) :
                        ?>
                        <li><a href="index.php?city=<?php echo $cities[$key]->getIdCity(); ?>"><?php echo $cities[$key]->getName(); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="content">
                <?php
                if (isset($_GET['package'])) :

                $controller2 = new packageDAO();
                $package = $controller2->getPackageById($_GET['package']);
                
                $controller3 = new cityDAO();
                $city = $controller3->getCityById($package->getIdCity());
                ?>
                <div class="box">
                    <ul>
                        <li><?php echo $package->getName(); ?></li>
                        <li><?php echo $city->getName(); ?></li>
                        <li><?php echo $package->getPrice(); ?></li>
                        <?php if ($package->getPricePromo()) : ?>
                        <li><?php echo $package->getPricePromo(); ?></li>
                        <?php endif; ?>
                        <li><?php echo $package->getDateStart(); ?></li>
                        <li><?php echo $package->getDateEnd(); ?></li>
                    </ul>
                    <a href="insert.php?package=<?php echo $package->getIdPackage(); ?>">Cadastrar</a>
                </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </body>
</html>

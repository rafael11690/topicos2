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
        <title>Aoba's Tur</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="effect.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <span class="logo">&nbsp;</span>
            </div>
            <div id="sidebar">
                <ul>
                    <li class="title">Cidades</li>
                    <?php
                    
                    $controller = new cityDAO();
                    $cities = $controller->getCities(0, 30);
                    foreach ($cities as $key => $value) :
                    ?>
                    <li><a href="index.php?city=<?php echo $cities[$key]->getIdCity(); ?>"><?php echo $cities[$key]->getName(); ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="index.php">Todos os pacotes</a></li>
                </ul>
            </div>
            <div id="content">
                    <?php
                    if ((isset($_GET['page'])) && ($_GET['qty'])) {
                        $page = $_GET['page'];
                        $qty = $_GET['qty'];
                    } else {
                        $page = 0;
                        $qty = 6;
                    }
                    
                    $controller2 = new packageDAO();
                    
                    if (isset($_GET['city'])) {
                        $packages = $controller2->getPackagesByIdCity($_GET['city']);
                    } else {
                        $packages = $controller2->getPackages($page, $qty);
                    }
                    foreach ($packages as $package) :
                        $controller3 = new cityDAO();
                        $city = $controller3->getCityById($package->getIdCity());
                    ?>
                    <div class="box">
                        <ul>
                            <li class="city"><?php echo $city->getName(); ?></li>
                            <li class="package"><?php echo $package->getName(); ?></li>
                            <li <?php if ($package->getPricePromo()) echo 'class="old_price"'; ?>>R$<?php echo $package->getPrice(); ?></li>
                            <?php if ($package->getPricePromo()) : ?>
                            <li>R$<?php echo $package->getPricePromo(); ?></li>
                            <?php endif; ?>
                            <li>Partida: <?php echo $package->getDateStart(); ?></li>
                            <li>Retorno: <?php echo $package->getDateEnd(); ?></li>
                        </ul>
                        <a href="package.php?package=<?php echo $package->getIdPackage(); ?>">Ver mais...</a>
                    </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>

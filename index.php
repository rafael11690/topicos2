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
                    if ((isset($_GET['page'])) && ($_GET['qty'])) {
                        $page = $_GET['page'];
                        $qty = $_GET['qty'];
                    } else {
                        $page = 0;
                        $qty = 10;
                    }
                    
                    $controller2 = new packageDAO();
                    $packages = $controller2->getPackages($page, $qty);
                    foreach ($packages as $package) :
                        $controller3 = new cityDAO();
                        $city = $controller3->getCityById($package->getIdCity());
                    ?>
                    <div class="box">
                        <ul>
                            <li><?php echo $package->getName(); ?></li>
                            <li><?php echo $city->getName(); ?></li>
                            <li><?php echo $package->getPrice(); ?></li>
                            <li><?php echo $package->getDateStart(); ?></li>
                            <li><?php echo $package->getDateEnd(); ?></li>
                        </ul>
                        <a href="packge.php?package=<?php echo $packages[$key]->getIdPackage(); ?>">Ver mais...</a>
                    </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>

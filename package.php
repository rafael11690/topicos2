<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/topicos2/settings.php';
include_once _URL . 'controller/core.php';
include_once _URL . 'controller/cityDAO.php';
include_once _URL . 'controller/packageDAO.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="template/style.css" rel="stylesheet" type="text/css" />
        <title>Aoba's Tur</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div id="wrapper">
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
                if (isset($_GET['package'])) :

                $controller2 = new packageDAO();
                $package = $controller2->getPackageById($_GET['package']);
                
                $controller3 = new cityDAO();
                $city = $controller3->getCityById($package->getIdCity());
                ?>
                <div class="full_package">
                    <span class="al_center"><img src="images/<?php echo $city->getThumbnail(); ?>" width="550px" height="412px" /></span>
                    <h1><?php echo $package->getName(); ?> - <?php echo $city->getName(); ?></h1>
                    <span><?php echo $city->getDescription(); ?></span>
                    <span><?php echo $package->getDescription(); ?></span>
                    <span>Preço: <?php echo $package->getPrice(); ?></span>
                    <?php if ($package->getPricePromo()) : ?>
                    <span>Preço promocional: <?php echo $package->getPricePromo(); ?></span>
                    <?php endif; ?>
                    <span>Partida: <?php echo $package->getDateStart(); ?></span>
                    <span>Retorno: <?php echo $package->getDateEnd(); ?></span>
                    <a href="form_interest.php?package=<?php echo $package->getIdPackage(); ?>">Fazer reserva?</a>
                </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </body>
</html>

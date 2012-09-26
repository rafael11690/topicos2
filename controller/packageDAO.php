<?php

include_once 'bd.php';
include_once '../model/package.php';

class packageDAO {

    public function getPackage($idCity) {

        $con = new bd();

        $sql = 'Select * from package where id_city=' . $idCity;

        $r = $con->prepare($sql);
        $r->execute();

        $result = $r->fetch();

        $package = new form(
                        $result['idpackage'],
                        $result['id_city'],
                        $result['name'],
                        $result['description'],
                        $result['price'],
                        $result['price_promo'],
                        $result['date_start'],
                        $result['date_end'],
                        $result['id_user'],
                        $result['flag']
        );

        return $package;
    }
    
    public function getPackages($page, $qty) {

        $con = new bd();

        $sql = 'Select * from package LIMIT '. $page .','.$qty;

        $r = $con->prepare($sql);
        $r->execute();

        $packages = array();
        while ($result = $r->fetch()) {

            $packages[] = new form(
                            $result['idpackage'],
                            $result['id_city'],
                            $result['name'],
                            $result['description'],
                            $result['price'],
                            $result['price_promo'],
                            $result['date_start'],
                            $result['date_end'],
                            $result['id_user'],
                            $result['flag']
            );
        }

        return $packages;
    }

}

?>

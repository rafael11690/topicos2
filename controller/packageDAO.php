<?php

include_once 'bd.php';
include_once _URL . 'model/package.php';

class packageDAO {

    public function getPackage($idCity) {

        $con = new bd();

        $sql = 'Select * from package where id_city=' . $idCity;

        $r = $con->prepare($sql);
        $r->execute();

        $result = $r->fetch();

        $package = new package(
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

        $sql = 'Select * from package WHERE flag=1 LIMIT ' . $page . ',' . $qty;

        $r = $con->prepare($sql);
        $r->execute();

        $packages = array();
        while ($result = $r->fetch()) {

            $packages[] = new package(
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

    public function setFlag($id) {

        $con = new bd();

        $sql = 'UPDATE package SET flag=0 WHERE idpackage=' . $id;

        $r = $con->prepare($sql);
        $r->execute();
    }

    public function insert($package) {
        $con = new bd();

        $sql = 'INSERT INTO package (id_city, name, description, price, price_promo, date_start, date_end, id_user) VALUES 
            (' . $package->getIdCity() . ', "' . $package->getName() . '", 
            "' . $package->getDescription() . '", ' . $package->getPrice() . ', 
                ' . $package->getPricePromo() . ', "' . $package->getDateStart() . ', "' . $package->getDateEnd() . '", 
                    ' . $package->getIdUser() . ')';

        $r = $con->prepare($sql);
        $r->execute();
    }

    public function update($package) {
        $con = new bd();

        $sql = 'UPDATE package SET id_city=' . $package->getIdCity() . ', name="' . $package->getName() . '", 
            description="' . $package->getDescription() . '", price=' . $package->getPrice() . ', 
                price_promo=' . $package->getPricePromo() . ', date_start="' . $package->getDateStart() . ', date_end="' . $package->getDateEnd() . '", 
                    id_user=' . $package->getIdUser() . ' WHERE idpackage=' . $package->getIdPackage();

        $r = $con->prepare($sql);
        $r->execute();
    }

}

?>

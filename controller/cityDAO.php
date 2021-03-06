<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/topicos2/settings.php';
include_once 'bd.php';
include_once _URL . 'model/city.php';

class cityDAO {

    public function getCity($name) {

        $con = new bd();

        $sql = 'Select * from city where name="' . $name . '"';

        $r = $con->prepare($sql);
        $r->execute();

        $result = $r->fetch();

        $city = new city(
                        $result['idcity'],
                        $result['name'],
                        $result['state'],
                        $result['country'],
                        $result['description'],
                        $result['thumbnail'],
                        $result['id_gallery'],
                        $result['id_user']
        );

        return $city;
    }

    public function getCityById($id) {

        $con = new bd();

        $sql = 'Select * from city where idcity=' . $id;

        $r = $con->prepare($sql);
        $r->execute();

        $result = $r->fetch();

        $city = new city(
                        $result['idcity'],
                        $result['name'],
                        $result['state'],
                        $result['country'],
                        $result['description'],
                        $result['thumbnail'],
                        $result['id_gallery'],
                        $result['id_user']
        );

        return $city;
    }

    public function getCities($page, $qty) {

        $con = new bd();

        $sql = 'Select * from city  ORDER BY name LIMIT ' . $page . ',' . $qty;

        $r = $con->prepare($sql);
        $r->execute();

        $cities = array();
        while ($result = $r->fetch()) {

            $cities[] = new city(
                            $result['idcity'],
                            $result['name'],
                            $result['state'],
                            $result['country'],
                            $result['description'],
                            $result['thumbnail'],
                            $result['id_gallery'],
                            $result['id_user']
            );
        }

        return $cities;
    }
    
    public function listCities() {

        $con = new bd();

        $sql = 'Select * from city';

        $r = $con->prepare($sql);
        $r->execute();

        $cities = array();
        while ($result = $r->fetch()) {

            $cities[] = new city(
                            $result['idcity'],
                            $result['name'],
                            $result['state'],
                            $result['country'],
                            $result['description'],
                            $result['thumbnail'],
                            $result['id_gallery'],
                            $result['id_user']
            );
        }

        return $cities;
    }

    public function insert($city) {
        $con = new bd();

        $sql = 'INSERT INTO city (name, state, country, description, thumbnail, id_gallery, id_user) VALUES '
            .'("' . $city->getName() . '", "' . $city->getState() . '", '
            .'"' . $city->getCountry() . '", "' . $city->getDescription() . '", '
            .'"' . $city->getThumbnail() . '", ' . $city->getIdGallery() . ', ' . $city->getIdUser() . ')';

        $r = $con->prepare($sql);
        $r->execute();
    }

}

?>

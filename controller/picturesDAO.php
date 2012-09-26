<?php

include_once 'bd.php';
include_once '../model/pictures.php';

class picturesDAO {

    public function getPictures($idGallery) {

        $con = new bd();

        $sql = 'Select * from pictures where id_gallery=' . $idGallery;

        $r = $con->prepare($sql);
        $r->execute();

        $result = $r->fetch();

        $pictures = new pictures(
                        $result['idpictures'],
                        $result['id_gallery'],
                        $result['url'],
                        $result['legend']
        );

        return $pictures;
    }

}

?>

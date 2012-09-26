<?php

include_once 'bd.php';
include_once '../model/gallery.php';

class galleryDAO {

    public function getGallery($idcity) {
        
        $con = new bd();
        
        $sql = 'Select * from gallery where id_city='.$idcity;

        $r = $con->prepare($sql);
        $r->execute();
        
        $result = $r->fetch();
        
        $gallery = new gallery(
                $result['idgallery'],
                $result['id_city']
            );
        
        return $gallery;
    }
    
}

?>

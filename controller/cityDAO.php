<?php

include_once 'bd.php';
include_once '../model/city.php';

class cityDAO {

    public function getCity($name) {
        
        $con = new bd();
        
        $sql = 'Select * from city where name="'.$name.'"';

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
    
}

?>

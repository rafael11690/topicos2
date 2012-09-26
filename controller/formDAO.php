<?php

include_once 'bd.php';
include_once '../model/form.php';

class formDAO {

    public function getForm($idForm) {

        $con = new bd();

        $sql = 'Select * from form_interest where idform=' . $idForm;

        $r = $con->prepare($sql);
        $r->execute();

        $result = $r->fetch();

        $form = new form(
                        $result['idform'],
                        $result['id_package'],
                        $result['first_name'],
                        $result['last_name'],
                        $result['guests_number'],
                        $result['couple_room'],
                        $result['individual_room'],
                        $result['double_room'],
                        $result['triple_room'],
                        $result['observation'],
                        $result['email'],
                        $result['area_code'],
                        $result['phone'],
                        $result['newsletter']
        );

        return $form;
    }

}

?>

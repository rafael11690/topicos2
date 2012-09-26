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

    public function getForms($page, $qty) {

        $con = new bd();

        $sql = 'Select * from form_interest LIMIT ' . $page . ',' . $qty;

        $r = $con->prepare($sql);
        $r->execute();

        $forms = array();
        while ($result = $r->fetch()) {

            $forms[] = new form(
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
        }

        return $forms;
    }

    public function insert($form) {
        $con = new bd();

        $sql = "INSERT INTO form_interest (id_package, first_name, last_name, gusts_number, couple_room, individual_room, double_room, triple_room, observation, email, area_code, phone, newsletter) VALUES "
                . "(" . $form->getIdPackage() . ", '" . $form->getFirstName() . "', "
                . "'" . $form->getLastName() . "', " . $form->getGuestsNumber() . ", "
                . $form->getCoupleRoom() . ", " . $form->getIndividualRoom() . ", " . $form->getDoubleRoom() . ", "
                . $form->getTripleRoom() . ", '" . $form->getObservation() . "', '" . $form->getEmail() . "', " . $form->getAreaCode() . ", " . $form->getPhone() . ", " . $form->getNewsletter() . ")";

        $r = $con->prepare($sql);
        $r->execute();
    }

}

?>

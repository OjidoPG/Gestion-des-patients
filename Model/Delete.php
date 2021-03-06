<?php
include('Utils.php');

/**
 * Class Delete
 */
class Delete{

    /**
     * @param $id
     * @return int
     */
    public function deleteOnePatient($id){
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('DELETE FROM patient WHERE id="'.$id.'"');
        $reponse->execute();
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteOnePharmacie($id){
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('DELETE FROM pharmacie WHERE id="'.$id.'"');
        $reponse->execute();
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteOneMedecin($id){
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('DELETE FROM medecin WHERE id="'.$id.'"');
        $reponse->execute();
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteOneOrdonnance($id)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('DELETE FROM ordonnance WHERE id="'.$id.'"');
        $reponse->execute();
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }
}

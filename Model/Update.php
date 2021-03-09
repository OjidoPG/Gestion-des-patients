<?php
include('Utils.php');

/**
 * Class Update
 */
class Update
{
    /**
     * @param $id
     * @param $nom
     * @param $prenom
     * @param $sexe
     * @param $naissance
     * @param $adresse
     * @param $cp
     * @param $ville
     * @param $telephone
     * @param $ss
     * @param $caisse
     * @param $mutuelle
     * @return int
     */
    public function UpdatePatient($id, $nom, $prenom, $sexe, $naissance, $adresse, $cp, $ville, $telephone, $ss, $caisse, $mutuelle, $id_medecin, $id_pharmacie)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('UPDATE patient SET sexe=:sexe, nom=:nom, prenom=:prenom, naissance=:naissance, adresse=:adresse,
                   cp=:cp, ville=:ville, telephone=:telephone, ss=:ss, caisse=:caisse, mutuelle=:mutuelle, id_medecin=:id_medecin, id_pharmacie=:id_pharmacie WHERE id=:id');
        $reponse->execute(array(
            'sexe' => $sexe,
            'nom' => strtoupper($nom),
            'prenom' => ucfirst($prenom),
            'naissance' => $naissance,
            'adresse' => $adresse,
            'cp' => $cp,
            'ville' => strtoupper($ville),
            'telephone' => $telephone,
            'ss' => $ss,
            'caisse' => $caisse,
            'mutuelle' => $mutuelle,
            'id' => $id,
            'id_medecin' => $id_medecin,
            'id_pharmacie' => $id_pharmacie
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $id
     * @param $nom
     * @param $adresse
     * @param $cp
     * @param $ville
     * @param $telephone
     * @param $mail
     * @return int
     */
    public function UpdatePharmacie($id, $nom, $adresse, $cp, $ville, $telephone, $mail)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('UPDATE pharmacie SET nom=:nom, adresse=:adresse, cp=:cp, ville=:ville, telephone=:telephone, mail=:mail WHERE id=:id');
        $reponse->execute(array(
            'nom' => strtoupper($nom),
            'adresse' => $adresse,
            'cp' => $cp,
            'ville' => strtoupper($ville),
            'telephone' => $telephone,
            'mail' => $mail,
            'id' => $id
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $id
     * @param $nom
     * @param $prenom
     * @param $adresse
     * @param $cp
     * @param $ville
     * @param $telephone
     * @param $mail
     * @return int
     */
    public function UpdateMedecin($id, $nom, $prenom, $adresse, $cp, $ville, $telephone, $mail)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('UPDATE medecin SET nom=:nom, prenom=:prenom, adresse=:adresse, cp=:cp, ville=:ville, telephone=:telephone, mail=:mail WHERE id=:id');
        $reponse->execute(array(
            'nom' => strtoupper($nom),
            'prenom' =>ucfirst($prenom),
            'adresse' => $adresse,
            'cp' => $cp,
            'ville' => strtoupper($ville),
            'telephone' => $telephone,
            'mail' => $mail,
            'id' => $id
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $id
     * @param $debut
     * @param $fin
     * @param $id_patient
     * @param $id_medecin
     * @return int
     */
    public function UpdateOrdonnance($id, $debut, $fin, $id_patient, $id_medecin)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('UPDATE ordonnance SET debut=:debut, fin=:fin, id_patient=:id_patient, id_medecin=:id_medecin WHERE id=:id');
        $reponse->execute(array(
            'debut' => $debut,
            'fin' =>$fin,
            'id_patient' => $id_patient,
            'id_medecin' => $id_medecin,
            'id' => $id
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $id
     * @return int
     */
    public function archiverOneOrdonnance($id){
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('UPDATE ordonnance SET archive=:archive WHERE id=:id');
        $reponse->execute(array(
            'archive' => 1,
            'id' => $id
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }
}

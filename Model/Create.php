<?php
include('Utils.php');

/**
 * Class Create
 */
class Create
{

    /**
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
     * @return array
     */
    public function CreerPatient($nom, $prenom, $sexe, $naissance, $adresse, $cp, $ville, $telephone, $ss, $caisse, $mutuelle, $id_medecin, $id_pharmacie)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('INSERT INTO patient (sexe, nom, prenom, naissance, adresse, cp, ville, telephone, ss, caisse, mutuelle, id_medecin, id_pharmacie)
VALUES (:sexe,:nom,:prenom,:naissance,:adresse,:cp,:ville,:telephone,:ss,:caisse,:mutuelle, :id_medecin, :id_pharmacie)');
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
            'id_medecin' => $id_medecin,
            'id_pharmacie' => $id_pharmacie
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $nom
     * @param $adresse
     * @param $cp
     * @param $ville
     * @param $telephone
     * @param $mail
     * @return int
     */
    public function CreerPharmacie($nom, $adresse, $cp, $ville, $telephone, $mail)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('INSERT INTO pharmacie (nom, adresse, cp, ville, telephone, mail)
VALUES (:nom,:adresse,:cp,:ville,:telephone,:mail)');
        $reponse->execute(array(
            'nom' => strtoupper($nom),
            'adresse' => $adresse,
            'cp' => $cp,
            'ville' => strtoupper($ville),
            'telephone' => $telephone,
            'mail' => $mail,
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $nom
     * @param $prenom
     * @param $adresse
     * @param $cp
     * @param $ville
     * @param $telephone
     * @param $mail
     * @return int
     */
    public function CreerMedecin($nom, $prenom, $adresse, $cp, $ville, $telephone, $mail)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('INSERT INTO medecin (nom, prenom, adresse, cp, ville, telephone, mail)
VALUES (:nom, :prenom, :adresse,:cp,:ville,:telephone,:mail)');
        $reponse->execute(array(
            'nom' => strtoupper($nom),
            'prenom' => ucfirst($prenom),
            'adresse' => $adresse,
            'cp' => $cp,
            'ville' => strtoupper($ville),
            'telephone' => $telephone,
            'mail' => $mail,
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }

    /**
     * @param $debut
     * @param $fin
     * @param $id_patient
     * @param $id_medecin
     * @return int
     */
    public function CreerOrdonnance($debut, $fin, $id_patient, $id_medecin)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('INSERT INTO ordonnance (debut, fin, id_patient, id_medecin, archive)
VALUES (:debut,:fin,:id_patient,:id_medecin, :archive)');
        $reponse->execute(array(
            'debut' => $debut,
            'fin' => $fin,
            'id_patient' => $id_patient,
            'id_medecin' => $id_medecin,
            'archive' => 0
        ));
        Utils::deconnexion($reponse);
        return $reponse->rowCount();
    }
}
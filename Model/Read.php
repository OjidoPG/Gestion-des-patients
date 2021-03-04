<?php
include('Utils.php');

/**
 * Class Read
 */
class Read
{
    /**
     * @return array
     */
    public function getAllPatients()
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT * FROM patient');
        $reponse->execute();
        $tab = $reponse->fetchAll();
        Utils::deconnexion($reponse);
        return $tab;
    }

    /**
     * @param $id
     * @return array
     */
    public function getOnePatient($id)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT * FROM patient WHERE id="'.$id.'"');
        $reponse->execute();
        $tab = $reponse->fetchAll();
        Utils::deconnexion($reponse);
        return $tab;
    }

    /**
     * @param $identifiant
     * @param $mdp
     * @return bool
     */
    public function verifyConnexion($identifiant, $mdp)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT mdp FROM connexion WHERE identifiant = "' . $identifiant . '"');
        $reponse->execute();
        $tab = $reponse->fetch();
        Utils::deconnexion($reponse);
        if (password_verify($mdp, $tab[0])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array
     */
    public function getAllPharmacies()
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT * FROM pharmacie');
        $reponse->execute();
        $tab = $reponse->fetchAll();
        Utils::deconnexion($reponse);
        return $tab;
    }

    /**
     * @param $id
     * @return array
     */
    public function getOnePharmacie($id)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT * FROM pharmacie WHERE id="'.$id.'"');
        $reponse->execute();
        $tab = $reponse->fetchAll(PDO::FETCH_ASSOC);
        Utils::deconnexion($reponse);
        return $tab;
    }

    /**
     * @return array
     */
    public function getAllMedecins()
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT * FROM medecin');
        $reponse->execute();
        $tab = $reponse->fetchAll();
        Utils::deconnexion($reponse);
        return $tab;
    }

    /**
     * @param $id
     * @return array
     */
    public function getOneMedecin($id)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT * FROM medecin WHERE id="'.$id.'"');
        $reponse->execute();
        $tab = $reponse->fetchAll(PDO::FETCH_ASSOC);
        Utils::deconnexion($reponse);
        return $tab;
    }

    /**
     * @param $id
     * @return array
     */
    public function getOneOrdonnance($id)
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT * FROM ordonnance WHERE id_patient="'.$id.'"');
        $reponse->execute();
        $tab = $reponse->fetchAll(PDO::FETCH_ASSOC);
        Utils::deconnexion($reponse);
        return $tab;
    }

    public function getAllOrdonnances()
    {
        $bdd = Utils::getInstance();
        $reponse = $bdd->prepare('SELECT * FROM ordonnance ');
        $reponse->execute();
        $tab = $reponse->fetchAll();
        Utils::deconnexion($reponse);
        return $tab;
    }
}

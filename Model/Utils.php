<?php

/**
 * Class Utils
 */
class Utils
{
    private static $_instance;
    private static $_host = 'localhost';
    private static $_dbname = 'patients';
    private static $_username = 'root';
    private static $_password = 'root';

    private function __constructor()
    {
    }

    private function __clone()
    {
    }

    /**
     * @return PDO
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = Utils::connexion();
        }
        return self::$_instance;
    }

    /**
     * @return PDO
     */
    public static function connexion()
    {
        try {
            $bdd = new PDO(
                'mysql:host=' . Utils::$_host . ';dbname=' . Utils::$_dbname . ';charset=utf8', Utils::$_username, Utils::$_password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;
    }

    /**
     * @param $reponse
     */
    public static function deconnexion($reponse): void
    {
        $reponse->closeCursor();
    }

    /**
     * @param $DateDeNaissance
     * @return string
     * @throws Exception
     */
    public static function CalculAge($DateDeNaissance)
    {
        $origine = new DateTime('now');
        $target = new DateTime($DateDeNaissance);
        $diff = date_diff($origine, $target);
        return $diff->format("%Y");
    }

    /**
     * @param $sexe
     * @return array
     */
    public static function CalculCivilite($sexe)
    {
        $civilite = array();
        switch ($sexe) {
            case "0":
                $type = "Mme";
                $color = "#FF00FF";
                array_push($civilite, $type, $color);
                break;
            case "1":
                $type = "M";
                $color = "#0000FF";
                array_push($civilite, $type, $color);
                break;
            case "3":
                $type = "Inconnue";
                $color = "#FF5733";
                array_push($civilite, $type, $color);
                break;
        }
        return $civilite;
    }

    /**
     * @param $ddn
     * @return string
     */
    public static function DDNFormat($ddn)
    {
        $ddnExplode = explode("-", $ddn);
        $ddnFormat = $ddnExplode[2] . "/" . $ddnExplode[1] . "/" . $ddnExplode[0];
        return $ddnFormat;
    }

    /**
     * @param $dateFin
     * @return string
     */
    public static function BckGrndColor($dateFin)
    {
        $dateDuJour = strtotime(date('y-m-d'));
        $dateDuJour15Jours = strtotime(date('y-m-d', strtotime('+15 day')));
        $dateFin = strtotime($dateFin);
        if ($dateFin < $dateDuJour) {
            $color = "#F2D7D5";

        } else if ($dateFin < $dateDuJour15Jours) {
            $color = "#FDEBD0";
        } else {
            $color = "#D5F5E3";
        }
        return $color;
    }
}

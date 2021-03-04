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

    private function __constructor(){}
    private function __clone(){}

    /**
     * @return PDO
     */
    public static function getInstance(){
        if (self::$_instance === null){
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
                'mysql:host='.Utils::$_host.';dbname='.Utils::$_dbname.';charset=utf8',Utils::$_username,Utils::$_password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;
    }

    /**
     * @param $reponse
     */
    public static function deconnexion($reponse):void
    {
        $reponse->closeCursor();
    }
}

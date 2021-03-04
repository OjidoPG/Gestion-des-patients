<?php
include('../Model/Read.php');

if (isset($_POST['identifiant']) and isset($_POST['mdp'])) {
    $read = new Read();
    $ok = $read->verifyConnexion($_POST['identifiant'], $_POST['mdp']);
    echo json_encode(array("resultat" => $ok));
}

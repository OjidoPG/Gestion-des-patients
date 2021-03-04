<?php
include('../../Model/Update.php');

if (isset($_POST ['id']) && isset ($_POST ['nom']) && isset ($_POST ['prenom']) && isset ($_POST ['sexe']) && isset ($_POST ['naissance']) && isset ($_POST ['adresse'])
    && isset ($_POST ['cp']) && isset ($_POST ['ville']) && isset ($_POST ['telephone']) && isset ($_POST ['ss']) && isset ($_POST ['caisse'])
    && isset ($_POST ['mutuelle']) && isset ($_POST ['id_medecin'])&& isset ($_POST ['id_pharmacie']))
{
    if ($_POST ['id_medecin'] == "null"){
        $_POST ['id_medecin'] = null;
    }

    if ($_POST ['id_pharmacie'] == "null"){
        $_POST ['id_pharmacie'] = null;
    }

    $update = new Update();
    $ok = $update->UpdatePatient($_POST ['id'], $_POST ['nom'], $_POST ['prenom'], $_POST ['sexe'], $_POST ['naissance'], $_POST ['adresse'], $_POST ['cp'], $_POST ['ville'], $_POST ['telephone'],
        $_POST ['ss'], $_POST ['caisse'], $_POST ['mutuelle'], $_POST ['id_medecin'], $_POST ['id_pharmacie']);
    echo json_encode($ok);
}

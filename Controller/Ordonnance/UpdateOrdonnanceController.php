<?php
include('../../Model/Update.php');

if (isset($_POST ['id']) && isset ($_POST ['debut']) && isset ($_POST ['fin']) && isset ($_POST ['id_patient']) && isset ($_POST ['id_medecin']))
{
    $update = new Update();
    $ok = $update->UpdateOrdonnance($_POST ['id'], $_POST ['debut'], $_POST ['fin'], $_POST ['id_patient'], $_POST ['id_medecin']);
    echo json_encode($ok);
}

<?php
include('../../Model/Create.php');

if (isset ($_POST ['debut']) && isset ($_POST ['fin']) && isset ($_POST ['id_patient']) && isset ($_POST ['id_medecin']))
{
    $create = new Create();
    $ok = $create->CreerOrdonnance($_POST ['debut'], $_POST ['fin'], $_POST ['id_patient'], $_POST ['id_medecin']);
    echo json_encode($ok);
}

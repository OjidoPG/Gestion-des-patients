<?php
include('../../Model/Create.php');

if (isset ($_POST ['nom']) && isset ($_POST ['adresse']) && isset ($_POST ['cp']) && isset ($_POST ['ville']) && isset ($_POST ['telephone']) && isset ($_POST ['mail']))
{
    $create = new Create();
    $ok = $create->CreerPharmacie($_POST ['nom'], $_POST ['adresse'], $_POST ['cp'], $_POST ['ville'], $_POST ['telephone'], $_POST ['mail']);
    echo json_encode($ok);
}

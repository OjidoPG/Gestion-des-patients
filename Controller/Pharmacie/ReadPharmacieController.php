<?php
include('../../Model/Read.php');

if (isset($_POST ['id'])) {
    $read = new Read();
    $ok = $read->getOnePharmacie($_POST ['id']);
    echo json_encode($ok);
}
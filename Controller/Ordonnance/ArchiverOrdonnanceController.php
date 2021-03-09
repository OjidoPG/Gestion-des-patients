<?php
include('../../Model/Update.php');

if (isset($_POST ['id'])){
    $update = new Update();
    $ok=$update->archiverOneOrdonnance($_POST ['id']);
    echo json_encode($ok);
}

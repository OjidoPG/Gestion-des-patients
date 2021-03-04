<?php
include('../../Model/Delete.php');

if (isset($_POST ['id'])){
    $delete = new Delete();
    $ok=$delete->deleteOnePatient($_POST ['id']);
    echo json_encode($ok);
}
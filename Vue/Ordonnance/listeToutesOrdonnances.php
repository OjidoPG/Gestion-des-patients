<?php
include '../Template/header.php';
include '../../Model/Read.php';
include_once '../../Model/Utils.php';
$read = new Read();
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #d9534f">
        <h1 class="display-4" style="height: 30px"><strong>Liste de toutes les ordonnances</strong></h1>
    </div>

    <!-- Boutons d'action -->
    <div class="row" style="margin-bottom: 30px">
        <div class="col-12">
            <a href="../../accueil.php" class="btn btn-outline-danger pull-right" role="button" aria-pressed="true"
               style="width: 150px">Retour</a>
        </div>
    </div>

    <!-- Tableau -->
    <table class="table table-hover text-center sort" id="tablePharmacies">
        <thead class="thead-light">
        <tr>
            <th scope="col">Patient</th>
            <th scope="col">Date début</th>
            <th scope="col">Date fin</th>
            <th scope="col">Médecin</th>
            <th scope="col">Editer</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $ToutesOrdonnances = $read->getAllOrdonnances();
        foreach ($ToutesOrdonnances as $ordonnance) {
        if ($ordonnance['archive'] == 0) {
            $color = Utils::BckGrndColor($ordonnance['fin']);
        } else {
            $color = "#ABB2B9";
        }
        $dateDebut = Utils::DDNFormat($ordonnance['debut']);
        $dateFin = Utils::DDNFormat($ordonnance['fin']);
        $patient = $read->getOnePatient($ordonnance['id_patient']);
        $medecin = $read->getOneMedecin($ordonnance['id_medecin']);

        ?>
        <tr style="background-color: <?php echo $color ?>">
            <td><?php echo $patient[0]['nom'] ?>&nbsp<?php echo $patient[0]['prenom'] ?></td>
            <td><?php echo $ordonnance['debut'] ?></td>
            <td><?php echo $ordonnance['fin'] ?></td>
            <td><?php echo $medecin[0]['nom'] ?>&nbsp<?php echo $medecin[0]['prenom'] ?></td>
            <td><a href="../Ordonnance/editOrdonnance.php?id=<?php echo $ordonnance['id'] ?>"><i
                            class="fa fa-paper-plane"
                            style="color:#0275d8"></i></a>
            </td>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#tablePharmacies').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    });
</script>
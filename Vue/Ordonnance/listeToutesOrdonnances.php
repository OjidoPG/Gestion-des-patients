<?php
include '../Template/header.php';
include '../../Model/Read.php';
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
            $patient = $read->getOnePatient($ordonnance['id_patient']);
            $medecin = $read->getOneMedecin($ordonnance['id_medecin']);
            $dateDuJour = strtotime(date('y-m-d'));
            $dateDuJour15Jours = strtotime(date('y-m-d', strtotime('+15 day')));
            $dateFin = strtotime($ordonnance['fin']);
            if ($dateFin < $dateDuJour) {
                ?>
                <tr style="background-color: #F2D7D5">
                <?php
            } else if ($dateFin < $dateDuJour15Jours) { ?>
                <tr style="background-color: #FDEBD0 ">
                <?php
            } else {
                ?>
                <tr style="background-color: #D5F5E3">
                <?php
            }
            $dateDebutExplode = explode("-", $ordonnance['debut']);
            $ordonnance['debut'] = $dateDebutExplode[2] . "/" . $dateDebutExplode[1] . "/" . $dateDebutExplode[0];
            $dateFinExplode = explode("-", $ordonnance['fin']);
            $ordonnance['fin'] = $dateFinExplode[2] . "/" . $dateFinExplode[1] . "/" . $dateFinExplode[0];
            $patient = $read->getOnePatient($ordonnance['id_patient']);
            ?>
            <td><?php echo $patient[0]['nom'] ?>&nbsp<?php echo $patient[0]['prenom'] ?></td>
            <td><?php echo $ordonnance['debut'] ?></td>
            <td><?php echo $ordonnance['fin'] ?></td>
            <td><?php echo $medecin[0]['nom'] ?>&nbsp<?php echo $medecin[0]['prenom'] ?></td>
            <td><a href="../Ordonnance/editOrdonnance.php?id=<?php echo $ordonnance['id'] ?>"><i class="fa fa-paper-plane"
                                                                                                 style="color:#0275d8"></i></a>
            </td>
            </tr>
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
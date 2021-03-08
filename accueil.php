<?php
include 'Vue/Template/header.php';
include 'Model/Read.php';
include_once 'Model/Utils.php';
?>
<body>
<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1 class="display-4" style="height: 30px">
            <strong>Accueil</strong>
    </div>
    <div class="row" style="height: 100px"></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-4">
                <a href="Vue/Patients/listePatients.php">
                    <button type="button" class="btn btn-outline-info"
                            style="height: 200px; width: 200px; transition: 0.5s;">Patients
                    </button>
                </a>
            </div>
            <div class="col-4">
                <a href="Vue/Pharmacie/listePharmacie.php">
                    <button type="button" class="btn btn-outline-success"
                            style="height: 200px; width: 200px; transition: 0.5s">Pharmacies
                    </button>
                </a>
            </div>
            <div class="col-4">
                <a href="Vue/Medecin/listeMedecin.php">
                    <button type="button" class="btn btn-outline-primary"
                            style="height: 200px; width: 200px; transition: 0.5s">Médecins
                    </button>
                </a>
            </div>
        </div>
        <div class="row" style="height: 100px"></div>
        <div class="row text-center">
            <div class="col-4">
                <a href="Vue/Ordonnance/listeOrdonnance.php">
                    <button type="button" class="btn btn-outline-warning"
                            style="height: 200px; width: 200px; transition: 0.5s">Ordonnances en cours
                    </button>
                </a>
            </div>
            <div class="col-4">
                <a href="Vue/Ordonnance/listeToutesOrdonnances.php">
                    <button type="button" class="btn btn-outline-danger"
                            style="height: 200px; width: 200px; transition: 0.5s">Toutes les ordonnances
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row" style="height: 100px"></div>

    <div class="col-12 alert alert-danger text-center"><strong>Ordonnances à échéance</strong></div>

    <!-- Tableau -->
    <table class="table table-hover text-center sort" id="tableOrdonnances">
        <thead class="thead-light">
        <tr>
            <th scope="col">Patient</th>
            <th scope="col">Début</th>
            <th scope="col">Fin</th>
            <th scope="col">Médecin</th>
            <th scope="col">Editer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $read = new Read();
        $ToutesOrdonnance = $read->getAllOrdonnances();
        foreach ($ToutesOrdonnance as $ordonnance) {
            $color = Utils::BckGrndColor($ordonnance['fin']);
            $dateDebut = Utils::DDNFormat($ordonnance['debut']);
            $dateFin = Utils::DDNFormat($ordonnance['fin']);
            $patient = $read->getOnePatient($ordonnance['id_patient']);
            $medecin = $read->getOneMedecin($ordonnance['id_medecin']);
            if (strtotime($ordonnance['fin']) < strtotime(date('y-m-d')) ||
                strtotime($ordonnance['fin']) < strtotime(date('y-m-d', strtotime('+15 day')))) {
                ?>
                <tr style="background-color: <?php echo $color ?>">
                    <td><?php echo $patient[0]['nom'] ?>&nbsp<?php echo $patient[0]['prenom'] ?></td>
                    <td><?php echo $dateDebut ?></td>
                    <td><?php echo $dateFin ?></td>
                    <td><?php echo $medecin[0]['nom'] ?>&nbsp<?php echo $medecin[0]['prenom'] ?></td>
                    <td><a href="Vue/Ordonnance/editOrdonnance.php?id=<?php echo $ordonnance['id'] ?>"><i
                                    class="fa fa-paper-plane"
                                    style="color:#0275d8"></i></a>
                </tr>
            <?php }
        } ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<div class="row" style="height: 100px"></div>
<div class="modal-footer">
    <a href="index.php" class="btn btn-danger" role="button"
       aria-pressed="true">Quitter</a>
</div>

</div>
</body>

<script>
    $(document).ready(function () {
        $('#tableOrdonnances').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    });
</script>

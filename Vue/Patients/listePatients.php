<?php
include '../Template/header.php';
include '../../Model/Read.php';
include_once '../../Model/Utils.php';

$read = new Read();
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #5bc0de">
        <h1 class="display-4" style="height: 30px">Liste des patients</h1>
    </div>

    <!-- Boutons d'action -->
    <div class="row" style="margin-bottom: 30px">
        <div class="col-3">
            <a href="nouveauPatient.php" class="btn btn-outline-success" role="button" aria-pressed="true"
               style="width: 150px">Nouveau</a>
        </div>
        <div class="col-3 offset-6">
            <a href="../../accueil.php" class="btn btn-outline-danger pull-right" role="button" aria-pressed="true"
               style="width: 150px">Retour</a>
        </div>
    </div>

    <!-- Tableau -->
    <table class="table table-hover text-center sort" id="tablePatients">
        <thead class="thead-light">
        <tr>
            <th scope="col">Civilité</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">DDN</th>
            <th scope="col">CP</th>
            <th scope="col">Ville</th>
            <th scope="col"></i></th>
        </tr>
        </thead>
        <tbody>

        <?php
        $TousPatients = $read->getAllPatients();
        foreach ($TousPatients as $patient) {
            $civilite = Utils::CalculCivilite($patient['sexe']);
            if ($patient['naissance'] != "") {
                $ddn = Utils::DDNFormat($patient['naissance']);
            }
            ?>
            <tr>
                <td style="color: <?php echo $civilite[1] ?>"><?php echo $civilite[0] ?></td>
                <td><?php echo $patient['nom'] ?></td>
                <td><?php echo $patient['prenom'] ?></td>
                <td><?php echo $ddn ?></td>
                <td><?php echo $patient['cp'] ?></td>
                <td><?php echo $patient['ville'] ?></td>
                <td><a href="editPatient.php?id=<?php echo $patient['id'] ?>"><i class="fa fa-user-circle"
                                                                                 style="color: <?php echo $civilite[1] ?>"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#tablePatients').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    });
</script>
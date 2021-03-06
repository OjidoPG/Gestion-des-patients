<?php
include '../Template/header.php';
include '../../Model/Read.php';
$read = new Read();
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #0275d8">
        <h1 class="display-4" style="height: 30px"><strong>Liste des médecins</strong></h1>
    </div>

    <!-- Boutons d'action -->
    <div class="row" style="margin-bottom: 30px">
        <div class="col-3">
            <a href="nouveauMedecin.php" class="btn btn-outline-success" role="button" aria-pressed="true"
               style="width: 150px">Nouveau</a>
        </div>
        <div class="col-3 offset-6">
            <a href="../../accueil.php" class="btn btn-outline-danger pull-right" role="button" aria-pressed="true"
               style="width: 150px">Retour</a>
        </div>
    </div>

    <!-- Tableau -->
    <table class="table table-hover text-center sort" id="tablePharmacies">
        <thead class="thead-light">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Adresse</th>
            <th scope="col">CP</th>
            <th scope="col">Ville</th>
            <th scope="col">Téléphone</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        $TousMedecins = $read->getAllMedecins();
        foreach ($TousMedecins as $medecin) {
            ?>
            <tr>
                <td><?php echo $medecin['nom'] ?></td>
                <td><?php echo $medecin['prenom'] ?></td>
                <td><?php echo $medecin['adresse'] ?></td>
                <td><?php echo $medecin['cp'] ?></td>
                <td><?php echo $medecin['ville'] ?></td>
                <td><?php echo $medecin['telephone'] ?></td>
                <td><?php echo $medecin['mail'] ?></td>
                <td><a href="editMedecin.php?id=<?php echo $medecin['id'] ?>"><i class="fa fa-medkit" style="color:#0275d8"></i></a>
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
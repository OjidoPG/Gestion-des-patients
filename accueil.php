<?php
include 'Vue/Template/header.php';
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
            <div class="col-3">
                <a href="Vue/Patients/listePatients.php">
                    <button type="button" class="btn btn-outline-info"
                            style="height: 200px; width: 200px; transition: 0.5s;">Patients
                    </button>
                </a>
            </div>
            <div class="col-3">
                <a href="Vue/Pharmacie/listePharmacie.php">
                    <button type="button" class="btn btn-outline-success"
                            style="height: 200px; width: 200px; transition: 0.5s">Pharmacies
                    </button>
                </a>
            </div>
            <div class="col-3">
                <a href="Vue/Medecin/listeMedecin.php">
                    <button type="button" class="btn btn-outline-primary"
                            style="height: 200px; width: 200px; transition: 0.5s">Médecins
                    </button>
                </a>
            </div>
            <div class="col-3">
                <a href="Vue/Ordonnance/listeOrdonnance.php">
                    <button type="button" class="btn btn-outline-warning"
                            style="height: 200px; width: 200px; transition: 0.5s">Ordonnances
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
            <th scope="col">Nom patient</th>
            <th scope="col">Prenom patient</th>
            <th scope="col">Début ordonnance</th>
            <th scope="col">Fin ordonnance</th>
            <th scope="col">Statut</th>
            <th scope="col">Archiver</th>
        </tr>
        </thead>
        <tbody>

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

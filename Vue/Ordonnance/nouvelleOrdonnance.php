<?php
include '../Template/header.php';
include '../../Model/Read.php';

session_start();

if (isset ($_GET ['id'])) {
    $read = new Read();
    $patient = $read->getOnePatient($_GET ['id']);
}
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #f0ad4e">
        <h1 class="display-4" style="height: 30px">
            <strong>Nouvelle ordonnance</strong>
    </div>

    <!-- Etat des données -->
    <div id="div0" class="alert alert-info text-center" role="alert" style="display: block"><strong>En attente de
            données</strong></div>
    <div id="div1" class="alert alert-success text-center" role="alert" style="display: none"><strong>Ordonnance
            enregistrée</strong></div>
    <div id="div2" class="alert alert-danger text-center" role="alert" style="display: none"><strong>Erreur
            d'enregistrement, données renseignées non valide</strong></div>
    <div id="div3" class="alert alert-warning text-center" role="alert" style="display: none"><strong>Aucune donnée
            renseigné, ordonnance non créée</strong></div>

    <div class="container">
        <form method="post" action="" id="formOrdonnance" enctype="multipart/form-data">
            <input id="idPatient" data-id="<?php echo $patient[0]['id'] ?>" hidden>
            <div class="form-group row">
                <label for="nom" class="col-4 col-form-label">Nom</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="nom" disabled
                           placeholder="<?php echo $patient[0]['nom'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="adresse" class="col-4 col-form-label">Prénom</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="prenom" disabled
                           placeholder="<?php echo $patient[0]['prenom'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="debutOrdonnance" class="col-4 col-form-label">Date de début</label>
                <div class="col-6">
                    <input type="date" class="form-control" id="debutOrdonnance">
                </div>
            </div>
            <div class="form-group row">
                <label for="finOrdonnance" class="col-4 col-form-label">Date de fin</label>
                <div class="col-6">
                    <input type="date" class="form-control" id="finOrdonnance">
                </div>
            </div>

            <!-- Médecin -->
            <div class="form-group row">
                <label class="col-form-label col-4" for="medecin"><strong style="color:#0275d8">Medecin
                        prescripteur</strong></label>
                <div class="col-6">
                    <select class="custom-select" id="medecin" style="color:#0275d8">
                        <option selected value="null">Liste des médecins enregistrés</option>
                        <?php
                        $TousMedecins = $read->getAllMedecins();
                        foreach ($TousMedecins as $medecin) { ?>
                            <option value="<?php echo $medecin['id'] ?>"><?php echo $medecin['nom'] ?>
                                &nbsp<?php echo $medecin['prenom'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <a href="../Patients/editPatient.php?id=<?php echo $patient[0]['id'] ?>" class="btn btn-secondary"
                   role="button"
                   aria-pressed="true">Retour</a>
                </button>
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    </div>

</div>
</body>

<script>
    jQuery(function () {

        $("#medecin").on('change', function () {
            $.ajax({
                method: "POST",
                url: "../../Controller/Medecin/ReadMedecinController.php",
                dataType: "json",
                data: {
                    'id': $('#medecin option:selected').val()
                }
            })
        })

        $("#formOrdonnance").on('submit', function (e) {
            e.preventDefault();
            if ($("#debutOrdonnance").val() != "" && $("#finOrdonnance").val() != "") {
                $.ajax({
                    method: "POST",
                    url: "../../Controller/Ordonnance/EnregistrerOrdonnanceController.php",
                    dataType: "json",
                    data:
                        {
                            'debut': $("#debutOrdonnance").val(),
                            'fin': $("#finOrdonnance").val(),
                            'id_patient': $('#idPatient').data('id'),
                            'id_medecin': $('#medecin option:selected').val()
                        }
                }).done(function (data) {
                    if (JSON.parse(data) == 1) {
                        $("#div0").css("display", "none");
                        $("#div1").css("display", "block");
                        $("#div2").css("display", "none");
                        $("#div3").css("display", "none");
                    } else {
                        $("#div0").css("display", "none");
                        $("#div1").css("display", "none");
                        $("#div2").css("display", "block");
                        $("#div3").css("display", "none");
                    }
                })
            } else {
                $("#div0").css("display", "none");
                $("#div1").css("display", "none");
                $("#div2").css("display", "none");
                $("#div3").css("display", "block");
            }
        })
    })
</script>


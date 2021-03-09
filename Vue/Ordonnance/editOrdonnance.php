<?php
include '../Template/header.php';
include '../../Model/Read.php';

if (isset ($_GET ['id'])) {
    $read = new Read();
    $ordonnance = $read->getOneOrdonnanceFromOrdo($_GET ['id']);
    $patientOrdo = $read->getOnePatient($ordonnance[0]['id_patient']);
    $medecinOrdo = $read->getOneMedecin($ordonnance[0]['id_medecin']);
}
if ($ordonnance[0]['archive'] == 1) {
    $disabled = "disabled";
} else {
    $disabled = "";
}
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #f0ad4e">
        <h1 class="display-4" style="height: 30px">
            <strong>Ordonnance en cours</strong>
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
    <div id="div4" class="alert alert-success text-center" role="alert" style="display: none"><strong>Ordonnance
            archivée</strong></div>
    <div id="div5" class="alert alert-danger text-center" role="alert" style="display: none"><strong>Ordonnance
            supprimée</strong></div>

    <div class="container">
        <form method="post">
            <input id="idPatient" data-id="<?php echo $patientOrdo[0]['id'] ?>" hidden>
            <input id="idDateDebut" data-debut="<?php echo $ordonnance[0]['debut'] ?>" hidden>
            <input id="idDateFin" data-fin="<?php echo $ordonnance[0]['fin'] ?>" hidden>
            <input id="idOrdonnance" data-id="<?php echo $ordonnance[0]['id'] ?>" hidden>
            <div class="form-group row">
                <label for="nom" class="col-4 col-form-label">Nom</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="nom" disabled
                           placeholder="<?php echo $patientOrdo[0]['nom'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="adresse" class="col-4 col-form-label">Prénom</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="prenom" disabled
                           placeholder="<?php echo $patientOrdo[0]['prenom'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="debutOrdonnance" class="col-4 col-form-label">Date de début</label>
                <div class="col-6">
                    <input type="date" class="form-control" id="debutOrdonnance" <?php echo $disabled ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="finOrdonnance" class="col-4 col-form-label">Date de fin</label>
                <div class="col-6">
                    <input type="date" class="form-control" id="finOrdonnance" <?php echo $disabled ?>>
                </div>
            </div>
            <!-- Médecin -->
            <div class="form-group row">
                <label class="col-form-label col-4" for="medecin"><strong style="color:#0275d8">Medecin
                        prescripteur</strong></label>
                <div class="col-6">
                    <select class="custom-select" id="medecin" style="color:#0275d8" <?php echo $disabled ?>>
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
        </form>
    </div>
    <div class="modal-footer">
        <a href="../../accueil.php" class="btn btn-secondary" role="button"
           aria-pressed="true">Retour accueil</a>
        <a href="../Patients/editPatient.php?id=<?php echo $patientOrdo[0]['id'] ?>" class="btn btn-info" role="button"
           aria-pressed="true">Retour patient</a>
        <?php
        if ($ordonnance[0]['archive'] == 0) {
            ?>
            <button type="button" id="updateButtonOrdonnance" class="btn btn-success">
                Sauvegarder
            </button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#archiveModal">
                Archiver
            </button>
            <?php
        }
        ?>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#suppressionModal">
            Supprimer
        </button>
    </div>

    <!-- Modale de suppression-->
    <div class="modal fade" tabindex="-1" role="dialog" id="suppressionModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Confirmez-vous la suppression de l'ordonnance</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                    <button type="button" class="btn btn-danger" onclick="SupprimerOrdonnance()">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale d'archivage-->
    <div class="modal fade" tabindex="-1" role="dialog" id="archiveModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: red">Archivage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Confirmez-vous l'archivage de l'ordonnance</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                    <button type="button" class="btn btn-danger" onclick="ArchiverOrdonnance()">Archiver</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    jQuery(function () {
        $("#debutOrdonnance").val($("#idDateDebut").data('debut'));
        $("#finOrdonnance").val($("#idDateFin").data('fin'));
        $("#medecin").val(<?php echo $medecinOrdo[0]['id'] ?>);

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

        $("#updateButtonOrdonnance").on('click', function () {
            event.preventDefault();
            if ($("#debutOrdonnance").val() != "" && $("#finOrdonnance").val() != "") {
                $.ajax({
                    method: "POST",
                    url: "../../Controller/Ordonnance/UpdateOrdonnanceController.php",
                    dataType: "json",
                    data:
                        {
                            'id': $('#idOrdonnance').data('id'),
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
                        $("#div4").css("display", "none");
                        $("#div5").css("display", "none");
                    } else {
                        $("#div0").css("display", "none");
                        $("#div1").css("display", "none");
                        $("#div2").css("display", "block");
                        $("#div3").css("display", "none");
                        $("#div4").css("display", "none");
                        $("#div5").css("display", "none");
                    }
                })
            } else {
                $("#div0").css("display", "none");
                $("#div1").css("display", "none");
                $("#div2").css("display", "none");
                $("#div3").css("display", "block");
                $("#div4").css("display", "none");
                $("#div5").css("display", "none");
            }
        })
    })

    function SupprimerOrdonnance() {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../Controller/Ordonnance/SupprimerOrdonnanceController.php",
            dataType: "json",
            data:
                {
                    'id': $('#idOrdonnance').data('id')
                },
        }).done(function (data) {
            if (JSON.parse(data) == 1) {
                $("#div0").css("display", "none");
                $("#div1").css("display", "none");
                $("#div2").css("display", "none");
                $("#div3").css("display", "none");
                $("#div4").css("display", "none");
                $("#div5").css("display", "block");
            } else {
                $("#div0").css("display", "none");
                $("#div1").css("display", "none");
                $("#div2").css("display", "none");
                $("#div3").css("display", "block");
                $("#div4").css("display", "none");
                $("#div5").css("display", "none");
            }
        })
    };

    function ArchiverOrdonnance() {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../Controller/Ordonnance/ArchiverOrdonnanceController.php",
            dataType: "json",
            data:
                {
                    'id': $('#idOrdonnance').data('id')
                },
        }).done(function (data) {
            if (JSON.parse(data) == 1) {
                $("#div0").css("display", "none");
                $("#div1").css("display", "none");
                $("#div2").css("display", "none");
                $("#div3").css("display", "none");
                $("#div4").css("display", "block");
                $("#div5").css("display", "none");
            } else {
                $("#div0").css("display", "none");
                $("#div1").css("display", "none");
                $("#div2").css("display", "none");
                $("#div3").css("display", "block");
                $("#div4").css("display", "none");
                $("#div5").css("display", "none");
            }
        })
    }
</script>



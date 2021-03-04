<?php
include '../Template/header.php';
include '../../Model/Read.php';

$id = $_GET['id'];
$read = new Read();
$medecin = $read->getOneMedecin($id);
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #0275d8">
        <h1 class="display-4" style="height: 30px">
            <strong><?php echo $medecin[0]['nom'] ?>&nbsp;<?php echo $medecin[0]['prenom'] ?></strong>
    </div>

    <!-- Etat des données -->
    <div id="div0" class="alert alert-info text-center" role="alert" style="display: block"><strong>Données du médecin</strong></div>
    <div id="div1" class="alert alert-success text-center" role="alert" style="display: none"><strong>Données
            modifiées</strong></div>
    <div id="div2" class="alert alert-warning text-center" role="alert" style="display: none"><strong>Aucune donnée
            modifiée</strong></div>
    <div id="div3" class="alert alert-danger text-center" role="alert" style="display: none"><strong>Erreur de
            modification</strong></div>
    <div id="div4" class="alert alert-danger text-center" role="alert" style="display: none"><strong>Médecin
            supprimée</strong></div>

    <!-- Affichage données de la pharmacie -->
    <div class="container">
        <form method="post">
            <input type="hidden" id="idPharmacie" data-id="<?php echo $id ?>">
            <div class="form-group row">
                <label for="nom" class="col-4 col-form-label">Nom</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="nom"
                           value="<?php echo $medecin[0]['nom'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="prenom" class="col-4 col-form-label">Prénom</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="prenom"
                           value="<?php echo $medecin[0]['prenom'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="adresse" class="col-4 col-form-label">Adresse</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="adresse"
                           value="<?php echo $medecin[0]['adresse'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="cp" class="col-4 col-form-label">Code postal</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="cp"
                           value="<?php echo $medecin[0]['cp'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="ville" class="col-4 col-form-label">Ville</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="ville"
                           value="<?php echo $medecin[0]['ville'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="telephone" class="col-4 col-form-label">Téléphone</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="telephone"
                           value="<?php echo $medecin[0]['telephone'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="mail" class="col-4 col-form-label">E-mail</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="mail"
                           value="<?php echo $medecin[0]['mail'] ?>">
                </div>
            </div>

            <div class="modal-footer">
                <a href="listeMedecin.php" class="btn btn-secondary" role="button"
                   aria-pressed="true">Retour</a>
                <button type="button" class="btn btn-success" onclick="SauvegarderMedecin()">
                    Sauvegarder
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#suppressionModal"
                ">
                Supprimer
                </button>
            </div>
        </form>
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
                    <p>Confirmez-vous la suppression de
                        <strong><?php echo $medecin[0]['nom'] ?>&nbsp;<?php echo $medecin[0]['prenom'] ?></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                    <button type="button" class="btn btn-danger" onclick="SupprimerMedecin()">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    function SauvegarderMedecin() {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../Controller/Medecin/UpdateMedecinController.php",
            dataType: "json",
            data:
                {
                    'id': $("#idPharmacie").data('id'),
                    'nom': $("#nom").val(),
                    'prenom': $("#prenom").val(),
                    'adresse': $("#adresse").val(),
                    'cp': $("#cp").val(),
                    'ville': $("#ville").val(),
                    'telephone': $("#telephone").val(),
                    'mail': $("#mail").val()
                }
        }).done(function (data) {
            $("#div1").css("display", "none");
            $("#div2").css("display", "none");
            $("#div3").css("display", "none");
            $("#div4").css("display", "none");
            switch (JSON.parse(data)) {
                case 0 :
                    $("#div0").css("display", "none");
                    $("#div1").css("display", "none");
                    $("#div2").css("display", "block");
                    $("#div3").css("display", "none");
                    $("#div4").css("display", "none");
                    break;
                case 1 :
                    $("#div0").css("display", "none");
                    $("#div1").css("display", "block");
                    $("#div2").css("display", "none");
                    $("#div3").css("display", "none");
                    $("#div4").css("display", "none");
                    break;
                default :
                    $("#div0").css("display", "none");
                    $("#div1").css("display", "none");
                    $("#div2").css("display", "none");
                    $("#div3").css("display", "block");
                    $("#div4").css("display", "none");
                    break;
            }
        });
    }

    function SupprimerMedecin() {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../Controller/Medecin/SupprimerMedecinController.php",
            dataType: "json",
            data:
                {
                    'id': <?php echo $id ?>
                },
        }).done(function (data) {
            if (JSON.parse(data) == 1) {
                $("#div0").css("display", "none");
                $("#div1").css("display", "none");
                $("#div2").css("display", "none");
                $("#div3").css("display", "none");
                $("#div4").css("display", "block");
            } else {
                $("#div0").css("display", "none");
                $("#div1").css("display", "none");
                $("#div2").css("display", "none");
                $("#div3").css("display", "block");
                $("#div4").css("display", "none");
            }
        })
    };
</script>


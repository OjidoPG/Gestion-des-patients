<?php
include '../Template/header.php';
include '../../Model/Read.php';
$read = new Read();
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #5cb85c">
        <h1 class="display-4" style="height: 30px">
            <strong>Nouvelle pharmacie</strong>
    </div>

    <!-- Etat des données -->
    <div id="div0" class="alert alert-info text-center" role="alert" style="display: block"><strong>En attente de
            données</strong></div>
    <div id="div1" class="alert alert-success text-center" role="alert" style="display: none"><strong>Pharmacie
            enregistrée</strong></div>
    <div id="div2" class="alert alert-danger text-center" role="alert" style="display: none"><strong>Erreur
            d'enregistrement, données renseignées non valide</strong></div>
    <div id="div3" class="alert alert-warning text-center" role="alert" style="display: none"><strong>Aucune donnée
            renseigné, pharmacie non créée</strong></div>

    <div class="container">
        <form method="post">
            <div class="form-group row">
                <label for="nom" class="col-4 col-form-label">Nom</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="nom"
                           placeholder="Nom">
                </div>
            </div>
            <div class="form-group row">
                <label for="adresse" class="col-4 col-form-label">Adresse</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="adresse"
                           placeholder="Adresse">
                </div>
            </div>
            <div class="form-group row">
                <label for="cp" class="col-4 col-form-label">Code postal</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="cp"
                           placeholder="Code postal">
                </div>
            </div>
            <div class="form-group row">
                <label for="ville" class="col-4 col-form-label">Ville</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="ville"
                           placeholder="Ville">
                </div>
            </div>
            <div class="form-group row">
                <label for="telephone" class="col-4 col-form-label">Téléphone</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="telephone"
                           placeholder="Téléphone">
                </div>
            </div>
            <div class="form-group row">
                <label for="mail" class="col-4 col-form-label">E-mail</label>
                <div class="col-6">
                    <input type="text" class="form-control" id="mail"
                           placeholder="E-mail">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="listePharmacie.php" class="btn btn-secondary" role="button" aria-pressed="true">Retour</a>
        </button>
        <button type="button" id="enregistrerButton" class="btn btn-success">
            Enregistrer
        </button>
    </div>
</div>
</body>

<script>
    jQuery(function () {

        $("#enregistrerButton").on('click', function () {
            event.preventDefault();
            if ($("#nom").val() !== "") {
                $.ajax({
                    method: "POST",
                    url: "../../Controller/Pharmacie/EnregistrerPharmacieController.php",
                    dataType: "json",
                    data:
                        {
                            'nom': $("#nom").val(),
                            'adresse': $("#adresse").val(),
                            'cp': $("#cp").val(),
                            'ville': $("#ville").val(),
                            'telephone': $("#telephone").val(),
                            'mail': $("#mail").val()
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

<?php
include '../Template/header.php';
include '../../Model/Read.php';
$read = new Read();
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #5bc0de">
        <h1 class="display-4" style="height: 30px">
            <strong>Nouveau patient</strong>
    </div>

    <!-- Etat des données -->
    <div id="div0" class="alert alert-info text-center" role="alert" style="display: block"><strong>En attente de
            données</strong></div>
    <div id="div1" class="alert alert-success text-center" role="alert" style="display: none"><strong>Patient
            enregistré</strong></div>
    <div id="div2" class="alert alert-danger text-center" role="alert" style="display: none"><strong>Erreur
            d'enregistrement, données renseignées non valide</strong></div>
    <div id="div3" class="alert alert-warning text-center" role="alert" style="display: none"><strong>Aucune donnée
            renseigné, patient non créé</strong></div>

    <form method="post">
        <div class="row">
            <!-- Patient -->
            <div class="col-6">
                <div class="form-group row">
                    <label for="nom" class="col-4 col-form-label">Nom</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="nom"
                               placeholder="Nom">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenom" class="col-4 col-form-label">Prénom</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="prenom"
                               placeholder="Prénom">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4 col-form-label">Sexe</label>
                    <div class="form-check col-2 text-center">
                        <input class="form-check-input" name="sexeType" type="radio"
                               id="sexeHomme"
                        >
                        <label class="form-check-label" for="sexeHomme" style="color: #0000FF">
                            Homme
                        </label>
                    </div>
                    <div class="form-check col-2 text-center">
                        <input class="form-check-input" name="sexeType" type="radio"
                               id="sexeFemme"
                        >
                        <label class="form-check-label" for="sexeFemme" style="color: #FF00FF">
                            Femme
                        </label>
                    </div>
                    <div class="form-check col-2 text-center">
                        <input class="form-check-input" name="sexeType" type="radio"
                               id="sexeInconnu"
                        >
                        <label class="form-check-label" for="sexeFemme" style="color: #FF5733">
                            Inconnu
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="naissance" class="col-4 col-form-label">DDN</label>
                    <div class="col-6">
                        <input type="date" class="form-control" id="naissance"
                               placeholder="Date de naissance">
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
                    <label for="ss" class="col-4 col-form-label">Sécurité sociale</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="ss"
                               placeholder="Sécurité sociale">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="caisse" class="col-4 col-form-label">Caisse</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="caisse"
                               placeholder="Caisse">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mutuelle" class="col-4 col-form-label">Mutuelle</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="mutuelle"
                               placeholder="Mutuelle">
                    </div>
                </div>
            </div>

            <!-- Pharmacie -->
            <div class="col-6">

                <div class="form-group row">
                    <label class="col-form-label col-4" for="pharmacie"><strong style="color:#5cb85c">Pharmacie</strong></label>
                    <div class="col-6">
                        <select class="custom-select" id="pharmacie" style="color:#5cb85c">
                            <option selected value="null">Liste des pharmacies enregistrées</option>
                            <?php
                            $ToutesPharmacies = $read->getAllPharmacies();
                            foreach ($ToutesPharmacies as $pharmacie) { ?>
                                <option value="<?php echo $pharmacie['id'] ?>"><?php echo $pharmacie['nom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adressePharma" class="col-4 col-form-label">Adresse</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="adressePharma"
                               placeholder="Adresse pharmacie">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cpPharma" class="col-4 col-form-label">Code postal</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="cpPharma"
                               placeholder="Code postal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="villePharma" class="col-4 col-form-label">Ville</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="villePharma"
                               placeholder="Ville">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephonePharma" class="col-4 col-form-label">Téléphone</label>
                    <div class="col-6">
                        <input type="tel" class="form-control" id="telephonePharma"
                               placeholder="Téléphone">
                    </div>
                </div>

                <!-- Médecin -->
                <div class="form-group row">
                    <label class="col-form-label col-4" for="medecin"><strong style="color:#0275d8">Medecin</strong></label>
                    <div class="col-6">
                        <select class="custom-select" id="medecin" style="color:#0275d8">
                            <option selected value="null">Liste des médecins enregistrés</option>
                            <?php
                            $TousMedecins = $read->getAllMedecins();
                            foreach ($TousMedecins as $medecin) { ?>
                                <option value="<?php echo $medecin['id'] ?>"><?php echo $medecin['nom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adresseMed" class="col-4 col-form-label">Adresse medecin traitant</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="adresseMed"
                               placeholder="Adresse medecin traitant">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cpMed" class="col-4 col-form-label">Code postal</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="cpMed"
                               placeholder="Code postal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="villeMed" class="col-4 col-form-label">Ville</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="villeMed"
                               placeholder="Ville">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephoneMed" class="col-4 col-form-label">Téléphone</label>
                    <div class="col-6">
                        <input type="tel" class="form-control" id="telephoneMed"
                               placeholder="Téléphone">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mailMed" class="col-4 col-form-label">E-mail</label>
                    <div class="col-6">
                        <input type="email" class="form-control" id="mailMed"
                               placeholder="E-mail">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal-footer">
        <a href="listePatients.php" class="btn btn-secondary" role="button" aria-pressed="true">Retour</a>
        </button>
        <button type="button" id="enregistrerButton" class="btn btn-success">
            Enregistrer
        </button>
    </div>
</div>
</body>

<script>
    jQuery(function () {

        $("#pharmacie").on('change', function () {
            $.ajax({
                method: "POST",
                url: "../../Controller/Pharmacie/ReadPharmacieController.php",
                dataType: "json",
                data: {
                    'id': $('#pharmacie option:selected').val()
                }
            }).done(function (data)
            {
                $("#adressePharma").val(data[0]['adresse']);
                $("#cpPharma").val(data[0]['cp']);
                $("#villePharma").val(data[0]['ville']);
                $("#telephonePharma").val(data[0]['telephone']);
            })
        })

        $("#medecin").on('change', function () {
            $.ajax({
                method: "POST",
                url: "../../Controller/Medecin/ReadMedecinController.php",
                dataType: "json",
                data: {
                    'id': $('#medecin option:selected').val()
                }
            }).done(function (data)
            {
                $("#adresseMed").val(data[0]['adresse']);
                $("#cpMed").val(data[0]['cp']);
                $("#villeMed").val(data[0]['ville']);
                $("#telephoneMed").val(data[0]['telephone']);
                $("#mailMed").val(data[0]['mail']);
            })
        })

        $("#enregistrerButton").on('click', function () {
            event.preventDefault();
            if ($("#sexeHomme").prop('checked') == true) {
                $sexe = "1";
            } else if ($("#sexeFemme").prop('checked') == true) {
                $sexe = "0";
            } else if ($("#sexeInconnu").prop('checked') == true) {
                $sexe = "3";
            } else {
                $sexe = "3";
            }

            if ($("#nom").val() !== "") {
                $.ajax({
                    method: "POST",
                    url: "../../Controller/Patients/EnregistrerPatientController.php",
                    dataType: "json",
                    data:
                        {
                            'nom': $("#nom").val(),
                            'prenom': $("#prenom").val(),
                            'sexe': $sexe,
                            'naissance': $("#naissance").val(),
                            'adresse': $("#adresse").val(),
                            'cp': $("#cp").val(),
                            'ville': $("#ville").val(),
                            'telephone': $("#telephone").val(),
                            'ss': $("#ss").val(),
                            'caisse': $("#caisse").val(),
                            'mutuelle': $("#mutuelle").val(),
                            'id_medecin' : $('#medecin option:selected').val(),
                            'id_pharmacie' : $('#pharmacie option:selected').val()
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

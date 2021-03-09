<?php
include '../Template/header.php';
include '../../Model/Read.php';
include_once '../../Model/Utils.php';

$id = $_GET['id'];
$read = new Read();
$patient = $read->getOnePatient($id);

$age = Utils::CalculAge($patient[0]['naissance']);
?>

<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center" style="background-color: #5bc0de">
        <h1 class="display-4 align-self-center" style="height: 30px">
            <strong><?php echo $patient[0]['nom'] ?>&nbsp;<?php echo $patient[0]['prenom'] ?></strong>
    </div>

    <!-- Etat des données -->
    <div id="div0" class="alert alert-info text-center" role="alert" style="display: block"><strong>Données du
            patient</strong></div>
    <div id="div1" class="alert alert-success text-center" role="alert" style="display: none"><strong>Données
            modifiées</strong></div>
    <div id="div2" class="alert alert-warning text-center" role="alert" style="display: none"><strong>Aucune donnée
            modifiée</strong></div>
    <div id="div3" class="alert alert-danger text-center" role="alert" style="display: none"><strong>Erreur de
            modification</strong></div>
    <div id="div4" class="alert alert-danger text-center" role="alert" style="display: none"><strong>Patient
            supprimé</strong></div>

    <!-- Affichage données du patient -->
    <form method="post">
        <div class="row">
            <input type="hidden" id="idPatient" data-id="<?php echo $id ?>">
            <input type="hidden" id="id_pharmacie" data-id="<?php echo $patient[0]['id_pharmacie'] ?>">
            <input type="hidden" id="id_medecin" data-id="<?php echo $patient[0]['id_medecin'] ?>">
            <!-- Patient -->
            <div class="col-6">
                <div class="form-group row">
                    <label for="nom" class="col-4 col-form-label">Nom</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="nom"
                               value="<?php echo $patient[0]['nom'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenom" class="col-4 col-form-label">Prénom</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="prenom"
                               value="<?php echo $patient[0]['prenom'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sexe" class="col-4 col-form-label">Sexe</label>
                    <div class="form-check col-2 text-center">
                        <input class="form-check-input" name="sexeType" type="radio"
                               id="sexeHomme"
                            <?php if ($patient[0]["sexe"] == "1") {
                                echo("checked");
                            } ?>
                        >
                        <label class="form-check-label" for="sexeHomme" style="color: #0000FF">
                            Homme
                        </label>
                    </div>
                    <div class="form-check col-2 text-center">
                        <input class="form-check-input" name="sexeType" type="radio"
                               id="sexeFemme"
                            <?php if ($patient[0]["sexe"] == "0") {
                                echo("checked");
                            } ?>
                        >
                        <label class="form-check-label" for="sexeFemme" style="color: #FF00FF">
                            Femme
                        </label>
                    </div>
                    <div class="form-check col-2 text-center">
                        <input class="form-check-input" name="sexeType" type="radio"
                               id="sexeInconnu"
                            <?php if ($patient[0]["sexe"] == "3") {
                                echo("checked");
                            } ?>
                        >
                        <label class="form-check-label" for="sexeInconnu" style="color: #FF5733">
                            Inconnu
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="naissance" class="col-4 col-form-label">DDN</label>
                    <div class="col-6">
                        <input type="date" class="form-control" id="naissance"
                               value="<?php echo $patient[0]['naissance'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="age" class="col-4 col-form-label">Age</label>
                    <div class="col-6">
                        <input type="text" disabled class="form-control" id="age"
                               value="<?php echo $age ?> ans">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adresse" class="col-4 col-form-label">Adresse</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="adresse"
                               value="<?php echo $patient[0]['adresse'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cp" class="col-4 col-form-label">Code postal</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="cp"
                               value="<?php echo $patient[0]['cp'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ville" class="col-4 col-form-label">Ville</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="ville"
                               value="<?php echo $patient[0]['ville'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephone" class="col-4 col-form-label">Téléphone</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="telephone"
                               value="<?php echo $patient[0]['telephone'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ss" class="col-4 col-form-label">Sécurité sociale</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="ss"
                               value="<?php echo $patient[0]['ss'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="caisse" class="col-4 col-form-label">Caisse</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="caisse"
                               value="<?php echo $patient[0]['caisse'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mutuelle" class="col-4 col-form-label">Mutuelle</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="mutuelle"
                               value="<?php echo $patient[0]['mutuelle'] ?>">
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
                <div class="form-group row">
                    <label for="mailPharm" class="col-4 col-form-label">E-mail</label>
                    <div class="col-6">
                        <input type="email" class="form-control" id="mailPharm"
                               placeholder="E-mail">
                    </div>
                </div>

                <!-- Médecin -->
                <div class="form-group row">
                    <label class="col-form-label col-4" for="medecin"><strong
                                style="color:#0275d8">Medecin</strong></label>
                    <div class="col-6">
                        <select class="custom-select" id="medecin" style="color:#0275d8">
                            <option selected value="null">Liste des médecins enregistrés</option>
                            <?php
                            $TousMedecins = $read->getAllMedecins();
                            foreach ($TousMedecins as $medecin) { ?>
                                <option value="<?php echo $medecin['id'] ?>"><?php echo $medecin['nom'] ?>
                                    &nbsp;<?php echo $medecin['prenom'] ?></option>
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

        <div class="modal-footer">
            <a href="listePatients.php" class="btn btn-secondary" role="button"
               aria-pressed="true">Retour</a>
            <button type="button" class="btn btn-success" onclick="SauvegarderPatient()">
                Sauvegarder
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#suppressionModal">
                Supprimer
            </button>
        </div>

        <!-- Ordonnance -->
        <div class="col-12 alert alert-info text-center"><strong>Ordonnances</strong></div>
        <div class="col-4 offset-4 text-center">
            <a href="../Ordonnance/nouvelleOrdonnance.php?id=<?php echo $patient[0]['id'] ?>">
                <button type="button" class="btn btn-success"
                >Nouvelle ordonnance
                </button>
            </a>
        </div>

        <!-- Tableau -->
        <table class="table table-hover text-center sort" id="tableEditOrdonnances">
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
            $ToutesOrdonnance = $read->getOneOrdonnance($patient[0]['id']);
            foreach ($ToutesOrdonnance as $ordonnance) {
                if ($ordonnance['archive'] == 0) {
                    $color = Utils::BckGrndColor($ordonnance['fin']);
                } else {
                    $color = "#ABB2B9";
                }
                $dateDebut = Utils::DDNFormat($ordonnance['debut']);
                $dateFin = Utils::DDNFormat($ordonnance['fin']);
                $patient = $read->getOnePatient($ordonnance['id_patient']);
                $medecin = $read->getOneMedecin($ordonnance['id_medecin']);
                ?>
                <tr style="background-color: <?php echo $color ?>">
                    <td><?php echo $patient[0]['nom'] ?>&nbsp<?php echo $patient[0]['prenom'] ?></td>
                    <td><?php echo $dateDebut ?></td>
                    <td><?php echo $dateFin ?></td>
                    <td><?php echo $medecin[0]['nom'] ?>&nbsp<?php echo $medecin[0]['prenom'] ?></td>
                    <td><a href="../Ordonnance/editOrdonnance.php?id=<?php echo $ordonnance['id'] ?>"><i
                                    class="fa fa-paper-plane"
                                    style="color:#0275d8"></i></a>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </form>

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
                        <strong><?php echo $patient[0]['nom'] ?><?php echo $patient[0]['prenom'] ?></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitter</button>
                    <button type="button" class="btn btn-danger" onclick="SupprimerPatient()">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    jQuery(function () {

        $('#tableEditOrdonnances').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });


        /** Complétion automatique des données de la pharmacie du patient **/
        if ($("#id_pharmacie").data('id') != "") {
            $.ajax({
                method: "POST",
                url: "../../Controller/Pharmacie/ReadPharmacieController.php",
                dataType: "json",
                data: {
                    'id': $("#id_pharmacie").data('id')
                }
            }).done(function (data) {
                $("#pharmacie").val($("#id_pharmacie").data('id')).change();
                $("#adressePharma").val(data[0]['adresse']);
                $("#cpPharma").val(data[0]['cp']);
                $("#villePharma").val(data[0]['ville']);
                $("#telephonePharma").val(data[0]['telephone']);
                $("#mailPharm").val(data[0]['mail']);
            })
        }

        /** Complétion automatique des données du médecin du patient **/
        if ($("#id_medecin").data('id') != "") {
            $.ajax({
                method: "POST",
                url: "../../Controller/Medecin/ReadMedecinController.php",
                dataType: "json",
                data: {
                    'id': $("#id_medecin").data('id')
                }
            }).done(function (data) {
                $("#medecin").val($("#id_medecin").data('id')).change();
                $("#adresseMed").val(data[0]['adresse']);
                $("#cpMed").val(data[0]['cp']);
                $("#villeMed").val(data[0]['ville']);
                $("#telephoneMed").val(data[0]['telephone']);
                $("#mailMed").val(data[0]['mail']);
            })
        }

        /** Complétion automatique des données de la pharmacie si changement **/
        $("#pharmacie").on('change', function () {
            $.ajax({
                method: "POST",
                url: "../../Controller/Pharmacie/ReadPharmacieController.php",
                dataType: "json",
                data: {
                    'id': $('#pharmacie option:selected').val()
                }
            }).done(function (data) {
                $("#adressePharma").val(data[0]['adresse']);
                $("#cpPharma").val(data[0]['cp']);
                $("#villePharma").val(data[0]['ville']);
                $("#telephonePharma").val(data[0]['telephone']);
                $("#mailPharm").val(data[0]['mail']);
            })
        })

        /** Complétion automatique des données du médecin si changement **/
        $("#medecin").on('change', function () {
            $.ajax({
                method: "POST",
                url: "../../Controller/Medecin/ReadMedecinController.php",
                dataType: "json",
                data: {
                    'id': $('#medecin option:selected').val()
                }
            }).done(function (data) {
                $("#adresseMed").val(data[0]['adresse']);
                $("#cpMed").val(data[0]['cp']);
                $("#villeMed").val(data[0]['ville']);
                $("#telephoneMed").val(data[0]['telephone']);
                $("#mailMed").val(data[0]['mail']);
            })
        })
    })

    /**
     * Sauvegarde patient
     * @constructor
     */
    function SauvegarderPatient() {
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

        $.ajax({
            method: "POST",
            url: "../../Controller/Patients/UpdatePatientController.php",
            dataType: "json",
            data:
                {
                    'id': $("#idPatient").data('id'),
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
                    'id_medecin': $('#medecin option:selected').val(),
                    'id_pharmacie': $('#pharmacie option:selected').val()
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

    /**
     * Suppression patient
     * @constructor
     */
    function SupprimerPatient() {
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "../../Controller/Patients/SupprimerPatientController.php",
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


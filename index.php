<?php
include 'Vue/Template/header.php';
?>
<body>
<div class="container-fluid">
    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <h1 class="display-4">Gestion Patients</h1>
    </div>

    <!-- Formulaire -->
    <div class="container">
        <div class="row">
            <form class="col-4 offset-4" method="post">
                <div class="form-group">
                    <label for="identifiant">Identifiant</label>
                    <input id="identifiant" type="text" class="form-control" name="identifiant"
                           placeholder="Entrer votre identifiant">
                </div>
                <div class="form-group">
                    <label for="mdp">Mot de passe</label>
                    <input id="mdp" type="password" class="form-control" name="mdp" placeholder="Mot de passe">
                </div>
                <button id="button" type="submit" class="btn btn-info">Connexion</button>
            </form>
        </div>

        <!-- Messages d'alerte -->
        <div class="row" style="margin-top: 30px">
            <div class="col-4 offset-4 mt-50">
                <div class="alert alert-danger" role="alert" id="reponseVide" style="color: red">Veuillez
                    renseigner l'identifiant et le mot de passe
                </div>
                <div class="alert alert-danger" role="alert" id="reponseFausse" style="color: red">Identifiant ou
                    mot de passe incorrect
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    jQuery(function () {

        $("#reponseVide").css('display', 'none');
        $("#reponseFausse").css('display', 'none');

        /**
         * Vérifie l'identifiant et le mot de passe
         */
        $("#button").on('click', function () {
            event.preventDefault();
            $("#reponseFausse").css('display', 'none');
            if ($("#identifiant").val() === "" || $("#mdp").val() === "") {
                $("#reponseVide").css('display', 'block');
            } else {
                $("#reponseVide").css('display', 'none');
                $.post(
                    "Controller/ConnexionController.php",
                    {
                        'identifiant': $("#identifiant").val(),
                        'mdp': $("#mdp").val()
                    },
                    function (data) {
                        $resultat = [];
                        $.each($.parseJSON(data, function (i, obj) {
                            $resultat.push(obj);
                        }));
                        if ($resultat[0]) {
                            location.href = "accueil.php";
                        } else {
                            $("#reponseFausse").css('display', 'block');
                        }
                    }
                );
            }
        })
        ;
    })
</script>
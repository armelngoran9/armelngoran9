<?php require "../view/components/sidebarAdmin.php"; ?>
<?php require "../view/components/header.php"; ?>

<div class="wrapper ">

    <div class="container pt-5">

    <div class="row justify-content-center">
        <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1 class="mt-5">Créer une rubrique.</h1>

            <p class="mb-5">
                Le nom ne doit pas être semblable à celui d'une rubrique existant dans votre groupe.
            </p>


            <form class="rubrique-form" action="index.php?action=AjoutRubrique&g=<?=$idGroupe?>" method="post" autocomplete="off">

                <div class="text-input col-md-9 col-lg-8 ">
                    <input type="text" name="nomRubrique" class="col-12 light-input" id="nomRubrique" autofocus>
                    <label for="nomRubrique">Nom Rubrique</label><br>
                    <span class="error text-red">Entrez un nom pour la rubrique.</span>

                    <small class="text-danger"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></small>
                </div>

                <input type="submit" value="sauvegarder" class="valider">

            </form>

        </div>
    </div>


<script type="text/javascript" src="javascript/floatLabel.js"></script>
<script type="text/javascript" src="javascript/validateForm.js"></script>
<script type="text/javascript" src="View/javascript/modal.js"></script>
<script type="text/javascript" src="View/javascript/activeSettings.js"></script>

<!--bootstrap-->
<script type="text/javascript" src="static/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="static/js/popper.min.js"></script>
<script type="text/javascript" src="static/js/bootstrap.min.js"></script>
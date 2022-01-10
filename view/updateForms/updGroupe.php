

<div class="container pt-5">

    <div class="row justify-content-center">
        <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1 class="mt-5">Modifier un Groupe.</h1>

            <form class="groupe-form" 
            action="index.php?action=ModifGroupe&g=<?=$oldGr->idGroupe()?>&z=<?=$nomZone?>" method="post" autocomplete="off">

                <div class="text-input col-md-10 col-lg-9 ">
                    <input type="text" name="nomGroupe" class="col-12 light-input active" id="nomGroupe" value="<?=$oldGr->nomGroupe()?>" 
                    autofocus>
                    <label for="nomGroupe">Nom Groupe</label><br>
                    <span class="error text-red">Entrez un nom pour le groupe.</span>

                    <small class="text-danger"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></small>
                </div>

                <div class="text-input col-md-10 col-lg-9 ">
                    <input type="text" name="nomRespo" class="col-12 light-input active" id="nomRespo" 
                    value="<?=$oldGr->nomRespo()?>" autofocus>
                    
                    <label for="nomRespo">Nom Respo</label><br>
                    <span class="error text-red">Entrez un nom pour le responsable.</span>

                </div>

                <div class="text-input col-md-10 col-lg-9 ">
                    <input type="text" name="nomTreso" 
                    class="col-12 light-input active" id="nomTreso" autofocus value="<?=$oldGr->nomTresorier()?>">

                    <label for="nomTreso">Nom Tresorier</label><br>
                    <span class="error text-red">Entrez un nom pour le Tresorier.</span>
                </div>

                <input type="submit" value="sauvegarder" class="valider">

            </form>

            <a class="mt-4 d-block text-success" href="index.php?action=ListeGroupes&z=<?=$nomZone?>">Revenir à la zone</a>
        </div>
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
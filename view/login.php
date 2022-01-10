<div class="log-body">
    <div class="content-bg">
        <div class="p-5 col-11 col-sm-8 col-md-8 col-lg-6 content-box bg-dark">
        <h1>Connectez-vous.</h1>

        <form class="login-form" action="index.php?action=login" method="post" id="form" autocomplete="off">

            <div class="text-input col-md-12">
            <input type="text" name="pseudo" value="" id="pseudo" class="col-12 light-input icon-input" autofocus>
            <label for="pseudo" class="icon-label">Nom d'utilisateur</label>
            <i class="fas fa-user text-white"></i>
            </div>

            <div class="text-input col-md-12">
            <input type="password" name="mdp" value="" id="mdp" class="mdp col-12 light-input icon-input" autofocus>
            <label for="titre" class="icon-label">Mot de passe</label>
            <i class="fas fa-lock text-white"></i>
            </div>
            <span class="log-error">
            <?php if (isset($_SESSION['error'])){
                echo $_SESSION['error'];
            } ?>
            </span>

            <input type="submit" value="Connexion" class="valider dark col-12">
        </form>
    <div class="">



</div>


</div></div>
    
    <script type="text/javascript" src="javascript/floatLabel.js"></script>
    <script type="text/javascript" src="javascript/validateForm.js"></script>
    <script type="text/javascript" src="View/javascript/modal.js"></script>
    <script type="text/javascript" src="View/javascript/activeSettings.js"></script>

    <!--bootstrap-->
    <script type="text/javascript" src="static/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="static/js/popper.min.js"></script>
    <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
</div>
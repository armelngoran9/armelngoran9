    <?php require "../view/components/sidebarAdmin.php"; ?>
    <?php require "../view/components/header.php"; ?>

    <div class="wrapper ">

        <div class="container pt-5">

        <div class="row justify-content-center">
            <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

                <h1 class="mt-5">Effectuer un versement.</h1>

                <?php if (!$rubriques): ?>
                    <?= "Il n'y a pas encore de rubriques pour effectuer un versement." ?>

                <?php elseif (!$adherents): ?>
                    <?= "Il n'y a pas encore d'adherents pour effectuer un versement." ?>
                    
                <?php else: ?>

                    <form class="versement-form" action="index.php?action=Versement&g=<?=$idGroupe?>" method="post" autocomplete="off">

                        <div class="text-input col-md-11 col-lg-10">
                            <select class="col-12 light-input" name="nomRubrique" id="nomRubrique">
                                <option value="" selected></option>

                                <?php foreach($rubriques as $rub): ?>
                                    <option value="<?=$rub->nomRubrique()?>"><?=$rub->nomRubrique()?></option>
                                <?php endforeach ?>
                            </select>

                            <?php unset($rub);?>

                            <label for="nomRubrique" >Rubrique</label>
                            <span class="error text-red">Spécifiez la rubrique pour laquelle effectuer le versement.</span>
                        </div>



                        <div class="row pl-3 pr-2">

                            <div class="text-input col-md-7">
                                <input type="number" name="montant" value="" id="montant" class="col-12 light-input" >
                                <label for="montant" >montant</label>
                                <span class="error text-red">montant obligatoire</span>
                            </div>
                            

                            <div class="text-input col-md-4 col-lg-3">
                                <select class="col-12 light-input" name="idProprietaire" id="idProprietaire">
                                    <option value="" selected></option>

                                    <?php foreach($adherents as $adh): ?>
                                        <option value="<?=$adh->id()?>"><?=$adh->id()?></option>
                                    <?php endforeach ?>
                                </select>

                                <label for="idProprietaire" >id Propriétaire</label>
                                <span class="error text-red">Spécifiez le propriétaire du compte.</span>
                            </div>

                            <small class="text-danger mb-3"><?= (isset($_SESSION['error'])) ? $_SESSION['error'] : "" ?></small>
                        </div>

                        <input type="submit" value="sauvegarder" class="valider">

                    </form>
                <?php endif ?>


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
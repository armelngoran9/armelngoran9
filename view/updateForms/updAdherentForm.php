<?php require "../view/components/sidebarAdmin.php"; ?>
<?php require "../view/components/header.php"; ?>

<div class="wrapper ">

    <div class="container pt-5">

    <div class="row justify-content-center">
        <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1 class="mt-5">Modifier un adhérent.</h1>

            <form class="updAdherent-form" action="index.php?action=ModifAdherent&id=<?=$oldAdh->id()?>&g=<?=$idGroupe?>" method="post" autocomplete="off">

                <div class="text-input col-md-11 col-lg-10 ">
                    <input type="text" name="nom" class="col-12 light-input active" id="nom" autofocus value="<?=$oldAdh->nom()?>">
                    <label for="nom">Nom</label><br>
                    <span class="error text-red">Nom obligatoire</span>
                </div>

        
                <div class="text-input col-md-11 col-lg-10 ">
                    <input type="text" name="prenoms" class="col-12 light-input active" id="prenoms" value="<?=$oldAdh->prenoms()?>">
                    <label for="prenoms">Prenoms</label><br>
                    <span class="error text-red">Nom obligatoire</span>
                </div>

        
                <div class="row pl-3 pr-2">

                
                    <div class="text-input col-md-7">
                        <input type="number" name="contact" id="contact" class="col-12 light-input active" 
                        value="<?=$oldAdh->contact()?>">

                        <label for="contact" >Contact</label>
                        <span class="error text-red">contact obligatoire</span>
                    </div>
                    

                    <div class="text-input col-md-4 col-lg-3">
                        <select class="col-12 light-input <?=($oldAdh->idParrain()) ? 'active' : ''?>" name="idParrain" id="idParrain">
                            <option value="" ></option>

                            <?php foreach($adherents as $adh): ?>
                                <?php if($adh->idParrain()): ?>
                                    <option value="<?=$adh->idParrain()?>" 
                                    <?= ($adh->idParrain() == $oldAdh->idParrain()) ? "selected" : "" ?>>

                                        <?=$adh->id()?>

                                    </option>
                                <?php endif ?>
                                <?php endforeach ?>
                        </select>

                        <label for="idParrain" >id Parrain</label>
                        <span class="error text-red">Choisissez un parrain</span>

                    </div>

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
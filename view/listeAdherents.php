<?php 
    if(isset($_SESSION['connexion']) && $_SESSION['connexion'] > 0)
        require "../view/components/sidebarAdmin.php";  
    elseif(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 0)
        require "../view/components/sidebarUser.php";
?>

<div class="wrapper">

    <div class="container-fluid pt-5">

        <div class="row justify-content-center">
            <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1>Adhérents.</h1>
                <?php if($adherents): ?>
                    <table class="table table-bordered table-striped table-hover">

                        <thead>
                            <tr>
                                <td>id</td>

                                <td>nom</td>

                                <td>prenoms</td>

                                <td>id Parrain</td>

                                <td>contact</td>

                                <td>Actions</td>
                            </div>
                        </thead>
                        

                        <?php foreach ($adherents as $adh): ?>

                            <tr>
                                <td><?=$adh->id()?></td>

                                <td><?=$adh->nom()?></td>

                                <td><?=$adh->prenoms()?></td>

                                <td><?=$adh->idParrain()?></td>

                                <td><?=$adh->contact()?></td>

                                <td>

                                    <a href="index.php?action=BilanAdherent&id=<?=$adh->id()?>&g=<?=$idGroupe?>">
                                        <i class="fas fa-info-circle icon-btn info text-info"></i>
                                    </a>   
                                    
                                    <a href="index.php?action=ModifAdherent&id=<?=$adh->id()?>&g=<?=$idGroupe?>">
                                        <i class="fas fa-pen-alt icon-btn edit text-dark"></i>
                                    </a>

                                    <a href="index.php?action=SuppressionAdherent&id=<?=$adh->id()?>&g=<?=$idGroupe?>#">
                                        <i class="fas fa-trash icon-btn delete text-danger"></i>
                                    </a>                                
                                </div>

                            </div>

                        <?php endforeach;
                            unset($adh)?>

                    </table>
                    
                    <a class="valider mt-5 d-inline-block" href="index.php?action=AdherentsPdf&g=<?=$idGroupe?>">Génerer PDF</a>
                    
                <?php else: ?>
                    <?="Il n'ya encore aucun adherent"?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
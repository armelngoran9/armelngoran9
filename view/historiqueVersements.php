<?php 
    require "../view/components/sidebarAdmin.php";
    require "../view/components/header.php"; ?>
  
?>

<div class="wrapper">

    <div class="container-fluid pt-5">

        <div class="row justify-content-center">
            <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1 class="mt-5">Historique des Versements du groupe.</h1>

                <?php if($versements): ?>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id vers.</th>

                                <th>id Adh.</th>

                                <th>montant</th>

                                <th>date</th>

                                <th>N°Compte</th>

                            </tr>
                        </thead>
                        

                        <?php foreach ($versements as $vers): ?>

                            <tr>
                                <td><?=$vers->idVersement()?></td>

                                <td><?=$vers->id?></td>

                                <td><?=$vers->montant()?></td>

                                <td><?=$vers->dateVersement()?></td>

                                <td><?=$vers->numCompte()?></td>


                        </tr>

                        <?php endforeach;
                            unset($vers)?>
                    </table>
                    <a class="valider mt-5 d-inline-block mb-5" href="index.php?action=HistoriquePdf&g=<?=$idGroupe?>">Génerer PDF</a>

                <?php else: ?>

                    <?="Il n'ya encore aucun versement"?>

                <?php endif ?>
            </div>
        </div>
    </div>
</div>
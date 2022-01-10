<?php 
    require "../view/components/sidebarAdmin.php";
    require "../view/components/header.php"; ?>
  
<div class="wrapper">

    <div class="container-fluid pt-5">

        <div class="row justify-content-center">
            <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1 class="mt-4">Bilan du groupe.</h1>

                <?php if($infos): ?>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>

                                <th>id Rubrique</th>

                                <th>nom Rubrique</th>

                                <th>total (Fcfa)</th>

                            </tr>
                        </thead>
                        

                        <?php foreach ($infos as $info): ?>

                            <tr>
                                <td><?=$info["idRubrique"]?></td>

                                <td><?=$info["nomRubrique"]?></td>

                                <td><?=$info["total"]?></td>

                            </tr>

                        <?php endforeach;
                            unset($infos)?>
                    </table>
                    <a class="valider mt-5 d-inline-block" href="index.php?action=BilanGroupePdf&g=<?=$idGroupe?>">Génerer PDF</a>

                <?php else: ?>

                    <?="Il n'y a rien à afficher."?>

                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<?php 
    require "../view/components/sidebarAdmin.php";
    require "../view/components/header.php"; ?>

<div class="wrapper">

    <div class="container-fluid pt-5">

        <div class="row justify-content-center">
            <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1 class="mt-4">Bilan Adherent.</h1>
            <?php if($infos): ?>

                <div class="infos-adh mb-5 text-secondary">
                    <h2 class="adh-nom mb-3"><?=$adh->nom() . " " .$adh->prenoms() ." - " . $adh->contact()?></h2>
                </div>

                <h2 class="mb-5">Bilan Comptes:</h2>

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>N°Compte</th>

                                    <th>Nom Rubrique</th>

                                    <th>solde</th>

                                    <th>id Rubrique</th>

                                </tr>
                            </thead>
                            

                            <?php foreach ($infos as $info): ?>

                                <tr>
                                    <td><?=$info["numCompte"]?></td>

                                    <td><?=$info["nomRubrique"]?></td>

                                    <td><?=$info["solde"]?></td>
                                    
                                    <td><?=$info["idRubrique"]?></td>
                            </tr>

                            <?php endforeach;
                                unset($infos)?>
                        </table>
                        <a class="valider mt-5 d-inline-block mb-5" 
                        href="index.php?action=BilanAdherentPdf&g=<?=$idGroupe?>&id=<?=$adh->id()?>">Génerer PDF</a>

                    <?php else: ?>

                        <?="Il n'y a rien à afficher."?>

                    <?php endif ?>
                </div>
        </div>
    </div>
</div>
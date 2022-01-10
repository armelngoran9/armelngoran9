<?php $i = (isset($_SESSION['connexion']) && $_SESSION['connexion'] > 0);?>

    <div class="jumbotron jumbotron-fluid banner text-center">
        <div class="infos-zone">
            <h1 class="zone-title text-white"><?= $zone->nomZone() ?></h1>
                <p class="respoZone text-white mb-5">Responsable : <?=$zone->nomRespo()?></p>

            <?php if($i): ?>
                <a class="jumbo-link link-btn newG" href="index.php?action=AjoutGroupe&z=<?=$zone->nomZone()?>">Nouveau groupe</a>
            <?php endif ?>
        </div>
       </div>

    <div class="full-bg mt-5">
        <div class="container">

        <h1>Liste des groupes.</h1>
        <h3><?= $zone->nomRespo() ?></h1>

        <div class="table-responsive-md">
            <table class="table table-dark table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">id groupe</th>
                        <th scope="col">Nom groupe</th>
                        <th scope="col">Nom Respo</th>
                        <th scope="col">Nom Treso</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($groupes as $groupe): ?>
                        <tr>
                            <th scope="row"><?= $groupe->idGroupe() ?> </th>
                            <td><?= $groupe->nomGroupe() ?> </th>
                            <td><?=$groupe->nomRespo() ?></td>
                            <td> <?=$groupe->nomTresorier() ?> </td>
                           
                            
                            <td> 
                                <a href="index.php?action=ListeRubriques&g=<?=$groupe->idGroupe()?>">
                                    <i class="fas fa-info-circle icon-btn info text-info"></i>
                                </a>   
                                <?php if($i) :?>
                                    <a href="index.php?action=ModifGroupe&g=<?=$groupe->idGroupe()?>&z=<?=$zone->nomZone()?>">
                                        <i class="fas fa-pen-alt icon-btn edit text-dark"></i>
                                    </a>

                                    <a href="index.php?action=SuppressionGroupe&g=<?=$groupe->idGroupe()?>&z=<?=$zone->nomZone()?>#">
                                        <i class="fas fa-trash icon-btn delete text-danger"></i>
                                    </a>  
                                <?php endif?>
                            </td>
                        </tr>
                        
                    <?php endforeach;
                    unset($groupe); ?>
                </tbody>     
            </table>
        </div>

        </div>
    </div>


<?php 
    if(isset($_SESSION['connexion']) && $_SESSION['connexion'] > 0)
        require "../view/components/sidebarAdmin.php";  
    elseif(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 0)
        require "../view/components/sidebarUser.php";
?>

<?php 
    require "../view/components/header.php"; ?>

<div class="wrapper">

    <div class="container-fluid pt-5">

        <div class="row justify-content-center">
            <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1 class="mt-4">Stats.</h1>

                <?php if($stats): ?>

                    <table class="table table-striped table-bordered table-hover">

                    <thead>
                        <tr>

                            <th>id Rubrique</th>

                            <th>nom Rub</th>

                            <th>payeurs</th>

                        </tr>
                    </thead>
                        

                        <?php foreach ($stats as $stat): ?>

                            <tr>
                                <td><?=$stat->idRubrique()?></td>

                                <td><?=$stat->nomRubrique()?></td>

                                <td><?=$stat->crediteurs?></td>

                            </tr>

                        <?php endforeach;
                            unset($stats)?>
                    </table>
                    </thead>
                        

                <?php else: ?>

                    <?="Il n'y a pas de stats a afficher"?>

                <?php endif ?>
            </div>
        </div>
    </div>
</div>
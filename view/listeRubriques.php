<?php 
    if(isset($_SESSION['connexion']) && $_SESSION['connexion'] > 0)
        require "../view/components/sidebarAdmin.php";  
    elseif(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 0)
        require "../view/components/sidebarUser.php";
?>
<?php $i = (isset($_SESSION['connexion']) && $_SESSION['connexion'] > 0);?>

<div class="wrapper">

    <div class="container-fluid pt-5">

    <div class="row justify-content-center">
        <div class="col-10 col-sm-12 col-md-11 col-lg-10 ">

            <h1>Rubriques</h1>
            <?php if($rubriques): ?>
                <div class="table-responsive-xl">              
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <?php if($i): ?>
                                    <th scope ="col">id</th>
                                <?php endif ?>

                                <th scope ="col">nom</th>

                                <th scope ="col">date création</th>

                                <?php if($i): ?>
                                    <th scope ="col">solde</th>
                                <?php endif ?>

                                <?php if($i): ?>
                                    <th scope ="col">actions</th>
                                <?php endif ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rubriques as $rub): ?>

                                <tr>
                                    <?php if($i): ?>
                                        <td><?=$rub->idRubrique()?></td>
                                    <?php endif ?>

                                    <td><?=$rub->nomRubrique()?></td>

                                    <td><?=$rub->dateRubrique()?></td>

                                    <?php if($i): ?>
                                        <td><?=$rub->solde?></td>
                                    <?php endif ?>

                                    <?php if($i): ?>

                                        <td>
                                            
                                            <a href="#">
                                                <i class="fas fa-info-circle icon-btn info text-info"></i>
                                            </a>   
                                            
                                            <a href="index.php?action=ModifRubrique&idRubrique=<?=$rub->idRubrique()?>&g=<?=$idGroupe?>">
                                                <i class="fas fa-pen-alt icon-btn edit text-dark"></i>
                                            </a>

                                            <a href="index.php?action=SuppressionRubrique&idRubrique=<?=$rub->idRubrique()?>&g=<?=$idGroupe?>">
                                                <i class="fas fa-trash icon-btn delete text-danger"></i>
                                            </a>  
                                        </td>                        
                                    <?php endif ?>
                                    
                                </tr>

                            <?php endforeach;
                                unset($rub)?>
                        </tbody>
                    </table>
                    

                </div>
            <?php else: ?>
                <?="Aucune rubrique n'a encore été créée."?>
            <?php endif ?>
        </div>
    </div>

        
    </div>
</div>
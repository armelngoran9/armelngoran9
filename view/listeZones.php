
<style>
    body{
    }
</style>
<div class="jumbotron jumbotron-fluid text-center text-white zones-banner">
    <h1>Bienvenue.</h1>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($zones as $zone): ?>

            <div class="col-10 offset-1 col-sm-6 offset-sm-0 col-md-4 col-lg-3 mb-3">
                <div class="card zone">

                    <a class="enter-zone" title="Liste Groupes"
                    href="index.php?action=ListeGroupes&z=<?=$zone->nomZone()?>">
                    <div class="img-container">
                        <img src="images/constel.jpg" class="card-img-top imgcard img-fluid" alt="">
                    </div>

                    <div class="info-body bg-light">
                        <h5 class="title mb-n3">
                            <?= $zone->nomZone() ?> 
                        </h5>
                        <p class="ml-3">
                            Responsable : <?= $zone->nomRespo() ?>
                        </p>

                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center del-infos">
                        </li>

                        <div class="list-group list-group-flush">
                        </div>

                    </ul></a>

                </div>
            </div>
        <?php endforeach ?>     
    </div>

</div>



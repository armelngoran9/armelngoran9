<nav class="sidebar pt-0">

  <div class="sidebar-header d-none d-md-inline">
    <i class="fas fa-user-circle"></i>
    <span class="d-none d-lg-inline ">G-find</span>
  </div>

  <ul class="p-lg-1 p-md-0 pt-md-1 ">

    <a href="index.php?action=AjoutAdherent&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "AjoutAdherent") ? 'active' : ''?>">
      <i class="fas fa-plus-circle"></i> <span >Ajouter membre</span>
    </li></a>

    <a href="index.php?action=AjoutRubrique&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "AjoutRubrique") ? 'active' : ''?>">
      <i class="fas fa-plus-circle"></i> <span class="nav-label">Ajouter rubrique</span>
    </li></a>

    <a href="index.php?action=ListeRubriques&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "ListeRubriques") ? 'active' : ''?>">
      <i class="fas fa-money-bill-wave"></i> <span class="nav-label">Rubriques</span></li>
    </a>

    <a href="index.php?action=Versement&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "Versement") ? 'active' : ''?>">
      <i class="fab fa-paypal"></i> <span class="nav-label">Versement</span></li>
    </a>

    <a href="index.php?action=ListeAdherents&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "ListeAdherents") ? 'active' : ''?>">
      <i class="fas fa-user"></i> <span class="nav-label">Adhérents</span></li>
    </a>

    <a href="index.php?action=HistoriqueVersements&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "HistoriqueVersements") ? 'active' : ''?>">
      <i class="fas fa-history"></i> <span class="nav-label">Historique</span></li>
    </a>

    <a href="index.php?action=StatsGroupe&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "StatsGroupe") ? 'active' : ''?>">
      <i class="fas fa-graduation-cap"></i> <span class="nav-label">Statistiques</span></li>
    </a>

    <a href="index.php?action=Bilan&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "Bilan") ? 'active' : ''?>">
      <i class="fas fa-balance-scale"></i> <span class="nav-label">Bilan</span></li>
    </a>

    <a href="index.php?action=index"> <li>index</li></a>

    
    <a href="index.php?action=Deconnexion">
      <li class=bg-danger>
      <i class="fas fa-graduation-cap"></i> <span class="nav-label">Deconnexion</span></li>
    </a>


  </ul>
</nav>

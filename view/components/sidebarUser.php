<nav class="sidebar pt-0">

  <div class="sidebar-header d-none d-md-inline">
    <i class="fas fa-user-circle"></i>
    <span class="d-none d-lg-inline ">G-find</span>
  </div>

  <ul class="p-lg-1 p-md-0 pt-md-1 ">


  <a href="index.php?action=ListeRubriques&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "ListeRubriques") ? 'active' : ''?>">
      <i class="fas fa-money-bill-wave"></i> <span class="nav-label">Rubriques</span></li>
    </a>

    <a href="index.php?action=StatsGroupe&g=<?=$_GET['g']?>">
      <li class="<?php echo ($_GET['action'] == "StatsGroupe") ? 'active' : ''?>">
      <i class="fas fa-graduation-cap"></i> <span class="nav-label">Statistiques</span></li>
    </a>

    <a href="index.php?action=index"> <li>index</li></a>

    <a href="index.php?action=Deconnexion">
      <li class=bg-danger>
      <i class="fas fa-power-off"></i> <span class="nav-label">Deconnexion</span></li>
    </a>

  </ul>
</nav>

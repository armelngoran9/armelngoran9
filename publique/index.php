<?php

namespace AppGestion\Publique;

session_start();

use \AppGestion\model\MyPDF;
use \AppGestion\model\Autoloader;
use AppGestion\controller\UsersController;
use \AppGestion\controller\ZonesController;
use AppGestion\controller\GroupesController;

require '../model/Autoloader.php';
Autoloader::register();

define("ROOT",  dirname(__DIR__));

function a(){
  echo "<br/><br/>";
}

if( !empty($_GET['action']) )
{
  if($_GET['action'] == "Deconnexion"){
    $controller = new UsersController();
    $controller->deconnexion();
  }

  if($_GET['action'] == "accueil")
  {
    $controller = new UsersController();
    $controller->home();
  }

  elseif($_GET['action'] == "login" )
  {
    $controller = new UsersController();

    //If he's already logged in, automatically redirected
    $controller->login();
  }

  elseif( $_GET['action'] == "index")
  {
    $controller = new ZonesController();
    $controller->index();
  }

  elseif ( $_GET['action'] == "ListeGroupes" && !empty($_GET['z']))
  {
    $controller = new ZonesController();
    $zone = $_GET['z'];
    $controller->groupes($zone);
  }

  elseif ( 
    $_GET['action'] == "ModifGroupe" && 
    !empty($_GET['z']) && !empty($_GET['g']))
  {
    $controller = new ZonesController("updateForms");
    $zone = $_GET['z'];
    $controller->updateGroupe($zone, $_GET['g']);
  }

  elseif ( 
    $_GET['action'] == "SuppressionGroupe" && 
    !empty($_GET['z']) && !empty($_GET['g']))
  {
    $controller = new ZonesController();
    $nomZone = $_GET['z'];
    $controller->deleteGroupe($nomZone, $_GET['g']);
  }

  elseif ( $_GET['action'] == "AjoutGroupe" && isset($_GET['z']))
  {
    $controller = new ZonesController("addForms");
    $nomZone = $_GET['z'];
    $controller->addGroupe($nomZone);
  }

  elseif( !empty($_GET['g']) )
  {
     
    if ( $_GET['action'] == "ListeRubriques")
    {
      $controller = new GroupesController();
      $idGroupe = $_GET['g'];
      $controller->listeRubriques($idGroupe);
    }

    elseif ( $_GET['action'] == "ListeAdherents")
    {
      $controller = new GroupesController();
      $idGroupe = $_GET['g'];
      $controller->utilisateurs($idGroupe);
    }
   
    elseif ( $_GET['action'] == "AjoutAdherent")
    {
      $controller = new GroupesController("addForms");
      $idGroupe = $_GET['g'];
      $controller->addAdherent($idGroupe);
    }
    
    elseif ( $_GET['action'] == "ModifAdherent" && isset($_GET['id']))
    {
      $controller = new GroupesController("updateForms");
      $idGroupe = $_GET['g'];
      $id = $_GET['id'];
      $controller->updAdherent($idGroupe, $id);
    }
    

    elseif ( $_GET['action'] == "AjoutRubrique")
    {
      $controller = new GroupesController("addForms");
      $idGroupe = $_GET['g'];
      $controller->addRubrique($idGroupe);
    }

    elseif ( $_GET['action'] == "ModifRubrique" && !empty($_GET['idRubrique']))
    {
      $controller = new GroupesController("updateForms");
      $idGroupe = $_GET['g'];
      $controller->updateRubrique($idGroupe, $_GET['idRubrique']);
    }

    elseif ( $_GET['action'] == "Versement")
    {
      $controller = new GroupesController("addForms");
      $idGroupe = $_GET['g'];
      $controller->addVersement();
    }

    elseif ( $_GET['action'] == "HistoriqueVersements")
    {
      $controller = new GroupesController();
      $idGroupe = $_GET['g'];
      $controller->historiqueVersements($idGroupe);
    }

    elseif ( $_GET['action'] == "StatsGroupe")
    {
      $controller = new GroupesController();
      $idGroupe = $_GET['g'];
      $controller->stats($idGroupe);
    }
    
    elseif ( $_GET['action'] == "Bilan")
    {
      $controller = new GroupesController();
      $idGroupe = $_GET['g'];
      $controller->bilan($idGroupe);
    }
  
    elseif ( $_GET['action'] == "SuppressionAdherent" && !empty($_GET['id']))
    {
      $controller = new GroupesController();
      $idGroupe = $_GET['g'];
      $controller->deleteAdherent($idGroupe, $_GET['id']);
    }

    elseif ( $_GET['action'] == "SuppressionRubrique" && !empty($_GET['idRubrique']))
    {
      $controller = new GroupesController();
      $idGroupe = $_GET['g'];
      $controller->deleteRubrique($idGroupe, $_GET['idRubrique']);
    }

    elseif ( $_GET['action'] == "BilanAdherent" && !empty($_GET['id']))
    {
      $controller = new GroupesController();
      $idGroupe = $_GET['g'];
      $controller->bilanAdherent($idGroupe, $_GET['id']);
    }

    elseif ( $_GET['action'] == "AdherentsPdf")
    {
      $pdf = new MyPDF('P','mm','A4');

      $idGroupe = $_GET['g'];
      $pdf->viewAdherent($idGroupe);
    }
    
    elseif ( $_GET['action'] == "BilanGroupePdf")
    {
      $pdf = new MyPDF('P','mm','A4');

      $idGroupe = $_GET['g'];
      $pdf->viewBilanGroupe($idGroupe);
    }

    elseif ( $_GET['action'] == "HistoriquePdf")
    {
      $pdf = new MyPDF('P','mm','A4');

      $idGroupe = $_GET['g'];
      $pdf->viewHistorique($idGroupe);
    }

    elseif ( $_GET['action'] == "BilanAdherentPdf" && !empty($_GET['id']))
    {
      $pdf = new MyPDF('P','mm','A4');

      $idGroupe = $_GET['g'];
      $id = $_GET['id'];
      $pdf->viewBilanAdherent($id);
    }
  }  
  else{
    header("location:index.php?action=accueil");
  }

}
 
else
{
  header("location:index.php?action=accueil");
}

  




//$Dbh->addRubrique($rub);
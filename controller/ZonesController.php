<?php


 namespace AppGestion\controller;

 use AppGestion\model\Groupe;
 use \AppGestion\model\DAO;

 class ZonesController extends Controller{

  public function __construct(string $viewFolder = ""){
    parent::__construct($viewFolder);
    $this->template = "templateHtml";
  }

    public function index(){
      $dbh = new DAO();

      $zones = $dbh->getZonesList();
      $this->render("listeZones", compact("zones"));
    }

    public function newRespo(){
       
    }

    
    public function groupes( string $nomZone ){
      $dbh = new DAO();
      
      if( $dbh->zoneExists( $nomZone ) )
      {
        $groupes = $dbh->getGroupesList($nomZone);
        $zone = $dbh->getZone($nomZone);
        $this->render("listeGroupes", compact("groupes", "zone"));
      } 

      else
      {
        $this->notFound();
      } 
    }
    


public function addGroupe($nomZone)
{
    $dbh = new DAO();

    if($dbh->zoneExists($nomZone))
    {
        $groupes = $dbh->getGroupesList($nomZone);
    
        if( 
            !empty($_POST["nomGroupe"]) && 
            !empty($_POST["nomRespo"]) && 
            !empty($_POST["nomTreso"]) )
        {     
            $nomGroupe = $_POST["nomGroupe"];
            $nomRespo = $_POST["nomRespo"];
            $nomTreso = $_POST["nomTreso"];

            if($dbh->nomGroupeExists($nomGroupe, $nomZone))
            {
                $_SESSION['error'] = "Un groupe du même nom existe déjà dans la zone !";
                $this->render("groupeForm", \compact("nomZone"));
                $_SESSION['error'] = "";
            }
            else
            {
                $gr = new Groupe($nomGroupe, $nomZone, $nomRespo, $nomTreso);
                $dbh->addGroupe($gr);
                \header("location:index.php?action=AjoutGroupe&z=".$nomZone);
            }
        }
        else
        {
            $this->render("groupeForm", \compact("nomZone"));
        }
        
    }
    else
    {
        $this->notFound();
    }
  }


  
  public function deleteGroupe(string $nomZone, int $idGroupe)
  {
      $dbh = new DAO();

      if($dbh->groupeExists($idGroupe))
      {
          $dbh->deleteGroupe($idGroupe);
          header("location:index.php?action=ListeGroupes&z=". $nomZone);
      }
      else
      {
          $this->notFound();
      }
  }

  
  public function updateGroupe(string $nomZone, int $idGroupe)
  {
      $dbh = new DAO();
      $oldGr = $dbh->getGroupeById($idGroupe);

      if($dbh->groupeExists($idGroupe) && $dbh->zoneExists($nomZone)){
          if(
              !empty($_POST["nomGroupe"]) &&
              !empty($_POST["nomRespo"]) && 
              !empty($_POST["nomTreso"]))
          {     
            $nom = $_POST['nomGroupe'];
            $respo = $_POST['nomRespo'];
            $treso = $_POST['nomTreso'];

            $dbh = new DAO();
            $gr = new Groupe($nom, $nomZone, $respo, $treso);
            $gr->setIdGroupe($oldGr->idGroupe());

            $dbh->updateGroupe($gr);
            header("location:index.php?action=ListeGroupes&z=". $nomZone);
          }
  
          else
          {
              $dbh = new DAO();
              
              $this->render("updGroupe", \compact("oldGr", "nomZone"));
          }    
      }
      
      else
      {
          $this->notFound();
      }
  }
}


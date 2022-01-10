<?php
namespace AppGestion\controller;

use AppGestion\model\Adherent;
use AppGestion\model\Rubrique;
use \AppGestion\model\DAO;
use AppGestion\model\Versement;

class GroupesController extends Controller{

    
  public function __construct(string $viewFolder = ""){
    parent::__construct($viewFolder);
    $this->template = "templateHtml";
  }

    public function addAdherent($idGroupe)
    {
        $dbh = new DAO();
        
        if($dbh->groupeExists($idGroupe)){

            if(
                !empty($_POST["nom"]) &&
                !empty($_POST["prenoms"]) && 
                !empty($_POST["contact"]) &&
                isset($_POST["idParrain"]))
            {     
                $dbh = new DAO();
                extract($this->createAdherent($_POST, $idGroupe));
                $dbh->addAdherent($adh);
                header("location:index.php?action=AjoutAdherent&g=". $idGroupe. "&success");
            }
    
            else
            {
                $dbh = new DAO();
                
                $adherents = $dbh->getAdherentsList($idGroupe);
                $this->render("adherentForm", \compact("adherents", "idGroupe"));
            
            }    
        }
        
        else
        {
            $this->notFound();
        }
    }


    public function updAdherent(int $idGroupe, int $id)
    {
        $dbh = new DAO();
        $oldAdh = $dbh->getAdherent($id);

        if($dbh->groupeExists($idGroupe) && $dbh->adherentExists($id)){

            if(
                !empty($_POST["nom"]) &&
                !empty($_POST["prenoms"]) && 
                !empty($_POST["contact"]) &&
                isset($_POST["idParrain"]))
            {     
                $dbh = new DAO();
                extract($this->createAdherent($_POST, $id));
                $adh->setId($oldAdh->id());
                var_dump($adh);
                $dbh->updateAdherent($adh);
                header("location:index.php?action=ListeAdherents&g=". $idGroupe);
            }
    
            else
            {
                $dbh = new DAO();
                
                $adherents = $dbh->getAdherentsList($idGroupe);
                $this->render("updAdherentForm", \compact("adherents", "idGroupe", "oldAdh"));
            }    
        }
        
        else
        {
            $this->notFound();
        }
    }



    protected function createAdherent(array $array, int $idGroupe)
    {
        $nom = $array["nom"];
        $prenoms = $array["prenoms"];
        $contact = $array["contact"];
        $idParrain = $array["idParrain"];
    
        $adh = new Adherent($nom, $prenoms, $contact, $idGroupe);

        if($idParrain != ""){
            $adh->setIdParrain($idParrain);
        }

        return \compact("adh");
    }


    public function deleteAdherent(int $idGroupe, int $id)
    {
        $dbh = new DAO();

        if($dbh->adherentExists($id))
        {
            $dbh->deleteAdherent($id);
            header("location:index.php?action=ListeAdherents&g=". $idGroupe);
        }
        else
        {
            $this->notFound();
        }
    }

    public function addRubrique(int $idGroupe)
    {
        $dbh = new DAO();

        if($dbh->groupeExists($idGroupe))
        {
            if( !empty($_POST["nomRubrique"]) )
            {     
                $nomRubrique = $_POST["nomRubrique"];

                //two funds can't have the same name in the same group
                if($dbh->rubriqueExists($idGroupe, $nomRubrique))
                {
                    $_SESSION['error'] = "Une rubrique du même nom existe déjà pour ce groupe.";
                    $this->render("rubriqueForm", \compact("idGroupe"));
                    $_SESSION['error'] = "";
                }
                else
                {
                    $rub = new Rubrique($nomRubrique, $idGroupe);
                    $dbh->addRubrique($rub);
                    header("location:index.php?action=AjoutRubrique&g=". $idGroupe);
                }
            }
            else
            {
                $this->render("rubriqueForm", \compact("idGroupe"));
            }
        }
        
        else
        {
            $this->notFound();
        }
    }


    
    public function updateRubrique(int $idGroupe, int $idRubrique)
    {
        $dbh = new DAO();
        $oldRub = $dbh->getRubriqueById($idRubrique);

        if(
            $dbh->groupeExists($idGroupe) && 
            $dbh->rubriqueExistsById($idRubrique))
        {
            if( !empty($_POST["nomRubrique"]) )
            {     
                $nomRubrique = $_POST["nomRubrique"];

                if($dbh->rubriqueExists($idGroupe, $nomRubrique))
                {
                    $_SESSION['error'] = "Une rubrique du même nom existe déjà pour ce groupe.";
                    $this->render("updRubriqueForm", \compact("idGroupe", "oldRub"));
                    $_SESSION['error'] = "";
                }
                else
                {
                    $rub = new Rubrique($nomRubrique, $idGroupe);
                    $rub->setIdRubrique($oldRub->idRubrique());
                    $dbh->updateRubrique($rub);
                    header("location:index.php?action=ListeRubriques&g=". $idGroupe);
                }
            }
            else
            {
                $this->render("updRubriqueForm", \compact("idGroupe", "oldRub"));
            }
        }
        else
        {
            $this->notFound();
        }
    }

    public function deleteRubrique(int $idGroupe, int $idRubrique)
    {
        $dbh = new DAO();

        if($dbh->rubriqueExistsById($idRubrique))
        {
            $dbh->deleteRubrique($idRubrique);
            header("location:index.php?action=ListeRubriques&g=". $idGroupe);
        }
        else
        {
            $this->notFound();
        }
    }


    public function addVersement()
    {
        $dbh = new DAO();
        $idGroupe = $_GET['g'];

        if($dbh->groupeExists($idGroupe))
        {
            $rubriques = $dbh->getRubriquesList($idGroupe);
            $adherents = $dbh->getAdherentsList($idGroupe);
        
            if( 
                !empty($_POST["nomRubrique"]) && 
                !empty($_POST["idProprietaire"]) && 
                !empty($_POST["montant"]) )
            {     
                $nomRubrique = $_POST["nomRubrique"];
                $idProprietaire = $_POST["idProprietaire"];
                $montant = $_POST["montant"];
    
                if($montant <= 0)
                {
                    $_SESSION['error'] = "Le montant doit etre supérieur à 0.";
                    $this->render("versementForm", \compact("idGroupe", "rubriques", "adherents"));
                    $_SESSION['error'] = "";
                }
                else
                {
                    if( $dbh->adherentExists($idProprietaire) &&
                        $dbh->rubriqueExists($idGroupe, $nomRubrique)
                    )
                    {
                        $rubrique = $dbh->getRubriqueByName($idGroupe, $nomRubrique);
                        $compte = $dbh->getCompte($idProprietaire, $rubrique->idRubrique());
                        $vers = new Versement($compte->numCompte(), $montant);

                        $dbh->addVersement($vers);
                        header("location:index.php?action=Versement&g=". $idGroupe);

                    }
                }
            }
            else
            {
                $this->render("versementForm", \compact("rubriques", "idGroupe", "adherents"));
            }
            
        }
        else
        {
            $this->notFound();
        }
    }


    public function utilisateurs(int $idGroupe){

        $dbh = new DAO();
        if($dbh->groupeExists($idGroupe))
        {
            $adherents = $dbh->getAdherentsList($idGroupe);
            $this->render("listeAdherents", \compact("adherents", "idGroupe"));
        }
        else
        {
            $this->notFound();
        }
        
    }

    
    public function listeRubriques(int $idGroupe){

        $dbh = new DAO();
        if($dbh->groupeExists($idGroupe))
        {
            $rubriques = $dbh->getRubriquesList($idGroupe);

            foreach($rubriques as $rub){
                //We are creating this attribute to display it in the view
                //It isn't in the class Rubrique by default 
                $rub->solde = $dbh->getRubriqueSolde($rub->idRubrique());
            }
            unset($rub);
            $this->render("listeRubriques", \compact("rubriques", "idGroupe"));
        }
        else
        {
            $this->notFound();
        }
        
    }


    public function stats($idGroupe)
    {
        $dbh = new DAO();

        if($dbh->groupeExists($idGroupe))
        {
            $stats = $dbh->getCrediteursNumberByGroupe($idGroupe);

            $this->render("statsGroupe", \compact("stats"));
        }
        else
        {
            $this->notFound();
        } 
    }


    public function bilan($idGroupe){
        $dbh = new DAO();

        if($dbh->groupeExists($idGroupe))
        {
            $infos = $dbh->getBilan($idGroupe);

            $this->render("bilanGroupe", \compact("infos", "idGroupe"));
        }
        else
        {
            $this->notFound();
        } 
    }

    
    public function bilanAdherent(int $idGroupe, int $id){
        $dbh = new DAO();
        $adh = $dbh->getAdherent($id);
        if($dbh->groupeExists($idGroupe) && $dbh->adherentExists($id))
        {
            $infos = $dbh->getBilanByAdherent($id);

            $this->render("bilanAdherent", \compact("infos", "adh", "idGroupe"));
        }
        else
        {
            $this->notFound();
        } 
    }


    public function historiqueVersements(int $idGroupe)
    {
        $dbh = new DAO();

        if($dbh->groupeExists($idGroupe))
        {
            $versements = $dbh->getVersementsByGroupe($idGroupe);

            $this->render("historiqueVersements", \compact("versements", "idGroupe"));
        }
        else
        {
            $this->notFound();
        }   
    }
}
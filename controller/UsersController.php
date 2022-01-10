<?php
namespace AppGestion\controller;

use AppGestion\model\DAO;

class UsersController extends Controller {

    
  public function __construct(string $viewFolder = ""){
    parent::__construct($viewFolder);
    $this->template = "templateHtml";
  }

    public function home(){
        $this->render("accueil");
    }

    public function login()
    {
        $dbh = new DAO();

        if(isset($_GET['auth']) && $_GET['auth'] == 0)
        {
            $_SESSION['connexion'] = 0;
            \header("location:index.php?action=index");
        }

        elseif(isset($_SESSION["connexion"]) && $_SESSION["connexion"] == 1)
        {
            \header("location:index.php?action=index");
        }

        elseif(isset($_POST["pseudo"]) && isset($_POST["mdp"]))
        {     
            if($dbh->login($_POST["pseudo"], $_POST["mdp"]))
            {
                $_SESSION['connexion'] = 1;
                \header("location:index.php?action=index");
            }
            else
            {
                $_SESSION["error"] = "Le pseudo ou le mot de passe est incorrect";
                $this->render("login");
                $_SESSION["error"] = "";
            }
        }
        else
        {
            $this->render("login");
        }

    }

    public function deconnexion(){
        $_SESSION['connexion'] = 0;
        $this->home();
    }


}
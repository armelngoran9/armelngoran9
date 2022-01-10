<?php
namespace AppGestion\model;

/**
 * Class Adherent
 * Represente un adhérent à un groupe
 */

class Adherent extends Personne{
    

    /**
     * @var [int]
     */
    protected $idParrain;
    
    /**
     * dateInscription
     *
     * @var string
     */
    protected $dateInscription;
    
    /**
     * idGroupe
     *
     * @var int
     */
    protected $idGroupe;
    
    
    public function __construct(
        string $nom = "", 
        string $prenoms = "", 
        int $contact = 0, 
        int $idGroupe = 0,
        int $idParrain = 0, 
        int $id = 0,
        string $dateInscription = "0000-00-00"
        )
    {
        parent::__construct($nom, $prenoms, $contact, $id);
        $this->idParrain = $idParrain;
        $this->dateInscription = $dateInscription;
        $this->idGroupe = $idGroupe;
    }

    
    public function setIdParrain(int $idParrain){
        $this->idParrain = $idParrain;
    }

    public function setDateInscription(string $date){
        $this->dateInscription = $date;
    }

    public function setIdGroupe(int $idGroupe){
        $this->idGroupe = $idGroupe;
    }
    
        
    /**
     * idParrain
     *
     * @return int
     */
    public function idParrain(){
        return $this->idParrain;
    }

        
    /**
     * dateInscription
     *
     * @return string
     */
    public function dateInscription(){
        return $this->dateInscription;
    }
    
    
    /**
     * idGroupe
     *
     * @return int
     */
    public function idGroupe(){
        return $this->idGroupe;
    }

}



/* 
    public function setComptes(array $comptes){
        $this->comptes = $comptes;
    }
   
    public function addCompte(Compte $compte){
        array_push($this->comptes, $compte);
    } */

    
    
    /* public function comptes(){
        return $this->comptes;
    }
    
    public function compteByNumber(int $i)
    {
        if(sizeof($this->comptes) >= $i){
            return $this->comptes[$i];
        }
    } */
?>
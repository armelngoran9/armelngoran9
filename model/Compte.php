<?php
namespace AppGestion\model;

class Compte {   

    /**
     * _solde
     *
     * @var float
     */
    protected $solde;
    
    /**
     * idRubrique
     *
     * @var int
     */
    protected $idRubrique;
    
    /**
     * _numCompte
     *
     * @var int
     */
    protected $numCompte;
    
    /**
     * _idProprietaire
     *
     * @var int
     */
    protected $idProprietaire;
    

    public function __construct( int $idProprietaire = 0, int $idRubrique = 0, float $solde = 0, int $numCompte = 0){
        $this->solde = $solde;
        $this->setIdRubrique($idRubrique);
        $this->setNumCompte($numCompte);
        $this->setIdProprietaire($idProprietaire);
    }

    //Setters
    public function setSolde(float $solde){
        if(is_numeric($solde)){
            $this->solde = $solde;
        }
    }

    public function setNumCompte(int $numCompte){
        if(is_numeric($numCompte) && $numCompte >= 0){
            $this->numCompte = $numCompte;
        }
    }

    public function setIdProprietaire(int $idProprio){
        if (is_numeric($idProprio)){
            $this->idProprietaire = $idProprio;
        }
    }

    public function setIdRubrique(int $idRubrique)
    {
        if(is_numeric($idRubrique)){
            $this->idRubrique = $idRubrique;
        }
    }


    //Getters

    /**
     * solde
     *
     * @return float
     */
    public function solde(){
        return $this->solde;
    }
    
    /**
     * numCompte
     *
     * @return int
     */
    public function numCompte(){
        return $this->numCompte;
    }
    
    /**
     * idProprietaire
     *
     * @return int
     */
    public function idProprietaire(){
        return $this->idProprietaire;
    }
    
    /**
     * idRubrique
     *
     * @return int
     */
    public function idRubrique(){
        return $this->idRubrique;
    }
}
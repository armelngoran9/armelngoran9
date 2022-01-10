<?php

namespace AppGestion\model;

class Versement {
        
    /**
     * _idVersement
     *
     * @var int
     */
    protected $idVersement;
        
    /**
     * _montant
     *
     * @var float
     */
    protected $montant;
        
    /**
     * _dateVersement
     *
     * @var string
     */
    protected $dateVersement;
    
    /**
     * _numCompte
     *
     * @var int
     */
    protected $numCompte;



    public function __construct( 
        int $numCompte = 0, 
        float $montant = 0, 
        string $dateVersement = "0000-00-00", 
        int $idVersement = 0
    ){
        $this->setMontant($montant);
        $this->dateVersement = $dateVersement;
        $this->setIdVersement($idVersement);
        $this->setNumCompte($numCompte);
    }

    //Setters
    public function setIdVersement(int $idV)
    {
        if(is_numeric($idV) && $idV >= 0){
            $this->idVersement = $idV;
        }
    }
    
    public function setMontant(float $montant)
    {
        if(is_numeric($montant) && $montant >= 0){
            $this->montant = $montant;
        }
        else{
            $this->montant = 0;
        }

    }

    public function setdateVersement(string $dateVersement){
        $this->dateVersement = $dateVersement;
    }

    public function setNumCompte(int $num){
        $this->numCompte = $num;
    }


    //Getters
    public function idVersement(){
        return $this->idVersement;
    }

    public function montant(){
        return $this->montant;
    }
    
    public function dateVersement(){
        return $this->dateVersement;
    }

    public function numCompte(){
        return $this->numCompte;
    }

}
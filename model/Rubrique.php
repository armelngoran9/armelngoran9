<?php

namespace AppGestion\model;

class Rubrique{    
    
    /**
     * _idRubrique
     *
     * @var int
     */
    protected $idRubrique;

    /**
     * _nomRubrique
     *
     * @var string
     */
    protected $nomRubrique;
        
    /**
     * _dateRubrique
     *
     * @var string
     */
    protected $dateRubrique;
    
    /**
     * _idGroupe
     *
     * @var int
     */
    protected $idGroupe;


    public function __construct( $nomRubrique = "", $idGroupe = 0, $dateRubrique = "0000-00-00", $idRubrique = 0 )
    {
        $this->nomRubrique = $nomRubrique;
        $this->dateRubrique = $dateRubrique;
        $this->setIdRubrique($idRubrique);
        $this->setIdGroupe($idGroupe);
    }

    //Setters
    public function setNomRubrique(string $nomRubrique){
        $this->nomRubrique = $nomRubrique;
    }

    public function setIdRubrique(int $idRubrique)
    {
        if(is_numeric($idRubrique)){
            $this->idRubrique = $idRubrique;
        }
    }
 
    public function setDateRubrique(string $dateRubrique){
        $this->dateRubrique = $_dateRubrique;
    }
    
    public function setIdGroupe(int $idGroupe)
    {
        if(is_numeric($idGroupe)){
            $this->idGroupe = $idGroupe;
        }
    }

    //Getters
    public function nomRubrique(){
        return $this->nomRubrique;
    }
    
    /**
     * idRubrique
     *
     * @return int
     */
    public function idRubrique(){
        return $this->idRubrique;
    }

    public function dateRubrique(){
        return $this->dateRubrique;
    }
    
    public function idGroupe(){
        return $this->idGroupe;
    }

}
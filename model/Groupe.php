<?php

namespace AppGestion\model;

class Groupe {
    
    /**
     * idGroupe
     *
     * @var int
     */
    protected $idGroupe;

    /**
     * @var [string]
     */
    protected $nomGroupe;
    
    /**
     * dateGroupe
     *
     * @var string
     */
    protected $dateGroupe;
    
    /**
     * @var [string]
     */
    protected $nomRespo;

    
    /**
     * @var [string]
     */
    protected $nomTresorier;

    
    /**
     * _nomZone
     *
     * @var string
     */
    protected $nomZone;


    public function __construct(
        string $nomGroupe = "", 
        string $nomZone = "",
        string $nomRespo = "", 
        string $nomTresorier = "",
        string $dateGroupe = "0000-00-00", 
        int $idGroupe = 0
    )
    {
        $this->nomGroupe = $nomGroupe;
        $this->setIdGroupe($idGroupe);
        $this->nomRespo = $nomRespo;
        $this->nomZone = $nomZone;
        $this->nomTresorier = $nomTresorier;
        $this->dateGroupe = $dateGroupe;
    }

    //Setters
    public function setIdGroupe(int $id){
        if(is_numeric($id)){
            $this->idGroupe = $id;
        }
    }

    public function setNomRespo(string $nomRespo){
        $this->nomRespo = $nomRespo;
        
    }

    public function setNomTresorier(string $nomTreso){
        $this->nomTresorier = $nomTreso;
        
    }

    public function setNomGroupe(string $nomGroupe){
        $this->nomGroupe = $nomGroupe;
    }

    public function setNomZone(string $nomZone){
        $this->nomZone = $nomZone;
    }

    public function setDateGroupe(string $dateGroupe){
        $this->dateGroupe = $dateGroupe;
    }

    //Getters
    public function idGroupe(){
        return $this->idGroupe;
    }
    
    public function nomGroupe(){
        return $this->nomGroupe;
    }
    

    public function dateGroupe(){
        return $this->dateGroupe;
    }

    public function nomRespo(){
        return $this->nomRespo;
    }
    
    public function nomTresorier(){
        return $this->nomTresorier;
    }

    public function nomZone(){
        return $this->nomZone;
    }

}

?>
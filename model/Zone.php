<?php
namespace AppGestion\model;

class Zone{    

    /**
     * nomZone
     *
     * @var string
     */
    protected $nomZone;
        
    /**
     * idRespoZone
     *
     * @var string
     */
    protected $nomRespo;


    public function __construct(string $nomZone = "", string $nomRespo = ""){
        $this->nomZone = $nomZone;
        $this->nomRespo = $nomRespo;
    }

    //Setters
    public function setNomZone(string $nomZone){
        $this->nomZone = $nomZone;
    }

    public function setNomRespo(string $nomRespo){
        $this->nomRespo = $nomRespo;
    }

    //Getters
    public function nomRespo(){
        return $this->nomRespo;
    }

    public function nomZone(){
        return $this->nomZone;
    }

}
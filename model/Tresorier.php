<?php

namespace AppGestion\model;

class Tresorier extends Personne{
    
    /**
     * mdp
     *
     * @var string
     */
    protected $mdp;
        
    /**
     * pseudo
     *
     * @var string
     */
    protected $pseudo;

    public function __construct(string $nom = "", string $prenoms = "", int $contact = 0, string $pseudo = "", string $mdp = "", int $id = 0)
    {
        parent::__construct($nom, $prenoms, $contact, $id);
        $this->mdp = $mdp;
        $this->pseudo = $pseudo;
    }
    
    public function pseudo(){
        return $this->pseudo;
    }
        
    /**
     * mdp
     *
     * @return string
     */
    public function mdp(){
        return $this->mdp;
    }
        
    /**
     * setPseudo
     *
     * @param  string $pseudo
     * @return void
     */
    public function setPseudo(string $pseudo){
        $this->pseudo = $pseudo;
    }
        
    /**
     * setMdp
     *
     * @param  mixed $mdp
     * @return void
     */
    public function setMdp(string $mdp){
        $this->mdp = $mdp;
    }
}
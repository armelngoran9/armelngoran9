<?php

namespace AppGestion\model;

abstract class Personne{
        
    /**
     * id
     *
     * @var int
     */
    protected $id;

    /**
     * @var [string]
     */
    protected $nom;

    /**
     * @var [string]
     */
    protected $prenoms;


    /**
     * @var [int]
     */
    protected $contact;


    
    /**
     * __construct
     *
     * @param  string $nom
     * @param  string $prenoms
     * @param  int $contact
     * @param  int $id
     * @return void
     */
    public function __construct(string $nom, string $prenoms, int $contact, int $id)
    {
        $this->nom = $nom;
        $this->prenoms = $prenoms;
        $this->contact = $contact;
        $this->id = $id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id){
        if(is_numeric($id) && $id >= 0){
            $this->id = $id;
        }
    }

    public function setNom(string $nom){
        $this->nom = $nom;
    }

    /**
     * @param string $prenoms
     */
    public function setPrenoms(string $prenoms){
        $this->prenoms = $prenoms;
    }

    public function setContact(int $contact)
    {
        if(is_numeric($contact) && $contact >= 0){
            $this->contact = $contact;
        }    
    }


        
    /**
     * id
     *
     * @return int
     */
    public function id(){
        return $this->id;
    }

   

        
    /**
     * nom
     *
     * @return string
     */
    public function nom(){
        return $this->nom;
    }

   

        
    /**
     * prenoms
     *
     * @return string
     */
    public function prenoms(){
        return $this->prenoms;
    }

   

        
    /**
     * contact
     *
     * @return int
     */
    public function contact(){
        return $this->contact;
    }

   
}

?>
<?php 

namespace AppGestion\model;
use \PDO;

class DAO {
    protected $db;
 
    /**
     * db
     *
     * @return DAO
     */
    public function db()
    {
        if($this->db == null)
        {
            $this->initDb();
        }
        return $this->db;
    }


    public function initDb(){
        try 
        {
            $db = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "root", "");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->db = $db;
        } 
        catch (PDOException $e) 
        {
            echo "Erreur: ". $e->getMessage();
            die();
        }
    }
   
    
    /**
     * login
     *
     * @param  string $pseudo
     * @param  string $mdp
     * @return boolean
     */
    public function login(string $pseudo, string $mdp)
    {

        $db = $this->db();

        $req = $db->prepare(
        "   SELECT COUNT(*) AS nombre 
            FROM Tresorier 
            WHERE pseudo = ?  AND mdp = ?
        ");

        $pseudo = addslashes($pseudo);
        $pseudo = htmlentities($pseudo);
        $mdp = sha1($mdp);
        $req->execute([$pseudo, $mdp]);
        $res = $req->fetch();
        $occurrences = $res['nombre'];

        return ($occurrences > 0);       
    }
        
    /**
     * getZone
     *
     * @param  string $nomZone
     * @return Zone
     */
    public function getZone(string $nomZone)
    {
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM zone WHERE nomZone = ? ");
        $res = $req->execute(array($nomZone));

        //FETCH_PROPS_LATE so that the constructor is called before and not after
        //properties assignment, which would override the obtained values

        //Specifying the namespace to acces the class;
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Zone");
        
        $res = $req->fetch();
        $req->closeCursor();

        return $res;
    }

    
    /**
     * getZonesList
     * renvoie toutes les zones sous forme de tableau.
     *
     * @return array<Zone>
     */
    public function getZonesList()
    {
        $db = $this->db();

        $req = $db->query(" SELECT * FROM zone ");
        $zoneList = $req->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . 'Zone');
        $req->closeCursor();

        return $zoneList;
    }

    
    /**
     * getRespoZone
     *
     * @param  string $nomZone
     * @return RespoZone
     */
    public function getRespoZone(string $nomZone)
    {
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT id, nom, prenoms, contact FROM zone 
            INNER JOIN respoZone ON respoZone.id = zone.idRespoZone 
        ");

        $res = $req->execute(array($nomZone));

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "RespoZone");
        
        $res = $req->fetch();
        $req->closeCursor();

        return $res;
    }

    public function zoneExists(string $nomZone){
         
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT COUNT(*) AS nombre
            FROM zone 
            WHERE nomZone = ? 
        ");


        $req->execute([ $nomZone ]);
        $res = $req->fetch();
        $occurrences = $res["nombre"];

        return ($occurrences > 0);
    }

        
    /**
     * addNomRespo
     *
     * @param  string $nomZone
     * @param  string $nomRespo
     * @return void
     */
    public function addNomRespo(string $nomZone, string $nomRespo){

       $db = $this->db();

       $req = $db->prepare(
        "   UPDATE zone
            SET nomRespo = ?
            WHERE nomzone = ? 
        ");

          $nomZone = addslashes($nomZone);
          $nomZone = htmlentities($nomZone);
          $nomRespo = addslashes($nomRespo);
          $nomRespo = htmlentities($nomRespo);
        $res = $req->execute(
            [
                $nomRespo,
                $nomZone
            ]);

    }

        
    /**
     * addGroupe
     *
     * @param  Groupe $groupe
     * @return void
     */
    public function addGroupe(Groupe $groupe)
    {
        $db = $this->db();

        $req = $db->prepare(
            " INSERT INTO Groupe( nomGroupe, dateGroupe, nomZone, nomRespo, nomTresorier ) 
              VALUES( :nomGroupe, CURDATE(),  :nomZone, :nomRespo, :nomTresorier ) 
        ");


        $req->execute( 
            array(
                "nomGroupe" => $groupe->nomGroupe(),
                "nomZone" => $groupe->nomZone(),
                "nomRespo" => $groupe->nomRespo(),
                "nomTresorier" => $groupe->nomTresorier(),
        ));
    }


    public function nomGroupeExists(string $nomGroupe, string $nomZone){
        
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT COUNT(*) AS nombre
            FROM groupe 
            WHERE nomGroupe = ? AND nomZone = ? 
        ");


        $req->execute([ $nomGroupe, $nomZone ]);
        $res = $req->fetch();
        $occurrences = $res["nombre"];

        return ($occurrences > 0);
    }


    public function groupeExists(int $idGroupe){
        
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT COUNT(*) AS nombre
            FROM groupe 
            WHERE idGroupe = ? 
        ");

        $req->execute([ $idGroupe ]);
        $res = $req->fetch();
        $occurrences = $res["nombre"];

        return ($occurrences > 0);
    }


    /**
     * getGroupe
     *
     * @param  string $nomGroupe
     * @return Groupe
     */
    public function getGroupe(string $nomGroupe, string $nomZone)
    {
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM groupe WHERE nomGroupe = ? AND nomZone = ?" );


        $res = $req->execute([ $nomGroupe, $nomZone ]);

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Groupe");
        
        $res = $req->fetch();
        $req->closeCursor();

        return $res;
    }
    
    /**
     * getGroupeById
     *
     * @param  int $idGroupe
     * @return Groupe
     */
    public function getGroupeById(int $idGroupe)
    {
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM groupe WHERE idGroupe = ?" );
        $res = $req->execute([ $idGroupe ]);

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Groupe");
        
        $res = $req->fetch();
        $req->closeCursor();

        return $res;
    }

    
    /**
     * getGroupesList
     *
     * @return array<Groupe>
     */
    public function getGroupesList(string $nomZone)
    {
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM groupe WHERE nomZone = ? ");


        $req->execute(array($nomZone));

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Groupe");
        $res = $req->fetchAll();
        $req->closeCursor();

        return $res;
    }

    public function updateGroupe(Groupe $groupe){
        $db = $this->db();

        $req = $db->prepare(
            " UPDATE Groupe
              SET nomGroupe = :nomGroupe,
              nomZone = :nomZone,
              nomRespo = :nomRespo,
              nomTresorier = :nomTresorier
              WHERE idGroupe = :idGroupe
        ");

        $req->execute( 
            array(
                "nomGroupe" => $groupe->nomGroupe(),
                "nomZone" => $groupe->nomZone(),
                "nomRespo" => $groupe->nomRespo(),
                "nomTresorier" => $groupe->nomTresorier(),
                "idGroupe" => $groupe->idGroupe()
        ));
    }
    
    public function deleteGroupe(int $idGroupe){
        $db = $this->db();

        $req = $db->prepare(" DELETE FROM groupe WHERE idGroupe = ? ");
        $req->execute(array($idGroupe));
    }
    

    public function addRubrique(Rubrique $rubrique)
    {
        try 
        {
            $db = $this->db();

            $db->beginTransaction();

            $req = $db->prepare(
            " INSERT INTO Rubrique( nomRubrique, dateRubrique, idGroupe ) 
                VALUES( :nomRubrique, CURDATE(), :idGroupe ) 
            ");


            $_POST['nomRubrique'] = htmlspecialchars($_POST['nomRubrique']);
            $req->execute( 
            array(
                "nomRubrique" => $rubrique->nomRubrique(),
                "idGroupe" => $rubrique->idGroupe()
            ));

            //Creating an account linked to this new fund for every adherent

            $idRubrique = $db->lastInsertId();
            $adherents = $this->getAdherentsList($rubrique->idGroupe());

            foreach($adherents as $adh)
            {
                $c = new Compte( $adh->id(), $idRubrique );
                $this->_addCompte($db, $c);
            }
            //destroying reference to $rubriques
            unset($adh);

            //Validates the operations
            $db->commit();
        } 
        catch (Throwable $th) {
            throw $th;
        }
    }

    
    public function updateRubrique(Rubrique $rub)
    {
        $db = $this->db();

        $req = $db->prepare(
            " UPDATE Rubrique
              SET nomRubrique = :nomRubrique
              WHERE idRubrique = :idRubrique
        ");



        $req->execute( 
            array(
                "nomRubrique" => $rub->nomRubrique(),
                "idRubrique" => $rub->idRubrique()
        ));
    }

    
    public function deleteRubrique(int $idRubrique){
        $db = $this->db();

        $req = $db->prepare(" DELETE FROM rubrique WHERE idRubrique = ? ");
            
        $req->execute(array($idRubrique));
    }
    

    /**
     * getRubriqueById
     *
     * @param  int $id
     * @return Rubrique
     */
    public function getRubriqueById(int $id){
        
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM rubrique WHERE idRubrique = ? ");
        $req->execute(array($id));

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Rubrique");
        $res = $req->fetch();
        $req->closeCursor();

        return $res;
    }

    
    
    public function rubriqueExists(int $idGroupe, string $nomRubrique){
        
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT COUNT(*) AS nombre
            FROM Rubrique 
            WHERE nomRubrique = ? AND idGroupe = ? 
        ");


        $req->execute([ $nomRubrique, $idGroupe ]);
        $res = $req->fetch();
        $occurrences = $res["nombre"];

        return ($occurrences > 0);
    }

    
    public function rubriqueExistsById(int $idRubrique){
        
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT COUNT(*) AS nombre
            FROM Rubrique 
            WHERE idRubrique = ? 
        ");

        $req->execute([ $idRubrique ]);
        $res = $req->fetch();
        $occurrences = $res["nombre"];

        return ($occurrences > 0);
    }



    /**
     * getRubriqueByName
     *
     * @param  string $nomGroupe
     * @param  string $nomRubrique
     * @return Rubrique
     */
    public function getRubriqueByName(int $idGroupe, string $nomRubrique){
        
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM rubrique WHERE idGroupe = ? AND nomRubrique = ? ");
        

        $req->execute(array($idGroupe, $nomRubrique));

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Rubrique");
        $res = $req->fetch();
        $req->closeCursor();

        return $res;
    }

    
    /**
     * getRubriquesList
     *
     * @param  int $idGroupe
     * @return array<Rubrique>
     */
    public function getRubriquesList(int $idGroupe){
        
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM rubrique WHERE idGroupe = ? ");
        
        $req->execute(array($idGroupe));

        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Rubrique");
        $res = $req->fetchAll();
        $req->closeCursor();

        return $res;
    }

    public function getRubriqueSolde(int $idRubrique){
        
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT SUM(solde) AS solde 
            FROM rubrique INNER JOIN compte 
            ON rubrique.idRubrique = Compte.idRubrique 
            WHERE rubrique.idRubrique = ? 
            GROUP BY rubrique.idRubrique");
        
        $req->execute([$idRubrique]);
        $res = $req->fetch();
        $req->closeCursor();
        $montant = $res['solde'];

        return $montant;
    }


    
    /**
     * addAdherent
     *
     * @param  Adherent $adh
     * @return void
     */
    public function addAdherent(Adherent $adh)
    {
        /*Creates an Adherent with one Account for each fund of his group
        */

        $db = $this->db();

        //So that if an error occurs durring the operation,
        //Both accounts and Adherent creation will be aborted
        
        try 
        {
            $db->beginTransaction();

            $this->_createAdherent($db, $adh);

            $adh->setId($db->lastInsertId());

            //We create an account for each fund of the group

            $rubriques = $this->getRubriquesList($adh->idGroupe());

            foreach($rubriques as $rub)
            {
                $c = new Compte( $adh->id(), $rub->idRubrique() );
                $this->_addCompte($db, $c);
            }
            //destroying reference to $rubriques
            unset($rub);

            //Validates the operations
            $db->commit();

        } 
        catch (PDOException $e) {

            //Cancels all the operations
            $db->rollBack();
            throw $e;
        }
    }


    public function updateAdherent(Adherent $adh)
    {
        $db = $this->db();

        $req = $db->prepare(
            " UPDATE Adherent
              SET nom = :nom, prenoms = :prenoms, contact = :contact, idParrain = :idParrain 
              WHERE id = :id
        ");

        $req->execute( 
            array(
                "nom" => $adh->nom(),
                "prenoms" => $adh->prenoms(),
                "contact" => $adh->contact(),
                "idParrain" => $adh->idParrain(),
                "id" => $adh->id()
        ));
    }

    /**
     * getAdherent
     *
     * @param  int $id
     * @return Adherent
     */
    public function getAdherent(int $id){
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM adherent WHERE id = ? ");
            
        $req->execute(array($id));
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Adherent");
        $adh = $req->fetch();
        $req->closeCursor();

        return $adh;
    }
    

    public function deleteAdherent(int $idAdh){
        $db = $this->db();

        $req = $db->prepare(" DELETE FROM adherent WHERE id = ? ");
            
        $req->execute(array($idAdh));
    }

    
    public function adherentExists(int $id){
        
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT COUNT(*) AS nombre
            FROM adherent 
            WHERE id = ?  
        ");

        $req->execute([ $id ]);
        $res = $req->fetch();
        $occurrences = $res["nombre"];

        return ($occurrences > 0);
    }

    
    /**
     * getAdherentsList
     *Renvoie la liste des adhérents dans un tableau d'objets Adherent
     * 
     * @return array
     */
    public function getAdherentsList(int $idGroupe)
    {
        $db = $this->db();

        $req = $db->prepare( "SELECT * FROM adherent WHERE idGroupe = ?" );
        $req->execute(array($idGroupe));

        $req->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . 
            "Adherent"
        );
        
        $adhList = $req->fetchAll();
        $req->closeCursor();

        return $adhList;
    }

        
    /**
     * addCompte
     *
     * @param  Compte $compte
     * @return void
     */
    public function addCompte(Compte $compte)
    {
        $db = $this->db();

        $this->_addCompte($db, $compte);        
    }


    /**
     * getComptes
     *
     * @param  int $idAdherent
     * @return array<Compte>
     */
    public function getComptes(int $idAdherent){
        $db = $this->db();

        $req = $db->prepare( 
            " SELECT numCompte, solde, idProprietaire, Compte.idRubrique 
              FROM Compte INNER JOIN Rubrique
              ON Compte.idRubrique = Rubrique.idRubrique
              WHERE idProprietaire = ? ");
              
        $req->execute(array($idAdherent));

        $req->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . 
            "Compte"
        );
        
        $comptesList = $req->fetchAll();
        $req->closeCursor();

        return $comptesList;
    }

    
    /**
     * getCompte
     *
     * @param  int $idProprietaire
     * @param  string $nomRubrique
     * @return Compte
     */
    public function getCompte(int $idProprietaire, int $idRubrique){
        $db = $this->db();

        $req = $db->prepare( 
            " SELECT *
              FROM Compte
              WHERE idProprietaire = ? AND idRubrique = ? ");
              
        $req->execute([$idProprietaire, $idRubrique]);

        $req->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . 
            "Compte"
        );
        
        $compte = $req->fetch();
        $req->closeCursor();

        return $compte;
    }

    
    /**
     * addVersement
     *
     * @param  Versement $vers
     * @return void
     */
    public function addVersement(Versement $vers){
        try
        {
            $db = $this->db();

            $db->beginTransaction();
    
            $req = $db->prepare( 
                " INSERT INTO Versement(dateVersement, montant, numCompte )
                  VALUES ( CURDATE(), ?, ? )
                ");
             

            $req->execute( array( $vers->montant(), $vers->numCompte() ) );
    
            $this->_incCompte($db, $vers->numCompte(), $vers->montant());

            $db->commit();
        }
        catch(PDOException $e)
        {
            $db->rollBack();
            throw $e;
        }
       
    }

    
    /**
     * getVersementsList
     *
     * @param  int $numCompte
     * @return array<Versement>
     */
    public function getVersementsList(int $numCompte)
    {
         $db = $this->db();

        $req = $db->prepare( "SELECT * FROM versement WHERE numCompte = ? ");
        $req->execute(array($numCompte));

        $req->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . 
            "Versement"
        );
        
        $versementsList = $req->fetchAll();
        $req->closeCursor();

        return $versementsList;
    }

    
        
    /**
     * getVersementsByGroupe
     *
     * @param  int $idGroupe
     * @return array<Versement>
     */
    public function getVersementsByGroupe(int $idGroupe)
    {
        $db = $this->db();

        $req = $db->prepare( 
        "   SELECT idVersement, dateVersement, montant, compte.numCompte, id 
            FROM (versement INNER JOIN compte ON versement.numCompte = compte.numCompte)
            INNER JOIN adherent ON adherent.id = compte.idProprietaire
            WHERE idGroupe = ? ");

        $req->execute([$idGroupe]);

        $req->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . 
            "Versement"
        );
        
        $versementsList = $req->fetchAll();
        $req->closeCursor();

        return $versementsList;
    }

    
    /**
     * getVersementsByRubrique
     *
     * @param  int $idRubrique
     * @return array<VersementD>
     */
    public function getVersementsByRubrique(int $idRubrique)
    {
         $db = $this->db();

         
        $req = $db->prepare( 
        "   SELECT idVersement, dateVersement, montant, numCompte 
            FROM versement INNER JOIN compte
            ON versement.numCompte = compte.numCompte
            WHERE compte.idRubrique = ? ");

        $req->execute(array($idRubrique));

        $req->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . 
            "Versement"
        );
        
        $versementsList = $req->fetchAll();
        $req->closeCursor();

        return $versementsList;
    }

    
    public function addTresorier(Tresorier $treso)
    {
        $db = $this->db();

        $req = $db->prepare(
            " INSERT INTO Tresorier( nom, prenoms, pseudo, contact, mdp )
              VALUES ( :nom, :prenoms, :pseudo, :contact, :mdp ) 
            ");
        

        $req->execute( 
            [
                "nom" => $treso->nom(),
                "prenoms" => $treso->prenoms(),
                "pseudo" => $treso->pseudo(),
                "contact" => $treso->contact(),
                "mdp" => $treso->mdp()
            ]
        );


    }

    public function getTresorier(string $pseudo){
        $db = $this->db();

        $req = $db->prepare(" SELECT * FROM tresorier WHERE pseudo = ? ");
            
        $req->execute(array($pseudo));
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, __NAMESPACE__. "\\" . "Tresorier");
        $treso = $req->fetch();
        $req->closeCursor();

        return $treso;
    }



    //S T A T I S T I C S    M E T H O D S 

 

    public function getCrediteursNumber(int $idRubrique){
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT COUNT(*) AS nombre FROM
            ( SELECT DISTINCT compte.numCompte 
            from versement INNER JOIN compte 
            on versement.numCompte = compte.numCompte
            where idRubrique = ? AND MONTH(dateVersement) = MONTH(CURDATE())
            GROUP by compte.numCompte) as comptes
        ");
        
        $req->execute([$idRubrique]);
        $res = $req->fetch();
        
        $nombre = $res['nombre'];
        return $nombre;
    }
    
    public function getCrediteursNumberByGroupe(int $idGroupe){
        
        $stats = $this->getRubriquesList($idGroupe);
        foreach ($stats as $stat) 
        {
            //New property created
            $stat->crediteurs = $this->getCrediteursNumber($stat->idRubrique());
        }
        
        return $stats;
    }


    public function getBilan(int $idGroupe)
    {
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT compte.idRubrique, nomRubrique, SUM(montant) AS total
            FROM compte INNER JOIN versement 
            ON compte.numCompte = versement.numCompte
                INNER JOIN rubrique ON rubrique.idRubrique = compte.idRubrique
            WHERE idGroupe = ?
            GROUP BY compte.idRubrique
        ");

        $req->execute([$idGroupe]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getBilanByAdherent($id){
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT numCompte, nomRubrique, solde, compte.idRubrique
            FROM compte INNER JOIN rubrique 
            ON compte.idRubrique = rubrique.idRubrique
            WHERE idProprietaire = ?
        ");

        $req->execute([$id]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


  
  /*  public function getStatsRubriqueByGroupe(int $idGroupe){
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT idRubrique, nomRubrique, COUNT(*) AS crediteurs, SUM(versement) AS total, 
            FROM Versement RIGHT JOIN Rubrique
            ON Versement.idRubrique = rubrique.idRubrique 
            WHERE idRubrique = ?
            GROUP BY  MONTH(dateRubrique), YEAR(dateRubrique)
        ");

        $stats = $req->fetchObject();

        return $stats;
    }
*/

       
    /**
     * getStatsRubriques
     *
     * @param  int $idRubrique
     * @return array<mixed>
     */
/*
    public function getStatsRubrique(int $idRubrique){
        $db = $this->db();

        $req = $db->prepare(
        "   SELECT idRubrique, nomRubrique, dateRubrique, COUNT(*), MONTH(dateRubrique) AS mois, 
                YEAR(dateRubrique) AS annee
            FROM Versement INNER JOIN Rubrique
            ON Versement.idRubrique = rubrique.idRubrique 
            WHERE idRubrique = ?
            GROUP BY  MONTH(dateRubrique), YEAR(dateRubrique)
        ");

        $stats = $req->fetchObject();

        return $stats;
    }
*/

    //P R I V A T E   M E T H O D S

    private function _addCompte(PDO $db, Compte $compte)
    {   
        /* Add a new account using the passed $db, without creating
            A new connection
        */
        $req = $db->prepare(
            " INSERT INTO Compte ( solde, idProprietaire, idRubrique )
              VALUES( 0, :idProprietaire, :idRubrique )
        ");


        $req->execute(
                array(
                    "idProprietaire" => $compte->idProprietaire(),
                    "idRubrique" => $compte->idRubrique()
                )
        );

        $req->closeCursor();
    }


    private function _incCompte(PDO $db, int $numCompte, float $montant)
    {
        $req = $db->prepare(
            " UPDATE Compte SET solde = solde + ? 
              WHERE numCompte = ?
        ");

        $req->execute(array( $montant, $numCompte ));
    }

    

    private function _createAdherent(PDO $db, Adherent $adh)
    {
        /*Create a simple Adherent without any accounts
        */

        $req = $db->prepare(
            " INSERT INTO Adherent (nom, prenoms, contact, dateInscription, idParrain, idGroupe) 
              VALUES( :nom, :prenoms, :contact, CURDATE(), :idParrain, :idGroupe)
            ");

        // So that the first Adherent of the group could let that attribute empty
        // (default null in the database)
        $idParrain = ($adh->idParrain() == "") ? NULL : $adh->idParrain();

        $req->execute(
            array(
                "nom" => $adh->nom(),
                "prenoms" => $adh->prenoms(),
                "contact" => $adh->contact(),
                "idParrain" => $idParrain,
                "idGroupe" =>  $adh->idGroupe()
            )
        );
        $req->closeCursor();
    }

}
?>
<?php 

require_once("../class/compts.php");

class comptsManager 
{
    private $_pdo; // Instance de PDO.

    //Constructeur de la class clientManager
    public function __construct(PDO $pdo) 
    {
      $this->_pdo=$pdo;
    }

    //Setter de l'attribut pdo
    public function setDb(PDO $pdo) 
    {
        $this->_pdo = $pdo;
    }

    //Getter de l'attribut pdo 
    public function pdo() 
    {
        return $this->_pdo;   
    }

     //Fonction qui  récuperer un Compts avec son id, venant de la bdd.
     public function get($id) 
     {
         $_id = (int) $id; //on force le type de id en int pour la requete sql
 
         // préparation de la requete de selection d'un animal à partir de son id
         $request = $this->pdo()->prepare("SELECT * FROM compts WHERE id=:id");
 
         $request->execute(array('id' => $_id)); //on execute la requete select en spécifiant la valeur d'id
 
         $donnees = $request->fetch(PDO::FETCH_ASSOC); //Récupère une ligne depuis le jeu de résultats 
     
         $compts = new Compts(); //création d'un client sans valeur
     
         $compts->hydrate($donnees); //Utilisation de la fonction hydrate pour set les valeur de mon objet $client
         
         return $compts; //On return l'objet client créer précédament avec les données de notre requete
     }

    //Fonction qui ajoute un compts à la bdd
    public function add(compts $compts)
    {
        $request = $this->pdo()->prepare('INSERT INTO compts SET proprietaire = :proprietaire, typeCompt = :typeCompt, plafond = :plafond, interet = :interet, solde = :solde, dateOuverture = :dateOuverture, dateFermeture = :dateFermeture');
        
        $request->bindValue(':proprietaire', $compts->proprietaire(), PDO::PARAM_INT);
        $request->bindValue(':typeCompt', $compts->typeCompt(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':plafond', $compts->plafond(), PDO::PARAM_INT);
        $request->bindValue(':interet', $compts->interet(), PDO::PARAM_INT);
        $request->bindValue(':solde', $compts->solde(), PDO::PARAM_INT);
        $request->bindValue(':dateOuverture', $compts->dateOuverture(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':dateFermeture', $compts->dateFermeture(), PDO::PARAM_STR_CHAR);
        $request->execute(); //On execute la requete d'ajout'
    }
}


?>
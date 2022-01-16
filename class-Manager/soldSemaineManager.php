<?php 

require_once("../class/soldSemaine.php");

class soldSemaineManager 
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

    //Fonction qui  récuperer une soldSemaine avec son id, venant de la bdd.
    public function get($id) 
    {
        $_id = (int) $id; //on force le type de id en int pour la requete sql

        $request = $this->pdo()->prepare("SELECT * FROM actionCompt WHERE id=:id");  // préparation de la requete de selection d'une soldSemaine à partir de son id

        $request->execute(array('id' => $_id)); //on execute la requete select en spécifiant la valeur d'id

        $donnees = $request->fetch(PDO::FETCH_ASSOC); //Récupère une ligne depuis le jeu de résultats 
    
        $soldSemaine = new soldSemaine(); //création d'une soldSemaine sans valeur
    
        $soldSemaine->hydrate($donnees); //Utilisation de la fonction hydrate pour set les valeur de mon objet $soldSemaine
        
        return $soldSemaine; //On return l'objet soldSemaine créer précédament avec les données de notre requete
    }

}
?>
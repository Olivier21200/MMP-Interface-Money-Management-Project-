<?php 

require_once("../class/client.php");

class clientManager 
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

    //Méthode permettant de récupérer un Client avec son id, venant de la bdd.
    public function get($id) 
    {
        $_id = (int) $id; //on force le type de id en int pour la requete sql

        // préparation de la requete de selection d'un animal à partir de son id
        $request = $this->pdo()->prepare("SELECT id, nom, espece, cri, proprietaire, age FROM animaux WHERE id=:id");

        $request->execute(array('id' => $_id)); //on execute la requete select en spécifiant la valeur d'id

        $donnees = $request->fetch(PDO::FETCH_ASSOC); //Récupère une ligne depuis le jeu de résultats 
    
        $client = new Client(); //création d'un client sans valeur
    
        $client->hydrate($donnees); //Utilisation de la fonction hydrate pour set les valeur de mon objet $client
        
        return $client; //On return l'objet client créer précédament avec les données de notre requete
    }

   
}

?>
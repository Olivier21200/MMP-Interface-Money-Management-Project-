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

    //Fonction qui  récuperer un Client avec son id, venant de la bdd.
    public function get($id) 
    {
        $_id = (int) $id; //on force le type de id en int pour la requete sql

        // préparation de la requete de selection d'un animal à partir de son id
        $request = $this->pdo()->prepare("SELECT * FROM client WHERE id=:id");

        $request->execute(array('id' => $_id)); //on execute la requete select en spécifiant la valeur d'id

        $donnees = $request->fetch(PDO::FETCH_ASSOC); //Récupère une ligne depuis le jeu de résultats 
    
        $client = new Client(); //création d'un client sans valeur
    
        $client->hydrate($donnees); //Utilisation de la fonction hydrate pour set les valeur de mon objet $client
        
        return $client; //On return l'objet client créer précédament avec les données de notre requete
    }

    //Fonction qui ajoute un client à la bdd
    public function add(Client $client)
    {
        $request = $this->pdo()->prepare('INSERT INTO client SET prenom = :prenom, nom = :nom, age = :age, sexe = :sexe, telephone = :telephone, rue = :rue, ville = :ville, codePostal = :codePostal, mail = :mail, metier = :metier,nb_compts = :nb_compts');
        
        $request->bindValue(':prenom', $client->prenom(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':nom', $client->nom(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':age', $client->age(), PDO::PARAM_INT);
        $request->bindValue(':sexe', $client->sexe(), PDO::PARAM_INT);
        $request->bindValue(':telephone', $client->telephone(), PDO::PARAM_INT);
        $request->bindValue(':rue', $client->rue(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':ville', $client->ville(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':codePostal', $client->codePostal(), PDO::PARAM_INT);
        $request->bindValue(':mail', $client->mail(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':metier', $client->metier(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':nb_compts', $client->nbCompts(), PDO::PARAM_INT);
        
        $request->execute(); //On execute la requete d'ajout'
    }

    //Fonction qui retourne la liste des client dans notre bdd
    public function getList()
    {
        $clients = array(); //Création d'un tableau 
        
        // préparation de la requete de selection de tout les animaux dnas la table animaux ordoner par leur id
        $request = $this->pdo()->prepare('SELECT * FROM client ORDER BY prenom, nom');
        
        $request->execute(); //execution de notre select *

        //on parcours le résultat de notre requete et on créer des objets afin de les stocker dans un tableau
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) 
        {
            $client = new Client(); //création d'un objet animal
            $client->hydrate($donnees); //Utilisation de ma fonction hydrate pour set les valeur de mon objet $A1
            $clients[] = $client; //On stock notre objet dans notre tableau animaux
           
        }       
        return $clients; //On return le tableau d'animaux créer précédament avec les données de notre requete
    }

    //fonction qui update un client sélectionner avec de nouvelle valeur
    public function update(Client $client) 
    {
        $request = $this->pdo()->prepare('UPDATE client SET prenom = :prenom, nom = :nom, age = :age, sexe = :sexe, telephone = :telephone, rue = :rue, ville = :ville, codePostal = :codePostal, mail = :mail, metier = :metier,nb_compts = :nb_compts WHERE id = :id');

        $request->bindValue(':id', $client->id(), PDO::PARAM_INT);
        $request->bindValue(':prenom', $client->prenom(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':nom', $client->nom(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':age', $client->age(), PDO::PARAM_INT);
        $request->bindValue(':sexe', $client->sexe(), PDO::PARAM_INT);
        $request->bindValue(':telephone', $client->telephone(), PDO::PARAM_INT);
        $request->bindValue(':rue', $client->rue(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':ville', $client->ville(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':codePostal', $client->codePostal(), PDO::PARAM_INT);
        $request->bindValue(':mail', $client->mail(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':metier', $client->metier(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':nb_compts', $client->nbCompts(), PDO::PARAM_INT);

        $request->execute(); //on exécute notre requete de mise a jour
    }

    //Fonction qui supprime un client sélectionnée avec son id 
    public function remove($id)
    {
        $_id = (int) $id; //on force le type de id en int pour la requete sql

        $request = $this->pdo()->prepare("delete FROM client WHERE id=:id"); // préparation de la requete de supretion d'un compts à partir de son id

        $request->bindValue(':id', $_id, PDO::PARAM_INT);

        $request->execute(); //on execute la requete select en spécifiant la valeur d'id
    }
}
?>
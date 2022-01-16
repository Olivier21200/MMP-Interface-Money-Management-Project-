<?php 

require_once("../class/actionCompt.php");

class actionComptManager 
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

    //Fonction qui  récuperer une actionCompt avec son id, venant de la bdd.
    public function get($id) 
    {
        $_id = (int) $id; //on force le type de id en int pour la requete sql

        // préparation de la requete de selection d'un animal à partir de son id
        $request = $this->pdo()->prepare("SELECT * FROM actionCompt WHERE id=:id");

        $request->execute(array('id' => $_id)); //on execute la requete select en spécifiant la valeur d'id

        $donnees = $request->fetch(PDO::FETCH_ASSOC); //Récupère une ligne depuis le jeu de résultats 
    
        $actionCompt = new actionCompt(); //création d'une actionCompt sans valeur
    
        $actionCompt->hydrate($donnees); //Utilisation de la fonction hydrate pour set les valeur de mon objet $actionCompt
        
        return $actionCompt; //On return l'objet actionCompt créer précédament avec les données de notre requete
    }

    //Fonction qui ajoute une actionCompt à la bdd
    public function add(actionCompt $actionCompt)
    {
        $request = $this->pdo()->prepare('INSERT INTO actionCompt SET compt = :compt, user = :user, montant = :montant');
        
        $request->bindValue(':compt', $actionCompt->compt(), PDO::PARAM_INT);
        $request->bindValue(':user', $actionCompt->user(), PDO::PARAM_INT);
        $request->bindValue(':montant', $actionCompt->montant(), PDO::PARAM_INT);
       
        $request->execute(); //On execute la requete d'ajout'
    }

     //Fonction qui retourne la liste des actionCompt dans notre bdd
     public function getList()
     {
         $ActionCompt = array(); //Création d'un tableau 
         
         // préparation de la requete de selection de tout les animaux dnas la table animaux ordoner par leur id
         $request = $this->pdo()->prepare('SELECT * FROM actionCompt ORDER BY montant');
         
         $request->execute(); //execution de notre select *
 
         //on parcours le résultat de notre requete et on créer des objets afin de les stocker dans un tableau
         while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) 
         {
             $actionCompt = new actionCompt(); //création d'un objet animal
             $actionCompt->hydrate($donnees); //Utilisation de ma fonction hydrate pour set les valeur de mon objet $A1
             $ActionCompt[] = $actionCompt; //On stock notre objet dans notre tableau animaux
            
         }       
         return $ActionCompt; //On return le tableau d'animaux créer précédament avec les données de notre requete
     }

    //fonction qui update une actionCompt sélectionner avec de nouvelle valeur
    public function update(actionCompt $actionCompt) 
    {
        $request = $this->pdo()->prepare('UPDATE actionCompt SET compt = :compt, user = :user, montant = :montant WHERE id = :id');

        $request->bindValue(':compt', $actionCompt->compt(), PDO::PARAM_INT);
        $request->bindValue(':user', $actionCompt->user(), PDO::PARAM_INT);
        $request->bindValue(':montant', $actionCompt->montant(), PDO::PARAM_INT);
        $request->bindValue(':id', $actionCompt->id(), PDO::PARAM_INT);
        
        $request->execute(); //on exécute notre requete de mise a jour
    }

    //Fonction qui supprime une actionCompt sélectionnée avec son id 
    public function remove($id)
    {
        $_id = (int) $id; //on force le type de id en int pour la requete sql

        $request = $this->pdo()->prepare("delete FROM actionCompt WHERE id=:id"); // préparation de la requete de supretion d'une actionCompt à partir de son id

        $request->bindValue(':id', $_id, PDO::PARAM_INT);

        $request->execute(); //on execute la requete select en spécifiant la valeur d'id
    }


}

?>
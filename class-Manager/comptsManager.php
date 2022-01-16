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

    //Fonction qui retourne la liste des compts dans notre bdd
    public function getList()
    {
        $Compts = array(); //Création d'un tableau 
        
        // préparation de la requete de selection de tout les animaux dnas la table animaux ordoner par leur id
        $request = $this->pdo()->prepare('SELECT * FROM compts ORDER BY solde');
        
        $request->execute(); //execution de notre select *

        //on parcours le résultat de notre requete et on créer des objets afin de les stocker dans un tableau
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) 
        {
            $compts = new compts(); //création d'un objet animal
            $compts->hydrate($donnees); //Utilisation de ma fonction hydrate pour set les valeur de mon objet $A1
            $Compts[] = $compts; //On stock notre objet dans notre tableau animaux
           
        }       
        return $Compts; //On return le tableau d'animaux créer précédament avec les données de notre requete
    }

    //fonction qui update un compts sélectionner avec de nouvelle valeur
    public function update(compts $compts) 
    {
        $request = $this->pdo()->prepare('UPDATE compts SET proprietaire = :proprietaire, typeCompt = :typeCompt, plafond = :plafond, interet = :interet, solde = :solde, dateOuverture = :dateOuverture, dateFermeture = :dateFermeture WHERE id = :id');

        $request->bindValue(':proprietaire', $compts->proprietaire(), PDO::PARAM_INT);
        $request->bindValue(':typeCompt', $compts->typeCompt(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':plafond', $compts->plafond(), PDO::PARAM_INT);
        $request->bindValue(':interet', $compts->interet(), PDO::PARAM_INT);
        $request->bindValue(':solde', $compts->solde(), PDO::PARAM_INT);
        $request->bindValue(':dateOuverture', $compts->dateOuverture(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':dateFermeture', $compts->dateFermeture(), PDO::PARAM_STR_CHAR);
        $request->bindValue(':id', $compts->id(), PDO::PARAM_INT);

        $request->execute(); //on exécute notre requete de mise a jour
    }

     //Fonction qui supprime un compts sélectionnée avec son id 
     public function remove($id)
     {
         $_id = (int) $id; //on force le type de id en int pour la requete sql
 
         $request = $this->pdo()->prepare("delete FROM compts WHERE id=:id"); // préparation de la requete de supretion d'un compts à partir de son id
 
         $request->bindValue(':id', $_id, PDO::PARAM_INT);
 
         $request->execute(); //on execute la requete select en spécifiant la valeur d'id
     }

}


?>
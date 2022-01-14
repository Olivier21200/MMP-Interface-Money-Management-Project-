<?php 

//Class qui représente le type de ActionCompt
class actionCompt 
{
    private $_id;
    private $_compt;
    private $_user;
    private $_montant;

    //Constructeur de la class actionCompt
    public function __construct($id=null, $compt=null, $user=null, $montant=100)
    {
        $this->_id = $id;
        $this->_compt = $compt;
        $this->_user = $user;
        $this->_montant = $montant;
    }

    //                          //
    //  GETTER DES ATTRIBUTS    // 
    //                          //

    //Getter de l'id du actionCompt
    public function id() 
    {
        return $this->_id;
    }

    //Getter de l'compt du actionCompt
    public function  compt() 
    {
        return $this->_compt;
    }

    //Getter de l'user du actionCompt
    public function user() 
    {
        return $this->_user;
    }

    //Getter du montant du actionCompt
    public function montant() 
    {
        return $this->_montant;
    }

    //                          //
    //  SETTER DES ATTRIBUTS    // 
    //                          //

    //Setter de l'id e actionCompts
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter du compt de actionCompts
    public function set_compt($compt) 
    {
        $this->_compt = $compt;
    }

    //Setter du l'user de actionCompts
    public function set_user($user) 
    {
        $this->_user = $user;
    }

    //Setter du montant de actionCompts
    public function set_montant($montant) 
    {
        $this->_montant = $montant;
    }

     //Initialisation d’une instance à partir d’un tableau
     public function hydrate(array $donnees)
     {
         foreach ($donnees as $key => $value)
         {
             // On récupère le nom du setter correspondant à l'attribut.
             $method = 'set_'.ucfirst($key);
             
             // Si le setter correspondant existe.
             if (method_exists($this, $method))
             {
                 // On appelle le setter.
                 $this->$method($value);
             }
         }
     }

      //ToString de la class actionCompt
      public function __toString() 
      {
          $result = $this->id().' '.$this->compt().' '.$this->user().' '.$this->montant();
          return $result;
      }
}

?>

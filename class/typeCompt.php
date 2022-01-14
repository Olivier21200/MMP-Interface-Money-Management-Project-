<?php 

//Class qui représente le type de Compts
class typeCompt 
{
    private $_id;
    private $_nom;
    private $_plafond;
    private $_interet;

    //Constructeur de la class typeCompt
    public function __construct($id=null, $nom='A', $plafond=25000, $interet=1)
    {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_plafond = $plafond;
        $this->_interet = $interet;
    }

    //                          //
    //  GETTER DES ATTRIBUTS    // 
    //                          //

    //Getter de l'id du typeCompts
    public function  id() 
    {
        return $this->_id;
    }

    //Getter du nom du compts
    public function  nom() 
    {
        return $this->_nom;
    }

    //Getter du plafond du compts
    public function  plafond() 
    {
        return $this->_plafond;
    }

    //Getter de l'interet du compts
    public function  interet() 
    {
        return $this->_interet;
    }

    //                          //
    //  SETTER DES ATTRIBUTS    // 
    //                          //

    //Setter de l'id du typeCompts
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter du nom du typeCompts
    public function set_nom($nom) 
    {
        $this->_nom = $nom;
    }

    //Setter du plafond du TypeCompts
    public function set_plafond($plafond) 
    {
        $this->_plafond = $plafond;
    }

    //Setter des interes du TypeCompts
    public function set_interet($interet) 
    {
        $this->_interet = $interet;
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

     //ToString de la class typeCompt
     public function __toString() 
     {
         $result = $this->id().' '.$this->nom().' '.$this->plafond().' '.$this->interet();
         return $result;
     }
}    
?>
 
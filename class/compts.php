<?php 

//Class qui représente un compts
class compts 
{ 
    private $_id;
    private $_proprietaire;
    private $_typeCompt;
    private $_plafond;
    private $_interet;
    private $_solde;
    private $_dateOuverture;
    private $_dateFermeture;

    //Constructeur de la class compt
    public function __construct($id=null, $proprietaire=null, $typeCompt=null, $plafond=null, $interet=null, $solde=null, $dateOuverture=null, $dateFermeture=null)
    {
        $this->_id = $id;
        $this->_proprietaire = $proprietaire;
        $this->_typeCompt = $typeCompt;
        $this->_plafond = $plafond;
        $this->_interet = $interet;
        $this->_solde = $solde;
        $this->_dateOuverture = $dateOuverture;
        $this->_dateFermeture = $dateFermeture;
    }

    //                          //
    //  GETTER DES ATTRIBUTS    // 
    //                          //

    //Getter de l'id du compts
    public function  id() 
    {
        return $this->_id;
    }

    //Getter du proprietaire du compts
     public function  proprietaire() 
     {
         return $this->_proprietaire;
     }

    //Getter du typeCompt du compts
    public function  typeCompt() 
    {
        return $this->_typeCompt;
    }

    //Getter du plafond du compts
     public function  plafond() 
     {
         return $this->_plafond;
     }

    //Getter des interets du compts
    public function  interet() 
    {
        return $this->_interet;
    }

    //Getter des solde du compts
     public function  solde() 
     {
         return $this->_solde;
     }

    //Getter de la dateOuverture du compts
    public function  dateOuverture() 
    {
        return $this->_dateOuverture;
    }
    
    //Getter de la dateFermeture du compts
     public function  dateFermeture() 
     {
         return $this->_dateFermeture;
     }

    //                          //
    //  SETTER DES ATTRIBUTS    // 
    //                          //

    //Setter de l'id du compts
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter d du cou proprietaire du compts
     public function set_proprietaire($proprietaire) 
     {
         $this->_proprietaire = $proprietaire;
     }

    //Setter du typeCompt du compts
    public function set_typeCompt($typeCompt) 
    {
        $this->_typeCompt = $typeCompt;
    }

    //Setter du plafond du compts
     public function set_plafond($plafond) 
     {
         $this->_plafond = $plafond;
     }

    //Setter des interet du compts
    public function set_interet($interet) 
    {
        $this->_interet = $interet;
    }

    //Setter des soldes du compts
     public function set_solde($solde) 
     {
         $this->_solde = $solde;
     }

    //Setter de la dateOuverture du compts
    public function set_dateOuverture($dateOuverture) 
    {
        $this->_dateOuverture = $dateOuverture;
    }

    //Setter de la dateFermeture du compts
     public function set_dateFermeture($dateFermeture) 
     {
         $this->_dateFermeture = $dateFermeture;
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

    //ToString de la class compts
    public function __toString() 
    {
        $result = $this->id().' '.$this->proprietaire().' '.$this->typeCompt().' '.$this->plafond().' '.$this->interet().' '.$this->solde().' '.$this->dateOuverture().' '.$this->dateFermeture();
        return $result;
    }
}

?>
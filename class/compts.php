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
    //  SETTER DES ATTRIBUTS    // 
    //                          //

    //Setter de l'id du compts
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter de l'id du compts
     public function set_id($id) 
     {
         $this->_id = $id;
     }

    //Setter de l'id du compts
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter de l'id du compts
     public function set_id($id) 
     {
         $this->_id = $id;
     }

    //Setter de l'id du compts
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter de l'id du compts
     public function set_id($id) 
     {
         $this->_id = $id;
     }

    //Setter de l'id du compts
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter de l'id du compts
     public function set_id($id) 
     {
         $this->_id = $id;
     }
}

?>
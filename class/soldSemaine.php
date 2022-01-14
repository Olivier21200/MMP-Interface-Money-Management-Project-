<?php 

//Class qui représente le type les solde de la semaine
class soldSemaine 
{
    private $_id;
    private $_comptID;
    private $_sold;
    private $_dateSemaine;

    //Constructeur de la class soldSemaine
    public function __construct($id=null, $comptID=null, $sold=null, $dateSemaine=null)
    {
        $this->_id = $id;
        $this->_comptID = $comptID;
        $this->_sold = $sold;
        $this->_dateSemaine = $dateSemaine;
    }

    //                          //
    //  GETTER DES ATTRIBUTS    // 
    //                          //

    //Getter de l'id de la soldSemaine
    public function  id() 
    {
        return $this->_id;
    }

    //Getter du comptID de la soldSemaine
    public function comptID() 
    {
        return $this->_comptID;
    }

    //Getter des sold de la soldSemaine
    public function sold() 
    {
        return $this->_sold;
    }

    //Getter de la dateSemaine de la soldSemaine
    public function dateSemaine() 
    {
        return $this->_dateSemaine;
    }

    //                          //
    //  SETTER DES ATTRIBUTS    // 
    //                          //

    //Setter de l'id de la soldSemaine
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter du comptID de la soldSemaine
    public function set_comptID($comptID) 
    {
        $this->_comptID = $comptID;
    }

    //Setter des solds de la soldSemaine
    public function set_sold($sold) 
    {
        $this->_sold = $sold;
    }

    //Setter de la dateSemaine de la soldSemaine
    public function set_dateSemaine($dateSemaine) 
    {
        $this->_dateSemaine = $dateSemaine;
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

    //ToString de la class soldSemaine
    public function __toString() 
    {
        $result = $this->id().' '.$this->comptID().' '.$this->sold().' '.$this->dateSemaine();
        return $result;
    }
}

?>
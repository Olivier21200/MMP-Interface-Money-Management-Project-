<?php 

//Class qui représente un client
class client 
{   
    private $_id;
    private $_prenom;
    private $_nom;
    private $_age;
    private $_sexe;
    private $_telephone;
    private $_rue;
    private $_ville;
    private $_codePostal;
    private $_mail;
    private $_metier;
    private $_nbCompts;

    //Constructeur du client
    public function __construct($id=null, $prenom=null, $nom=null, $age=null, $sexe=null, $telephone=null, $rue=null, $ville=null, $codePostal=null, $mail=null, $metier=null, $nbCompts=null)
    {
        $this->_id = $id;
        $this->_prenom = $prenom;
        $this->_nom = $nom;
        $this->_age = $age; 
        $this->_sexe = $sexe; 
        $this->_telephone = $telephone;
        $this->_rue = $rue;
        $this->_ville = $ville;
        $this->_codePostal = $codePostal;
        $this->_mail = $mail;
        $this->_metier = $metier;
        $this->_nbCompts = $nbCompts;
    }

    //                          //
    //  SETTER DES ATTRIBUTS    // 
    //                          //

    //Setter de l'id du client
    public function set_id($id) 
    {
        $this->_id = $id;
    }

    //Setter du prenom du client
    public function set_prenom($prenom) 
    {
        $this->_prenom = $prenom;
    }

    //Setter du nom du client
    public function set_nom($nom) 
    {
        $this->_nom = $nom;
    }

    //Setter de l'age du client
    public function set_age($age) 
    {
        $this->_age = $age;
    }

    //Setter du sexe du client
    public function set_sexe($sexe) 
    {
        $this->_sexe = $sexe;
    }

    //Setter de telephone du client
    public function set_telephone($telephone) 
    {
        $this->_telephone = $telephone;
    }

    //Setter de la rue du client
    public function set_rue($rue) 
    {
        $this->_rue = $rue;
    }

    //Setter de la ville du client
    public function set_ville($ville) 
    {
        $this->_ville = $ville;
    }

    //Setter du  codePostal du client
    public function set_codePostal($codePostal) 
    {
        $this->_codePostal = $codePostal;
    }

    //Setter du mail du client
    public function set_mail($mail) 
    {
        $this->_mail = $mail;
    }

    //Setter du metier du client
    public function set_metier($metier) 
    {
        $this->_metier = $metier;
    }

    //Setter du nbCompts du client
    public function set_nbCompts($nbCompts) 
    {
        $this->_nbCompts = $nbCompts;
    }

    //                          //
    //  GETTER DES ATTRIBUTS    // 
    //                          //

    //Getter de l'id du client
     public function  id() 
     {
         return $this->_id;
     }
     
    //Getter de le prenom du client
    public function  prenom() 
    {
        return $this->_prenom;
    }  

    //Getter du nom du client
     public function  nom() 
     {
         return $this->_nom;
     }  

    //Getter de l'age du client
    public function  age() 
    {
        return $this->_age;
    }  

    //Getter de du sexe du client
     public function  sexe() 
     {
         return $this->_sexe;
     }  

    //Getter du telephone du client
    public function  telephone() 
    {
        return $this->_telephone;
    }  

    //Getter de la rue du client
     public function  rue() 
     {
         return $this->_rue;
     }  

    //Getter de la ville du client
    public function  ville() 
    {
        return $this->_ville;
    }  

    //Getter de du codePostal du client
     public function  codePostal() 
     {
         return $this->_codePostal;
     }  

    //Getter du mail du client
    public function  mail() 
    {
        return $this->_mail;
    }  

    //Getter du metier du client
     public function  metier() 
     {
         return $this->_metier;
     }  

    //Getter du nbCompts du client
    public function  nbCompts() 
    {
        return $this->_nbCompts;
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

     //ToString de la class client
     public function __toString() 
     {
         $result = $this->id().' '.$this->prenom().' '.$this->nom().' '.$this->age().' '.$this->sexe().' '.$this->telephone().' '.$this->rue().' '.$this->ville().' '.$this->codePostal().' '.$this->mail().' '.$this->metier().' '.$this->nbCompts();
         return $result;
     }

}
?>
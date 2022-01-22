<?php

    require_once "Champ.php";

class Form
{

    private $champs;
    private $action;

    //constructeur 
    public function __construct(string $action)
    {
        $this->action = $action;
        $this->champs = [];
    }

    public function __toString():string
    {
        $res = "<form action='".$this->action."' method='post'>";

        foreach($this->champs as $champ)
        {
            $res .= $champ->__toString() . "<br>";
        }
        return $res;
    }
    //Fonction qui ajoute un champ au formulaire
    public function add(Champ $champ)
    {
        $this->champs[] = $champ;
    }

    //Fonction qui créer des champs a partir des donnée d'un tableau
    public function hydrate(array $donnees)
    {
        foreach($donnees as $key => $value)
        {
            $champ = new Champ($key, $key, "text", $value);
            $this->add($champ);
        }
    }

    public function __toStringResultat():string
    {
        $res =""; //variable de retour

        foreach($this->champs as $champ)
        {
            $res .= $champ->getName() . " => " . $champ->getValue() . "<br>";
        }

        return $res;
    }

}
<?php

class Champ
{

    private $name;
    private $type;
    private $value;
   
    //Constructeur du champ
    public function __construct(string $name, string $type, string $value="")
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }
//<input class=\"form-control\" type='" . $this->type . "' name='" . $this->name . "' value='" . $this->value .  "' />
    public function __toString():string
    {
        return "
        <div class='form-group'>
        <label for='" . $this->name . "'>  </label>

        

        <input class='form-control'  />

        <div class='validate'></div>
        </div>
        ";
    }

    //Setter de la valeur du champ
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    //Getter de la valeur du champ
    public function getValue():string
    {
        return $this->value;
    }

    //Getter du nom du champ
    public function getName():string
    {
        return $this->name;
    }

}
<?php 
    require_once('client.php');
    require_once('compts.php');
    require_once('../class-Manager/clientManager.php');
    
    include_once('../bdd/connexion_bdd.php');


     $client1 = new Client();
     $client1->__toString();
     var_dump($client1);

     $compt1 = new Compts();
     var_dump($compt1);

   
?>
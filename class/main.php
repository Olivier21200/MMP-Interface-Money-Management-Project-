<?php 
    require_once('client.php');
    require_once('compts.php');

     $client1 = new Client();
     $client1->__toString();
     var_dump($client1);

     $compt1 = new Compts();
     var_dump($compt1);

   
?>
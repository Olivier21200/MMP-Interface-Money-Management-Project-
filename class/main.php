<?php 
    require_once('client.php');
    require_once('compts.php');
    require_once('../class-Manager/clientManager.php');
    
    include_once('../bdd/connexion_bdd.php');

    $clientManager = new clientManager($pdo);

    echo $clientManager->get(1);


     $client1 = new Client(9,'Emma','girard',20,'F',0640052760,'8c rue du chateau','Beaune',21200,'emma123@gmail.com','etudiante',1);
     $client1->__toString();
     $clientManager->add($client1);

    // $clientManager->remove(15);
     //$clientManager->remove(14);
     //$clientManager->remove(13);
     //var_dump( $clientManager->getList());



     //var_dump($client1);

     $compt1 = new Compts();
     //var_dump($compt1);
     
     

   
?>
<?php 
    require_once('client.php');
    require_once('compts.php');
    require_once('actionCompt.php');

    require_once('../class-Manager/clientManager.php');
    require_once('../class-Manager/comptsManager.php');
    require_once('../class-Manager/actionComptManager.php');
    
    include_once('../bdd/connexion_bdd.php');

    $clientManager = new clientManager($pdo);
    $comptsManager = new comptsManager($pdo);
    $actionComptManager = new actionComptManager($pdo);

   // echo $clientManager->get(1);


     $client1 = new Client(9,'Emma','girard',20,'F',0640052760,'8c rue du chateau','Beaune',21200,'emma123@gmail.com','etudiante',1);
     $client1->__toString();

     //echo $comptsManager->get(1);
     $compts2 = new compts(1,16,'B',999,2,1000,'2019-12-05');
        echo $actionComptManager->get(1);
    //$actioCompt1 = new actionCompt(2,1,1,-20);
    $res = $actionComptManager->getList();
    var_dump($res);
    //$actionComptManager->add($actioCompt1); 


   
?>
<?php 
    require_once('client.php');
    require_once('compts.php');
    require_once('actionCompt.php');
    require_once('soldSemaine.php');

    require_once('../class-Manager/clientManager.php');
    require_once('../class-Manager/comptsManager.php');
    require_once('../class-Manager/actionComptManager.php');
    require_once('../class-Manager/soldSemaineManager.php');

    include_once('../bdd/connexion_bdd.php');

    $clientManager = new clientManager($pdo);
    $comptsManager = new comptsManager($pdo);
    $actionComptManager = new actionComptManager($pdo);
    $soldSemaineManager = new soldSemaineManager($pdo);
  

    $client1 = new Client(9,'Emma','girard',20,'F',0640052760,'8c rue du chateau','Beaune',21200,'emma123@gmail.com','etudiante',1);
    $client1->__toString();

    echo $soldSemaineManager->get(1);    

   
?>
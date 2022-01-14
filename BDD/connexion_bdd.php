<?php

 //Variable de link avec la bdd
 $host = 'localhost';
 $dbname = 'mmp-interface';
 $username = 'root';
 $password = '';
 
 try //test de conection a la bdd
 {
     $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    
 }
 catch (PDOException $e)  //exception en cas de problème de conection a la bdd
 {
     die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage()); 
 } 
?>
<?php

 //Variable de link avec la bdd
 $host = 'localhost';
 $dbname = 'mmp-interface';
 $username = 'root';
 $password = '';
 $port = '3308';

 try //test de conection a la bdd
 {
     $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
     echo'<h1>Link with bdd Good!</h1>';

 }
 catch (PDOException $e)  //exception en cas de problème de conection a la bdd
 {
     die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage()); 
 } 
?>
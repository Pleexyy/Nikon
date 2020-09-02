<?php
   // mis en place d'une option lors de la connexion à la bdd pour prendre en compte les accents et autres caractères
   $options = array(
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
   );
   $pdo = new PDO('mysql:host=localhost;dbname=NikonV2', 'root', 'couleuvre', $options);
?>

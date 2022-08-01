<?php
include('../bdd.php');
$categorie = $bdd->prepare("SELECT * FROM articles_id INNER JOIN volumes ON articles_id.id_volume = volumes.id INNER JOIN parfums ON articles_id.id_parfum = parfums.id WHERE id_categorie = '".$_POST['id']."'");
$categorie->execute(array());
$categorie = $categorie->fetchAll();
var_dump($categorie);
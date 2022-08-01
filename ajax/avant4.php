<?php
//echo "kikou";
include("../bdd.php");
$req_facture = $bdd->prepare("SELECT numero_commande,date_alerte FROM commandes");

$req_facture->execute(array());
$tableau_deux=array();
$result_facture = $req_facture->fetchAll();
var_dump($result_facture);
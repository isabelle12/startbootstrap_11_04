<?php
include("bdd.php");
$req_distributeurs = $bdd->prepare("SELECT * FROM distributeurs WHERE nom='".$_POST['nom_distributeur']."'");
$req_distributeurs->execute(array());
$listresult = $req_distributeurs->fetch();
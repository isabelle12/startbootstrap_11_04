<?php
// Connexion à la base de données test 
try {
    //$bdd = new PDO('mysql:host=localhost:3306;dbname=sensodiffusion;charset=utf8', 'suivibdd', 'Deathart02');
    $bdd = new PDO('mysql:host=localhost:3306;dbname=sensodiffusion;charset=utf8', 'root', '');
    //$bdd = new PDO('mysql:host=sitewesskobi.mysql.db;dbname=sitewesskobi;charset=utf8', 'sitewesskobi', 'PPee11ee');

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$CMPStock_Pose = 28;
$CMPStock_DEFAULT = 1;
$CMPStock_SAV = 13;

<?php
include("../bdd.php");
//echo $_POST['categorie2'];
$categorie = $_POST['categorie2'];

$req = $bdd->prepare("SELECT * FROM parfum_categorie INNER JOIN parfums ON parfums.id = parfum_categorie.id_parfum WHERE id_categorie_parfum ='" . $categorie . "'");
$req->execute(array());
while($listresult = $req->fetch()){
    //echo $listresult['nom_parfum'];
    $tableau[] = $listresult['nom_parfum'];
}

$data2 = array(
    'parfum1' => $tableau[0],
    'parfum2' => $tableau[1],
    'parfum3' => $tableau[2],
    'parfum4' => $tableau[3],
    'parfum5' => $tableau[4],
    'parfum6' => $tableau[5],
    'parfum7' => $tableau[6],
    'parfum8' => $tableau[7],
    'parfum9' => $tableau[8],

);

echo json_encode($data2);

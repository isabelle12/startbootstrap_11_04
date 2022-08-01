<?php
include("../bdd.php");
//echo $_POST['categorie'];
$output = array();

$categorie = $_POST['categorie'];
$req = $bdd->prepare("SELECT * FROM categorie_volume INNER JOIN volumes ON categorie_volume.id_volume = volumes.id WHERE id_categorie ='" . $categorie . "'");
$req->execute(array());
//$req = $req->fetchAll();
//var_dump($req);
while($listresult = $req->fetch()){
$output[] = $listresult['quantite'];
}
//var_dump($output);

/*$data = array(
    'volume1' => $output[0],
    'volume2' => $output[1],
    'categorie' => $categorie
);*/
$data=array();
for($i=0;$i<count($output);$i++){
    $nom = "nom".$i;   
    $data[$nom]=$output[$i];
}
var_dump($data);

//Retour JSON
echo json_encode($data);

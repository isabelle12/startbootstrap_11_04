<?php
include('../bdd.php');
$categorie = $_POST['categorie'];
//echo $categorie;
//volume
$req_qtes = $bdd->prepare("SELECT * FROM categorie_volume INNER JOIN volumes ON categorie_volume.id_volume = volumes.id WHERE id_categorie = '".$categorie."'");
$req_qtes->execute(array());
$req_qtes = $req_qtes->fetchAll();
//var_dump($req_qtes);

foreach($req_qtes as $req_qte){
    $output[]=$req_qte['quantite'];
    $tableau_id[]=$req_qte['id'];
}

$tableau_associatif = array();
for($i=0;$i<count($output);$i++){
    $nom = "nom".$i;   
    $tableau_associatif[$nom]=$output[$i];
}
$html="<option value=''>Choisis un volume / poids</option>";
foreach($tableau_associatif as $clef => $valeur){
    echo $clef;
    echo $valeur;
    $html .= "<option value =  >".$valeur."</option>";
}
//fin volume

//parfums
$req_parfums = $bdd->prepare("SELECT * FROM parfum_categorie INNER JOIN parfums ON parfum_categorie.id_parfum = parfums.id WHERE id_categorie_parfum = '".$categorie."'");
$req_parfums->execute(array());
$req_parfums = $req_parfums->fetchAll();

foreach($req_parfums as $req_parfum){
    $output2[]=$req_parfum['nom_parfum'];
}

$tableau_associatif2 = array();

for($i=0;$i<count($output2);$i++){
    $nom = "nom".$i;   
    $tableau_associatif2[$nom]=$output2[$i];
}

$html2="<option value=''>Choisis un parfum</option>";
foreach($tableau_associatif2 as $clef => $valeur){
    $html2 .= "<option>".$valeur."</option>";
}
//fin parfums

//categories
$html3 = '';
//$req_categories = $bdd->prepare("SELECT * FROM categories INNER JOIN categorie_volume ON categories.id = categorie_volume.id_categorie INNER JOIN volumes ON categorie_volume.id_volume = volumes.id WHERE categories.id = '".$categorie."'");
$req_categories = $bdd->prepare("SELECT * FROM categories WHERE categories.id = '".$categorie."'");
$req_categories->execute(array());
$req_categories = $req_categories->fetch();
//echo $req_categories['nom'];

$req_qtes = $bdd->prepare("SELECT * FROM categorie_volume INNER JOIN volumes ON categorie_volume.id_volume = volumes.id WHERE categorie_volume.id_categorie = '".$categorie."'");
$req_qtes->execute(array());
$req_parfums = $bdd->prepare("SELECT * FROM parfum_categorie INNER JOIN parfums ON parfum_categorie.id_parfum = parfums.id WHERE parfum_categorie.id_categorie_parfum = '".$categorie."'");
$req_parfums->execute(array());
/*$req_parfums = $req_parfums->fetchAll();
var_dump($req_parfums);
/*$listresult = $req_qtes->fetchAll();
var_dump($listresult);*/
$html3 .= "<td>".$req_categories['nom']."</td><td style='width:300px;'>".$req_categories['description']."</td><td style='width:400px;' id='td_qte'>";  

while($listresult = $req_qtes->fetch()){
    
    $html3 .= $listresult['quantite']."<br/>";
}
$html3 .="</td><td id='td_parfum'>";
while($listresult = $req_parfums->fetch()){
    //echo $req_parfums->fetch();
    $html3 .= $listresult['nom_parfum']."<br/>";
}
$html3 .="</td>";

//echo $html3;

//tableau volume et parfums
$data = array(    
    'rappel_alert' => $html,
    'rappel_alert2' => $html2,
    'categorie'     => $html3

);
echo json_encode($data);


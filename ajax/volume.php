<?php
session_start();
include('../bdd.php');
$categorie = $_SESSION['categorie'];
$qte = $_POST['id_qte'];
$volume = $_POST['id_qte'];
$_SESSION['volume'] = $volume;

//$req = $bdd->prepare("SELECT categories.nom,articles_id.id_volume,articles_id.img,volumes.quantite AS volume_quantite,articles_id.id AS id_article,parfums.nom_parfum FROM articles_id INNER JOIN categories  ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id = articles_id.id_volume INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE id_categorie = '".$categorie."' AND id_volume = '".$volume."'");
$req = $bdd->prepare("SELECT categories.nom,articles_id.id AS id_article,articles_id.prix_vente,articles_id.prix_au_DV,articles_id.quantite AS nbre_quantite,articles_id.img,parfums.nom_parfum,volumes.quantite AS volume_quantite FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id=articles_id.id_volume INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE id_categorie = '".$categorie."' AND id_volume = '".$volume."'");
$req->execute(array());
//categories.nom,volumes.quantite  AS volume_quantite 
//$listresult = $req->fetchAll();
/*echo $listresult['nom'];

var_dump($req);*/
$html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>prix de vente</th><th>prix au DV</th></tr>";
while($listresult = $req->fetch()){
    //echo $listresult['img'];
    
    $image = $listresult['img']; 
    //echo $listresult['id_article'];
    
    $html3 .="<tr><td><a href='./modif2.php?id=".$listresult['id_article']."&parfum=".$listresult['nom_parfum']."&volume=".$listresult['volume_quantite']."&id_categorie=".$categorie."'>".$listresult["nom"]."</a></td><td>".$listresult['volume_quantite']."</td><td>".$listresult['nom_parfum']."</td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";
} 
$html3.="<input id='id_hidden' type='hidden' value=".$volume."</table>";
//echo $html3;

$data_qte = array(
    'qte_nouveau' => $html3
);
echo json_encode($data_qte);
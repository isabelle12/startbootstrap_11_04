<?php
session_start();
include('../bdd.php');
$categorie = $_SESSION['categorie'];
$parfum = $_POST['parfum'];


//echo $_SESSION['volume'];
/*if(!empty($_SESSION['volume'])){
    echo "existe";
}
else{echo "non n'existe pas";}*/

if (isset($_POST['volume'])){
    //echo $_POST['volume'];
    $volume = $_POST['volume'];
    $req = $bdd->prepare("SELECT articles_id.id AS id_article,categories.nom,articles_id.prix_vente,articles_id.prix_au_DV,articles_id.img,parfums.nom_parfum,articles_id.quantite AS nbre_quantite,volumes.quantite AS volume_quantite FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id=articles_id.id_volume INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE id_categorie = '".$categorie."' AND id_volume = '".$volume."' AND id_parfum = '".$parfum."'");
    $req->execute(array());
    //$result = $req->fetchAll();
    //var_dump($result);
    $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>Prix de vente</th><th>Prix au DV</th></tr>";
    while($listresult = $req->fetch()){
    //echo $listresult['img'];
    
        $image = $listresult['img']; 
        

        $html3 .="<tr><td><a href='./modif2.php?id=".$listresult['id_article']."&volume=".$listresult['volume_quantite']."&id_categorie=".$categorie."'>".$listresult["nom"]."</a></td><td>".$listresult['volume_quantite']."</td><td>".$listresult['nom_parfum']."</td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";
    } 
    $html3.="</table>";
    $data_parfum = array(
        'parfum' => $html3
    );
    echo json_encode($data_parfum);
}
else{
    $req = $bdd->prepare("SELECT categories.nom,articles_id.id AS id_article,articles_id.prix_vente,articles_id.prix_au_DV,articles_id.img,parfums.nom_parfum,articles_id.quantite AS nbre_quantite FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE id_categorie = '".$categorie."' AND id_parfum = '".$parfum."'");
    $req->execute(array());
    //$result = $req->fetchAll();
    //var_dump($result);
    $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>Prix de vente</th><th>Prix au DV</th></tr>";
    while($listresult = $req->fetch()){
    //echo $listresult['img'];
    
        $image = $listresult['img']; 
        

        $html3 .="<tr><td><a href='./modif2.php?id=".$listresult["id_article"]."&id_categorie=".$categorie."'>".$listresult["nom"]."</a></td><td></td><td>".$listresult['nom_parfum']."</td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";
    } 
    $html3.="</table>";
    //echo $html3;
    $data_parfum = array(
        'parfum' => $html3
    );
    echo json_encode($data_parfum);
}

//categories.nom,volumes.quantite  AS volume_quantite 
//$listresult = $req->fetchAll();
/*echo $listresult['nom'];

var_dump($req);*/



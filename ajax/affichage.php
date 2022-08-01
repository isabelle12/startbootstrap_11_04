<?php
include('../bdd.php');
$id_article2 = $_POST['id'];
echo $_POST['id'];
$articles = $bdd->prepare("SELECT id_categorie,id AS id_article FROM articles_id");
$articles->execute(array());
while($articles_result = $articles->fetch()){
    $id_article = $articles_result['id_article'];
    //echo $articles_result['id_categorie'];
    $categorie_champs = $articles_result['id_categorie'];
    $champs = $bdd->prepare("SELECT parfum_absent,contenance_absent FROM manque_champs WHERE id_categorie = '".$categorie_champs."'");
    $champs->execute(array());
    while($result_parfum_absent = $champs->fetch()){
   
        if($result_parfum_absent['parfum_absent']==1 AND $result_parfum_absent['contenance_absent']==1){                                          
    
            $req_produit = $bdd->prepare("SELECT categories.nom,volumes.quantite,parfums.nom_parfum,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id INNER JOIN parfums ON articles_id.id_parfum = parfums.id WHERE articles_id.id ='".$id_article."'");
            $req_produit->execute(array());
            //$req_volume = $req_volume->fetchAll();    
            while($result = $req_produit->fetch()){  
            
                $chaine = $result['nom']." ".$result['quantite']." ".$result['nom_parfum'];  
            
            }
        }
        if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==1){
            $req_volume = $bdd->prepare("SELECT categories.nom,volumes.quantite,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id WHERE articles_id.id ='".$id_article."'");
            $req_volume->execute(array());
            //$req_volume = $req_volume->fetchAll();    
            while($result = $req_volume->fetch()){  
            $chaine = $result['nom']." ".$result['quantite'];  
            }
        }  
        if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==0){
            $req_volume = $bdd->prepare("SELECT categories.nom,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id WHERE articles_id.id ='".$id_article."'");
            $req_volume->execute(array());
            //$req_volume = $req_volume->fetchAll();    
            while($result = $req_volume->fetch()){  
             $chaine = $result['nom'];  
            }
        }                                        

    }
}
echo $chaine;
$data = array(
    'chaine'=>$chaine
);
echo json_encode($data);
<?php
include('../bdd.php');
//echo $_POST['id'];
$id = $_POST['id'];
$req_produit = $bdd->prepare("SELECT * FROM articles_id WHERE id='".$id."'");
$req_produit->execute(array());
$result_produit = $req_produit->fetch();
//var_dump($result_produit);
//echo $result_produit['id_categorie'];
$categorie_champs = $result_produit['id_categorie'];
$champs = $bdd->prepare("SELECT parfum_absent,contenance_absent FROM manque_champs WHERE id_categorie = '".$categorie_champs."'");
$champs->execute(array());
while($result_parfum_absent = $champs->fetch()){
    if($result_parfum_absent['parfum_absent']==1 AND $result_parfum_absent['contenance_absent']==1){ 
        $req_produit_cat = $bdd->prepare("SELECT articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,volumes.quantite,parfums.nom_parfum,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id INNER JOIN parfums ON articles_id.id_parfum = parfums.id WHERE articles_id.id ='".$id."'");
        $req_produit_cat->execute(array());
        $result = $req_produit_cat->fetch();   
            /*echo $result['nom'];
            echo $result['quantite'];
            echo $result['nom_parfum'];*/

        $data = array(
            'nom' => $result['nom'],
            'qte' => $result['quantite'],
            'parfum' => $result['nom_parfum'],    
            'id' => $_POST['id']
        );
        echo json_encode($data);
    }

    if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==1){
        //echo "marche";
        $req_volume = $bdd->prepare("SELECT articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,volumes.quantite,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id WHERE articles_id.id ='".$id."'");
        $req_volume->execute(array());
        //$req_volume = $req_volume->fetchAll();    
        $result = $req_volume->fetch();

        $data = array(
            'nom' => $result['nom'],
            'qte' => $result['quantite'],
            'id' => $_POST['id']

        );
        echo json_encode($data);

    }
       
    if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==0){
        $req_volume = $bdd->prepare("SELECT articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id WHERE articles_id.id ='".$id."'");
        $req_volume->execute(array());
        //$req_volume = $req_volume->fetchAll();    
        $result = $req_volume->fetch();   

            $data = array(
                'nom' => $result['nom'],
                'id' => $_POST['id']

            );
            echo json_encode($data);
    }    
}  
//var_dump($result);        

/*if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==1){
    //echo "marche";
    $req_volume = $bdd->prepare("SELECT articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,volumes.quantite,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id WHERE articles_id.id ='".$tableau_produits[$i]."'");
    $req_volume->execute(array());
    //$req_volume = $req_volume->fetchAll();    
    while($result = $req_volume->fetch()){

    }
}*/
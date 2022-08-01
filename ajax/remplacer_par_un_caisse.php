<?php
    $id = $_POST['id'];
    include('../bdd.php');
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
            $req_produit_cat = $bdd->prepare("SELECT prix_au_DV,articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,volumes.quantite,parfums.nom_parfum,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id INNER JOIN parfums ON articles_id.id_parfum = parfums.id WHERE articles_id.id ='".$id."'");
            $req_produit_cat->execute(array());
            $result = $req_produit_cat->fetch(); 
                /*echo $result['nom'];
                echo $result['quantite'];
                echo $result['nom_parfum'];*/
            $chaine = $result['nom']." ".$result['quantite']." ".$result['nom_parfum'];
            //$tableau_prix[] = $result['prix_au_DV']; 
            $soustraction = intval($result['article_qte'])-intval($_POST['qte_choisie']);
            if($soustraction<0){
                $soustraction = 0;}

            $req_supprimer_qte = $bdd->prepare("UPDATE articles_id SET quantite = :soustraction WHERE id=:id");
            $req_supprimer_qte->execute(array(
                ':soustraction' =>$soustraction,
                ':id' =>$id
            ));

        }
   
        if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==1){
            //echo "marche";
            $req_volume = $bdd->prepare("SELECT prix_au_DV,articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,volumes.quantite,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id WHERE articles_id.id ='".$id."'");
            $req_volume->execute(array());
            //$req_volume = $req_volume->fetchAll();    
            $result = $req_volume->fetch();
            $chaine = $result['nom']." ".$result['quantite'];
            /*$tableau_chaine[]=$chaine;
            $tableau_prix[] = $result['prix_au_DV'];*/
            $soustraction = intval($result['article_qte'])-intval($_POST['qte_choisie']);
            if($soustraction<0){
                $soustraction = 0;}

            $req_supprimer_qte = $bdd->prepare("UPDATE articles_id SET quantite = :soustraction WHERE id=:id");
            $req_supprimer_qte->execute(array(
                ':soustraction' =>$soustraction,
                ':id' =>$id
            ));
   
        }
           
        if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==0){
            $req_volume = $bdd->prepare("SELECT prix_vente,prix_au_DV,articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id WHERE articles_id.id ='".$id."'");
            $req_volume->execute(array());
            //$req_volume = $req_volume->fetchAll();    
            $result = $req_volume->fetch();  
            $chaine = $result['nom'];
            /*$tableau_chaine[]=$chaine;
            $tableau_prix[] = $result['prix_au_DV'];*/
            $soustraction = intval($result['article_qte'])-intval($_POST['qte_choisie']);
            if($soustraction<0){
                $soustraction = 0;}

            $req_supprimer_qte = $bdd->prepare("UPDATE articles_id SET quantite = :soustraction WHERE id=:id");
            $req_supprimer_qte->execute(array(
                ':soustraction' =>$soustraction,
                ':id' =>$id
            ));
               
        }    
    }
    $data = array(
        'chaine' =>$chaine,
        'prix' =>$result['prix_au_DV'],
        'prix2' =>$result['prix_vente']

    );
    echo json_encode($data);
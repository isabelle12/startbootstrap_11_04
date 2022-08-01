<?php
include('../bdd.php');
//echo $_POST['id'];
//var_dump($_POST['tableau_inputs']);
//var_dump($_POST['tableau']);

//select commande :
$nom_distributeur = $_POST['nom_distributeur'];
$commandes_distributeur = $bdd->prepare("SELECT numero_commande,date_commande,date_alerte FROM commandes WHERE nom_distributeur =  '".$nom_distributeur."'");
$commandes_distributeur->execute(array());
/*$commande_distributeur = $commandes_distributeur->fetchAll();
var_dump($commande_distributeur);*/
while($commande_distributeur = $commandes_distributeur->fetch()){    
    $num_date = array();
    $num_date[] = $commande_distributeur['numero_commande'];
    $num_date[] = $commande_distributeur['date_commande'];
    $num_date[] = $commande_distributeur['date_alerte'];

    $tableau_commandes[] = $num_date;

    //var_dump($tableau_commandes);

}
//var_dump($tableau_commandes);
//fin select commande

$tableau_produits = $_POST['tableau'];
$grand_tableau=array();
for($i=0;$i<count($tableau_produits);$i++){
    $req_produit = $bdd->prepare("SELECT * FROM articles_id WHERE id='".$tableau_produits[$i]."'");
    $req_produit->execute(array());
    $result_produit = $req_produit->fetch();
    //var_dump($result_produit);
    //echo $result_produit['id_categorie'];
    $categorie_champs = $result_produit['id_categorie'];
    $champs = $bdd->prepare("SELECT parfum_absent,contenance_absent FROM manque_champs WHERE id_categorie = '".$categorie_champs."'");
    $champs->execute(array());
    while($result_parfum_absent = $champs->fetch()){
        
        if($result_parfum_absent['parfum_absent']==1 AND $result_parfum_absent['contenance_absent']==1){ 
            $req_produit_cat = $bdd->prepare("SELECT articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,volumes.quantite,parfums.nom_parfum,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id INNER JOIN parfums ON articles_id.id_parfum = parfums.id WHERE articles_id.id ='".$tableau_produits[$i]."'");
            $req_produit_cat->execute(array());
            //$req_volume = $req_volume->fetchAll();    
            while($result = $req_produit_cat->fetch()){
                $tableau_details=array(); 
                
                $tableau_details[]=$result['nom'];
                $tableau_details[]=$result['quantite'];
                $tableau_details[]=$result['nom_parfum'];
                $tableau_qte[]=$result['article_qte'];
                $tableau_prix_vente[]=$result['prix_vente'];

                //var_dump($tableau_details);
            }
        }
        if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==1){
            //echo "marche";
            $req_volume = $bdd->prepare("SELECT articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,volumes.quantite,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id WHERE articles_id.id ='".$tableau_produits[$i]."'");
            $req_volume->execute(array());
            //$req_volume = $req_volume->fetchAll();    
            while($result = $req_volume->fetch()){
                $tableau_details=array(); 

                $tableau_details[]=$result['nom'];
                $tableau_details[]=$result['quantite'];
                $tableau_qte[]=$result['article_qte'];
                $tableau_prix_vente[]=$result['prix_vente'];

            }
        }   
        if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==0){
            $req_volume = $bdd->prepare("SELECT articles_id.prix_vente AS prix_vente,articles_id.quantite AS article_qte,categories.nom,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id WHERE articles_id.id ='".$tableau_produits[$i]."'");
            $req_volume->execute(array());
            //$req_volume = $req_volume->fetchAll();    
            while($result = $req_volume->fetch()){   
                $tableau_details=array(); 

                $tableau_details[]=$result['nom'];
                $tableau_qte[]=$result['article_qte'];
                $tableau_prix_vente[]=$result['prix_vente'];

            }
        }      
        
    }
    $grand_tableau[$i]=$tableau_details;
    //$grand_tableau_qte[$i]=$tableau_qte;

}
//var_dump($grand_tableau);
$tableau_produits = $_POST['tableau'];

$taille_tableau_produits = count($tableau_produits);
$nom_distributeur=$_POST['nom_distributeur'];
//echo $nom_distributeur;
$req_distributeurs = $bdd->prepare("SELECT * FROM distributeurs WHERE nom='".$nom_distributeur."'");
$req_distributeurs->execute(array());
$listresult = $req_distributeurs->fetch();
/*var_dump($listresult);*/

$req_produit = $bdd->prepare("SELECT * FROM articles_id");
//$req_facture = $bdd->prepare("SELECT numero_facture,numero_commande,date_alerte FROM facture");
$req_facture = $bdd->prepare("SELECT numero_commande,date_alerte FROM commandes");

$req_facture->execute(array());
$tableau_deux=array();
$result_facture = $req_facture->fetchAll();

if(empty($result_facture)){
    $chaine2 = "FR-100-0001";
    $chaine3="0001";
}
else{
    foreach($result_facture as $facture){
        //echo $result_facture['numero_facture'];
        //$tableau = explode("-",$facture['numero_facture']);
        $tableau_commande[] = intval($facture['numero_commande']);
        /*echo "tableau";
        var_dump($tableau);
        echo "tableau";*/
        //$tableau_deux[]=intval($tableau[2]);
        //$ids[] = $result_facture['id'];
    }
    $plus_commande = max($tableau_commande)+1;
    //$plus = max($tableau_deux)+1;
    //$chaine = strval($plus);
    $chaine_commande = strval($plus_commande);
    //$longueur = strlen($chaine);
    $longueur_commande = strlen($chaine_commande);
    $zeros_commande = 4-$longueur_commande;
    $chaine3="";
    for($i=0;$i<$zeros_commande;$i++){
        $chaine3 .= "0";
    }
    //$zeros=4-$longueur;
    $chaine2="";
    /*for($i=0;$i<$zeros;$i++){
        $chaine2 .= "0";
    }*/
    $chaine3.=$chaine_commande;
    //$chaine2.=$chaine;
    $chaine2="FR-100-".$chaine2;
}

$date = date('Y-m-d');
$stamp = strtotime($date);

$vingt_huit_jours = 24*60*60*28;
$somme = $stamp+$vingt_huit_jours;
$date_convertie = date('Y-m-d', $somme);
$jour_semaine = date('l', $somme);
if($jour_semaine=="Sunday"){
    $deux_jours = 24*60*60*2;
    $nouvelle_date = $somme - $deux_jours;
    $date_convertie = date('Y-m-d', $nouvelle_date);
}

if($jour_semaine=="Saturday"){
    $deux_jours = 24*60*60;
    $nouvelle_date = $somme - $deux_jours;
    $date_convertie = date('Y-m-d', $nouvelle_date);
}

//insertion : 
/*$insertion = $bdd->prepare("INSERT INTO facture(numero_facture,numero_commande,date_commande,date_alerte) VALUES(:numero_facture,:numero_commande,:date_commande,:date_alerte)");
$insertion->execute(array(
    ':numero_facture' => $chaine2,
    ':numero_commande' => $chaine3,
    ':date_commande' => $date,
    ':date_alerte' => $date_convertie,
));*/
$insertion = $bdd->prepare("INSERT INTO commandes(numero_commande,date_commande,date_alerte) VALUES(:numero_commande,:date_commande,:date_alerte)");
$insertion->execute(array(
    ':numero_commande' => $chaine3,
    ':date_commande' => $date,
    ':date_alerte' => $date_convertie,
));

$lastid = $bdd->lastInsertId();


$facture = $bdd->prepare("SELECT date_alerte FROM facture WHERE id='".$lastid."'");
$facture->execute(array());
$facture = $facture->fetch();


//echo $listresult["nom"];
$html3=$listresult["nom"];
$html2 = $listresult["details_adresse"];
$html = $listresult["adresse"];
$html4 = $listresult["mail"];
$html5 = $listresult["telephone"];
$html6 = $facture["date_alerte"];

//$html6 = max($ids);
$data = array(
    'nom' => $html3,
    'details' =>$html2,
    'adresse' =>$html,
    'mail' =>$html4,
    'telephone' =>$html5,
    'alerte' =>$html6,
    'num_facture' =>$chaine2,
    'num_commande' =>$chaine3,
    'taille_tableau_produits' =>$taille_tableau_produits,
    'tableau_commandes' =>$tableau_commandes
);
for($i=0;$i<count($tableau_produits);$i++){
    $cle = "produit".$i;
    //echo $cle;
    $data[$cle]=$tableau_produits[$i];
    //var_dump($grand_tableau[$i]);
    $chaine4 = "";
    //$chaine5 = "";

    foreach($grand_tableau[$i] as $cellule){
        $chaine4.=$cellule." ";
    }
    /*foreach($grand_tableau_qte[$i] as $cellule){
        $chaine5.=$cellule." ";
    }*/
    
    $cle_chaine = "article";
    //$cle_qte = "qte";

    $data[$cle_chaine]=$chaine4;
    $tableau_final[]=$chaine4;
    //$tableau_final_qte[]=$chaine5;

}
//var_dump($tableau_final);
$data['article']=$tableau_final;
$data['qte']=$tableau_qte;
$data['prix_vente']=$tableau_prix_vente;


echo json_encode($data);
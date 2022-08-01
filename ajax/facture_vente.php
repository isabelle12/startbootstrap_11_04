<?php
include("../bdd.php");

//echo $_POST['num_commande'];
$commande = $_POST['num_commande'];
$req = $bdd->prepare("SELECT produit,qte,prix_DV,prix_vente,date_alerte FROM commandes WHERE numero_commande='".$commande."'");
$req->execute(array());
$req = $req->fetchAll();
foreach($req as $cellule){
    //var_dump($cellule);
    $produits[] = $cellule['produit'];
    $qte[] = $cellule['qte'];
    $prix_DV[] = $cellule['prix_DV'];
    $prix_vente[] = $cellule['prix_vente'];

}
//var_dump($produits);
$taille = count($req);

$stamp = strtotime($req[0]['date_alerte']);
$date_alerte = date("d-m-Y",$stamp);
//echo $date_alerte;

$date = date("d-m-Y");
$req_BL = $bdd->prepare("SELECT numero_facture FROM facture");
$req_BL->execute(array());
$req_BL = $req_BL->fetchAll();
//var_dump($req_BL);
if(empty($req_BL)){
    $nom_BL="facture".$date."-001";
}
else{

foreach($req_BL as $cellule){
    $scinder = explode("-",$cellule['numero_facture']);
    $tableau_dernier[] = (int)$scinder[3];
    }
    $max = max($tableau_dernier);
    $BL = $max+1;
    $chaine_BL = strval($BL);
    $longueur = strlen($chaine_BL);
    if($longueur == 1){
        $chaine_finale = "facture".$date."-00".$chaine_BL;
    }
    if($longueur == 2){
        $chaine_finale = "facture".$date."-0".$chaine_BL;
    }
    if($longueur == 3){
        $chaine_finale =  "facture".$date."-".$chaine_BL;
    }
    $nom_BL=$chaine_finale;

}
//echo $nom_BL;

$data=array(
    'alerte'=>$date_alerte,
    'num_facture'=>$nom_BL,
    'taille'=>$taille,
    'produits'=>$produits,
    'prix_vente'=>$prix_vente,
    'prix_DV'=>$prix_DV,
    'qte'=>$qte,


);
echo json_encode($data);
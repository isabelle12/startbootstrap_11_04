<?php
//echo "kikou";
include("../bdd.php");
$req_facture = $bdd->prepare("SELECT numero_commande,date_alerte FROM commandes");

$req_facture->execute(array());
$tableau_deux=array();
$result_facture = $req_facture->fetchAll();

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
    /*echo "max";
    echo max($tableau_commande);
    echo "max";*/

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


$data = array(
    'nom' => $_POST['nom_distributeur'],
    'num_commande' => $chaine3
    
);
echo json_encode($data);
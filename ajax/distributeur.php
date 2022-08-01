<?php
include('../bdd.php');
//echo $_POST['id'];
//var_dump($_POST['tableau_inputs']);
//var_dump($_POST['tableau']);

//select commande :
$nom_distributeur = $_POST['input_nom'];
$commandes_distributeur = $bdd->prepare("SELECT DISTINCT numero_commande FROM commandes WHERE nom_distributeur =  '".$nom_distributeur."'");
$commandes_distributeur->execute(array());
/*$commande_distributeur = $commandes_distributeur->fetchAll();
var_dump($commande_distributeur);*/
while($commande_distributeur = $commandes_distributeur->fetch()){    
    //$num_date = array();
    $num_date[] = $commande_distributeur['numero_commande'];
    

}

$grand_tableau=array();

//var_dump($grand_tableau);

$nom_distributeur=$_POST['input_nom'];
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
/*$insertion = $bdd->prepare("INSERT INTO commandes(numero_commande,date_commande,date_alerte) VALUES(:numero_commande,:date_commande,:date_alerte)");
$insertion->execute(array(
    ':numero_commande' => $chaine3,
    ':date_commande' => $date,
    ':date_alerte' => $date_convertie,
));*/

$lastid = $bdd->lastInsertId();


$facture = $bdd->prepare("SELECT date_alerte FROM facture WHERE id='".$lastid."'");
$facture->execute(array());
$facture = $facture->fetch();


//echo $listresult["nom"];
$html3=$listresult["nom"];
$html2 = $listresult["details_adresse"];
$html = $listresult["adresse"];
$enseigne = $listresult["enseigne"];

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
    'tableau_commandes' =>$num_date,
    'enseigne' =>$enseigne,

);


//var_dump($tableau_final);


echo json_encode($data);
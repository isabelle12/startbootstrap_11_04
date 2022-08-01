<?php
include('../bdd.php');
if(isset($_POST['nom'])){
    /*echo $_POST['nom'];
    echo $_POST['adresse'];
    echo $_POST['telephone'];
    echo $_POST['details_adresse'];
    echo $_POST['mail'];*/
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

    $req_distributeur = $bdd->prepare("INSERT INTO distributeurs(DV_vente,nom,adresse,telephone,details_adresse,mail) VALUES('DV',:nom,:adresse,:telephone,:details,:mail)");
    $req_distributeur->execute(array(
        ':nom' => $_POST['nom'],
        ':adresse' =>  $_POST['adresse'],
        ':telephone' =>  $_POST['telephone'],
        ':details' =>  $_POST['details_adresse'],
        ':mail' =>  $_POST['mail'],
        
    ));
    echo "success";
}
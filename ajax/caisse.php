<?php
    include('../bdd.php');
    $req = $bdd->prepare("SELECT montant FROM caisse");
    $req->execute(array());
    $req=$req->fetch();
    //echo $_POST['resultat'];
    if(empty($req)){
        $montant = 0;
        $somme = $_POST['resultat'];
        $req_insertion = $bdd->prepare("INSERT INTO caisse(montant) VALUES(:somme)");
        $req_insertion->execute(array(
        ':somme' =>$_POST['resultat'],
    ));
    }
    else{
        $montant = $req['montant'];
    
    $somme = $_POST['resultat'] + $req['montant'];
    
    $req_insertion = $bdd->prepare("UPDATE caisse SET montant = :somme WHERE montant = :montant");
    $req_insertion->execute(array(
        ':somme' =>$somme,
        ':montant' =>$req['montant'],
    ));
}

    $data = array(
        'montant' =>$montant,
        'somme' =>$somme
    );
    echo json_encode($data);
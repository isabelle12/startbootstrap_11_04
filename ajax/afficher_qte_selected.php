<?php
$qte = $_POST['id_qte'];
/*echo "id";
echo $_POST['id_qte'];
echo "id";*/

/*$req = $bdd->prepare("SELECT * FROM volumes WHERE id='".$qte."'");
$req->execute(array());
$req = $req->fetch();*/
//echo $req['quantite'];
$data_qte = array(    
    'qte_nouveau' => $qte,
);
//var_dump($data_qte);
echo json_encode($data_qte);

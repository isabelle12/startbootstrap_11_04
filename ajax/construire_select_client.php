<?php
include('../bdd.php');
//echo $_POST['client'];
$client = $_POST['client'];
$req_client = $bdd->prepare("SELECT * FROM clients WHERE id='".$client."'");
$req_client->execute(array());
//$req_client = $req_client->fetchAll();
//var_dump($req_client);
$html3='';
while($listresult = $req_client->fetch()){
    $html3 .= "<td>".$listresult['nom']."</td><td>".$listresult['prenom']."</td><td>".$listresult['adresse']."</td>";
}
/*echo "html";
echo $html3;
echo "html";*/

$data3 = array(
    'client' => $html3
);

echo json_encode($data3);


<?php
$data = array(
    'produit'=>$_POST['produit']
    'qte'=>$_POST['qte']

)
echo json_encode($data);

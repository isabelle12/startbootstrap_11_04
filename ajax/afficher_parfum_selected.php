<?php
$parfum = $_POST['parfum'];
//echo $parfum;
$data_parfum = array(    
    'parfum_data' => $parfum,
);
//var_dump($data_qte);
echo json_encode($data_parfum);

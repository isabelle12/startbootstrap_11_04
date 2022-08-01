<?php
include('bdd.php');
include('header2.php');

$suppr = $bdd->prepare("DELETE FROM facture WHERE id='".$_GET['id']."'");
$suppr->execute(array());

$req_non_paye = $bdd->prepare("SELECT * FROM facture WHERE paye_nonpaye='nonpaye'");
$req_non_paye->execute(array());
?>
<table class='table table-bordered' style='background-color:white'>
<tr><th>Numéro facture</th><th>Numéro commande</th><th>Date facture</th><th>Date commande</th><th>Nom distributeur</th><th>Date encaissement</th></tr>
<?php
$req_non_paye=$req_non_paye->fetchAll();
for($i=0;$i<count($req_non_paye);$i++){
    ?>
    <tr>
        <td><?php 
        //echo $cellule['numero_facture']; 
        echo $req_non_paye[$i]['numero_facture']; 
        ?></td>
        <td><?php 
        //echo $cellule['numero_commande']; 
        echo $req_non_paye[$i]['numero_commande']; 

        ?></td>
        <td><?php 
        
        //$date = $cellule['date_facture'];
        $date = $req_non_paye[$i]['date_facture']; 

        $date = strtotime($date);
        $date=date("d-m-Y",$date);
        echo $date; 
        ?></td>
        
        <td><?php 
        //$date = $cellule['date_commande'];
        $date = $req_non_paye[$i]['date_commande']; 

        $date = strtotime($date);
        $date=date("d-m-Y",$date);
        echo $date;
        ?></td>
        <td><?php 
        //echo $cellule['nom_distributeur']; 
        echo $req_non_paye[$i]['nom_distributeur']; 

        ?></td>
        <td><?php 
        //$date = $cellule['date_limite_encaissement'];
        $date = $req_non_paye[$i]['date_limite_encaissement']; 
        $date = strtotime($date);
        $date=date("d-m-Y",$date);
        echo $date;
        ?></td>
        <td>
            <a href="trt_paye.php?id=<?php echo $req_non_paye[$i]['id'];?>"<button id="btn_paye<?php echo $i; ?>" class="paye btn btn-secondary btn-lg ">Passer en payé</button></td>

        <?php
}
?>
</table>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/js.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.signature.min.js"></script>
<script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script>


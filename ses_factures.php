<?php 
include('bdd.php');
include('header2.php');

$ses_BC = $bdd->prepare("SELECT * FROM facture WHERE nom_distributeur='".$_GET['nom']."'");
$ses_BC->execute(array());
$ses_BC = $ses_BC->fetchAll();
?>
<div style="margin-left:40px;margin-top:30px;margin-bottom:40px;">
<a href="non_payee.php"><button type="button" class="btn btn-success btn-lg ">Fact non payées</button></a>
<h2 style="margin-bottom:40px;margin-top:40px;">Factures de <?= $_GET['nom']; ?> (pour éditer une facture cliquer sur son numéro)</h2>
<table class='table table-bordered' style='background-color:white'>
<tr>
<th>Numéro facture</th><th>Date facture</th><th>Numéro commande</th><th>Date commande</th><th>Date échéance</th><th>Payé/non payé</th><th>DL encaissement</th>
</tr>
<?php foreach($ses_BC as $son_BC){ 
    $date_commande = strtotime($son_BC['date_commande']) ;
    $date_commande = date("d-m-Y",$date_commande);
    $date_alerte = strtotime($son_BC['date_alerte']) ;
    $date_alerte = date("d-m-Y",$date_alerte);
    $date_facture = strtotime($son_BC['date_facture']) ;
    $date_facture = date("d-m-Y",$date_facture);
    if(isset($son_BC['date_limite_encaissement'])){
    $date_encaissement = strtotime($son_BC['date_limite_encaissement']) ;
    $date_encaissement = date("d-m-Y",$date_encaissement);}
    else{$date_encaissement = "";}
    ?>
    <tr>
        <td><a href="upload/<?= $son_BC['numero_facture']?>"><?= $son_BC['numero_facture'] ?></a> </td>
        <td><?= $date_facture ?> </td>
        <td><?=$son_BC['numero_facture']?></td>
        <td><?= $date_commande ?> </td>
        <td><?= $date_alerte ?> </td>
        <td><?=$son_BC['paye_nonpaye']?></td>
        <td><?php echo $date_encaissement; ?></td>
        <td><a href="mail_intermediaire_facture.php?file=<?=$son_BC['numero_facture'] ?>"><button class="btn btn-success btn-lg">Envoyer par mail</button></a>



       

    </tr>
        <?php
} ?>

</table>
</div>
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

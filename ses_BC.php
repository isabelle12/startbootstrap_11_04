<?php 
include('bdd.php');
include('header2.php');

$ses_BC = $bdd->prepare("SELECT DISTINCT numero_commande,date_commande,date_alerte FROM commandes WHERE nom_distributeur='".$_GET['nom']."'");
$ses_BC->execute(array());
$ses_BC = $ses_BC->fetchAll();
?>
<div style="margin-left:40px;margin-top:30px;">

<h2 style="margin-bottom:40px;"> Bons de commande de <?= $_GET['nom']; ?> (pour éditer un bon de commande cliquer dessus)</h2>
<table class='table table-bordered' style='background-color:white'>
<tr>
    <th>Numéro commande</th><th>Date commande</th><th>Date échéance</th><th>Produits</th><th>Quantité</th>
</tr>
<?php foreach($ses_BC as $son_BC){ 
    $date_commande = strtotime($son_BC['date_commande']) ;
    $date_commande = date("d-m-Y",$date_commande);
    $date_alerte = strtotime($son_BC['date_alerte']) ;
    $date_alerte = date("d-m-Y",$date_alerte);
    ?>
    <tr>
        <td><a href="upload/<?= $son_BC['numero_commande']?>"><?= $son_BC['numero_commande'] ?></a> </td>
        <td><?= $date_commande ?> </td>
        <td><?= $date_alerte ?> </td>
        <td>
        <?php
        //produits : 
        $produits = $bdd->prepare("SELECT produit,qte FROM commandes WHERE numero_commande='".$son_BC['numero_commande']."'");
        $produits -> execute(array());
        $produits = $produits->fetchAll();
        foreach($produits as $produit){ 

            echo $produit['produit'] ; ?><br/>
<?php
        } ?>
        </td>
        <td>
        <?php 
        foreach($produits as $produit){ 

            echo $produit['qte'] ; ?><br/><?php
} ?>
        </td>
       <td><a href="mail_intermediaire.php?file=<?=$son_BC['numero_commande'] ?>"><button class="btn btn-success btn-lg">Envoyer par mail</button>
</td>

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

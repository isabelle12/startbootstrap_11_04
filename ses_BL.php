<?php 
include('bdd.php');
include('header2.php');

$ses_BC = $bdd->prepare("SELECT nom_BL FROM bons_livraison WHERE distributeur='".$_GET['nom']."'");
$ses_BC->execute(array());
$ses_BC = $ses_BC->fetchAll();
?>
<div style="margin-left:40px;margin-top:30px;">

<h2 style="margin-bottom:40px;">Bons de livraison de <?= $_GET['nom']; ?> (pour éditer un bon de livraison cliquer dessus)</h2>
<table class='table table-bordered' style='background-color:white'>
<tr>
    <th>Numéro BL</th>
</tr>
<?php foreach($ses_BC as $son_BC){ 
    ?>
    <tr>
        <td><a href="upload/<?= $son_BC['nom_BL']?>"><?= $son_BC['nom_BL'] ?></a> </td>
        <td><a href="mail_intermediaire_BL.php?file=<?=$son_BC['nom_BL'] ?>"><button class="btn btn-success btn-lg">Envoyer par mail</button>
    </tr>
<?php } ?>
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
<?php 
session_start();
include('bdd.php');
?>
<?php

include('header2.php');
/*if(isset($_GET['nom'])){
    $req_commandes = $bdd->prepare("SELECT DISTINCT nom_BL FROM bons_livraison WHERE distributeur = '".$_GET['nom']."'");
    $req_commandes->execute(array());
    $req_commandes = $req_commandes->fetchAll();
    foreach($req_commandes as $req_commande){
        echo $req_commande['nom_BL'];
}
}*/

?> 
                <div class="container">
                <!--<a href="modif_qte.php"><button class="btn btn-success btn-lg " type="button" style="margin-bottom:30px;margin-top:30px;">Modifier la quantité d'un article</button></a>-->
                <form action="" method="POST">
                    <table style="margin-bottom:20px;">
                        <tr><th>Distributeurs</th><th>Bons de commande</th><th>Bons de livraison</th><th>Factures</th></tr>
                        <tr >
                            
                            <td style="width:400px;">
                                <form class="navbar-search" action="trt_BC.php" style="margin-top:40px;"> 
                                    <div class="input-group">
                                        <input type="text" style="margin-top:27px;" class="form-control" placeholder="<?php if(isset($_GET['nom'])){
                                            echo $_GET['nom'];
                                            } ?>" autocomplete="off" aria-label="Search" aria-describedby="basic-addon2" value="" id="search-stock7" name="nom_distributeur">
                                    <!--<input type='text' id='usersSearch'  /><br/>-->
                                                                        
                                    <!--<input type="text" class="form-control" id="distributeur" />-->
                                    </div>
                                    <div id="position" style="position:relative">
                                    </div>
                                    <div style="box-shadow: 15px 15px 15px #EBECEF; border-radius: 10px; margin-left: 0%;margin-top: 5%;position: absolute; top:200px;background-color: white;z-index: 15 ;">
                                    <div id="result-search"></div>
                                    </div>
                                    <br />
                                    <!--<button type="submit" class="btn btn-success btn-lg ">Valider</button>-->
                                </form>
                            </td>
                            <td style="width:400px;">
                                <select class="form-control volume" id="select_BC" name="contenance">
                                <option value="vide">Choisis un bon de commande...</option>
                                <?php 
                                if(isset($_GET['nom'])){
                                    echo "kikou";

                                    $req_commandes = $bdd->prepare("SELECT DISTINCT numero_commande FROM commandes WHERE nom_distributeur = '".$_GET['nom']."'");
                                    $req_commandes->execute(array());
                                    $req_commandes = $req_commandes->fetchAll();
                                    foreach($req_commandes as $req_commande){
                                        echo $req_commande['numero_commande'];
                                        ?><option value = "<?php echo $req_commande['numero_commande']; ?>"><?php echo $req_commande['numero_commande']; ?></option>
                                    <?php }}
                                ?>
                                </select>
                            </td>
                            <td style="width:400px;">
                                <select class="form-control parfum" name="parfum" id="select_BL">
                                <option value="vide">Choisis un bon de livraison...</option>
                                <?php if(isset($_GET['nom'])){
                                    echo "kikou";
                                    $req_commandes = $bdd->prepare("SELECT DISTINCT nom_BL FROM bons_livraison WHERE distributeur = '".$_GET['nom']."'");
                                    $req_commandes->execute(array());
                                    $req_commandes = $req_commandes->fetchAll();
                                    foreach($req_commandes as $req_commande){
                                        echo $req_commande['nom_BL'];
                                        ?><option value = "<?php echo $req_commande['nom_BL']; ?>"><?php echo $req_commande['nom_BL']; ?></option>
                                    <?php }} ?>
                                </select>
                            </td>
                            <td style="width:400px;margin-right:20px;">
                                <select class="form-control parfum" name="parfum" id="select_facture" style="margin-right:20px;">
                                <option value="vide">Choisis une facture...</option>
                                <?php if(isset($_GET['nom'])){
                                    $req_commandes = $bdd->prepare("SELECT DISTINCT numero_facture FROM facture WHERE nom_distributeur = '".$_GET['nom']."'");
                                    $req_commandes->execute(array());
                                    $req_commandes = $req_commandes->fetchAll();
                                    foreach($req_commandes as $req_commande){
                                        echo $req_commande['numero_facture'];
                                        ?><option value = "<?php echo $req_commande['numero_facture']; ?>"><?php echo $req_commande['numero_facture']; ?></option>
                                    <?php }} ?>
                                </select>
                            </td>
                            <td style="width:400px;padding-left:20px;">
                                <a href="non_payee.php"><button type="button" class="btn btn-success btn-lg ">Fact non payées</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                        </tr>
                    </table>
                    <center><a id="editer" href="" ><button  style="width:200px;margin-bottom:30px;" type="button" class="btn btn-success btn-lg ">Editer</button></a></center>
                    <center><a id="mail_BC_liste" href="" ><button  style="width:200px;margin-bottom:30px;" type="button" class="btn btn-success btn-lg ">Envoyer par mail</button></a></center>

                </form>
                <div id="la_div"></div>
                </div>
<?php
    //echo $_POST['contenance'];

if(empty($_POST['categorie2'])){
    //echo "empty<br/>";
}
if(!empty($_POST['categorie2'])){
    echo $_POST['categorie2'];
}
if(empty($_POST['contenance'])){
    //echo "empty<br/>";
}
if(!empty($_POST['contenance'])){
    echo "not empty<br/>";
}
if(empty($_POST['parfum'])){
    //echo "empty<br/>";
}
if(!empty($_POST['parfum'])){
    echo "not empty<br/>";
}
?>
            </div>
        </div>

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

</body>
</html>
    


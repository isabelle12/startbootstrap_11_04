<?php

include('header2.php');


//$article = $_GET['id'];

/*$req = $bdd->prepare("SELECT * FROM articles WHERE id ='".$article."'");
$req->execute(array());
$req = $req->fetch();*/


$date = date('d-m-Y');
$stamp = strtotime($date);
$vingt_huit_jours = 24*60*60*28;
$somme = $stamp+$vingt_huit_jours;
$date_convertie = date('d-m-Y', $somme);
$jour_semaine = date('l', $somme);
if($jour_semaine=="Sunday"){
    $deux_jours = 24*60*60*2;
    $nouvelle_date = $somme - $deux_jours;
    $date_convertie = date('Y-m-d', $nouvelle_date);
}

if($jour_semaine=="Saturday"){
    $deux_jours = 24*60*60;
    $nouvelle_date = $somme - $deux_jours;
    $date_convertie = date('d-m-Y', $nouvelle_date);
}


?>

                <!-- End of Topbar -->
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                    </div>
                    <div class="col-sm-9 col-xs-9">

                    </div>
                </div>
                <?php
/*echo $_GET['volume'];
echo $_GET['parfum'];
echo $_GET['qte'];
echo $_GET['image'];*/

//--------------------------------------------------------------------------------------------------------------------

?>
<div class="container-fluid" style="max-width:700px;margin-bottom:30px;height:600px;">



<!--<form action="trt_caisse.php" method="POST">-->
    <center>
        <h1 class="h3 mb-4 text-gray-800">Création d'un bon de livraison <br/> <?php //echo $req['categorie']." ";
                                                                         //echo $req['volume']." ";
                                                                         //echo $req['parfum'];?></h1>
    </center>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800 message" id="message">
                                <div class="row">

                                    <br />
                                    <br />
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        Distributeur
                                        

                                        <br />
                                        <br />

                                        <!--<select class="form-control distributeur" name="distributeur">
                                        <option value="">Choisis un distributeur...</option>-->
                                        <form class="navbar-search" action="trt_BC.php">
                                            <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Rechercher" autocomplete="off" aria-label="Search" aria-describedby="basic-addon2" value="" id="search-stock5" name="nom_distributeur">
                                            <!--<input type='text' id='usersSearch'  /><br/>-->
                                                                                
                                            <!--<input type="text" class="form-control" id="distributeur" />-->
                                            </div>
                                            <div id="position" style="position:relative">
                                            </div>
                                            <div style="box-shadow: 15px 15px 15px #EBECEF; border-radius: 10px; margin-left: 9%;margin-top: 5%;position: absolute; top:60px;background-color: white;z-index: 15 ;">
                                            <div id="result-search2"></div>
                                            </div>
                                            <br />
                                            <!--<button type="submit" class="btn btn-success btn-lg ">Valider</button>-->
                                        </form>

                                        <?php
                                            $req_parfum = $bdd->prepare("SELECT * FROM distributeurs");
                                            $req_parfum->execute(array());
                                            $req_parfum = $req_parfum->fetchAll();
                                            /*foreach ($req_parfum as $result) {
                                                $tableau_deux = array();
                                                $tableau_deux[]=$result['id'];
                                                $tableau_deux[]=$result['nom'];*/

                                            ?>
                                                <!--<option value="<?php //echo $result['id'];  ?>" ><?php //echo $result['nom'];  ?></option>-->
                                            <?php
                                            //}
                                            ?>

                                        <!--</select>-->
                                    </div>
                                    
                                    <div class="col-lg-5 offset-lg-1 h6 mb-0 font-weight-bold text-gray-800" id="a_linterieur">
                                    <p id="p_nom" style="font-weight:normal;">
                                    <?php     
                                        if(isset($_GET['nom'])){
                                            echo $_GET['nom'];
                                        }
                                    ?>
                                    </p>
                                    <br/>
                                    <p style="font-weight:normal;">

                                    <?php     

                                        if(isset($_GET['adresse'])){
                                            echo $_GET['adresse']."<br/>";
                                        }
                                        ?>
                                    </p>
                                    <p style="font-weight:normal;">

                                    <?php     

                                        if(isset($_GET['telephone'])){
                                            echo $_GET['telephone']."<br/>";
                                        }
                                        ?>
                                    </p>
                                    <p style="font-weight:normal;">

                                    <?php     

                                        if(isset($_GET['mail'])){
                                            echo $_GET['mail']."<br/>";
                                        } 
                                        ?>
                                    </p>
                                    <!--Créer un nouveau distributeur
                                        <br />
                                        <br />
                                            <input type="text" class="form-control" id="nom" placeholder="nom" name="nom" />
                                            <br />
                                            <input type="text" class="form-control" id="adresse" placeholder="adresse" name="adresse" />
                                            <br />
                                            <input type="text" class="form-control" id="telephone" placeholder="téléphone" name="telephone" />
                                            <br />
                                            <input type="text" class="form-control" id="details_adresse" placeholder="détails adresse" name="details_adresse" /> 
                                            <br />
                                            <input type="text" class="form-control" id="mail" placeholder="mail" name="mail" />
                                            <br />
                                            <button id="distributeur_btn" type="button" class="btn btn-success btn-lg btn-block">Créer</button>-->
                                    </div>
                                    <?php
                                    
                                        ?>
  
                                </div>
                                <br />
                                <br />
                                
                                <br />
                                
                                <br />
                                
                                <br />
                                <!--<a href="export_facture.php" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                <i class="fab fa-avianex"></i>
                                </span>
                                <span class="text">Valider</span>
                                </a>-->
                                <!--<a style="text-decoration:none;" href="DV_facture2.php?num_commande=<?php //echo $chaine3; ?>&alerte=<?php //echo $date_convertie; ?>&nom="><button type="button" id="bouton_distributeur2" class="btn btn-success btn-lg btn-block">Valider</button></a>-->
                                <button type="button" id="bouton_distributeur4" class="btn btn-success btn-lg btn-block">Valider</button>
                                <br />

                                <br />
                                <?php 
                                
                                                        
                                ?>  
                            </div>
                            <!--au dessus fermeture h6-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--</form>-->

</div>
<!--<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>-->

<!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
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

<script>
    var sig = $('#sig').signature({
        syncField: '#signature64',
        syncFormat: 'JPEG'
    });
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });

    var sig2 = $('#sig2').signature({
        syncField: '#signature642',
        syncFormat: 'JPEG'
    });
    $('#clear2').click(function(e) {
        e.preventDefault();
        sig2.signature('clear');
        $("#signature642").val('');
    });
</script>
<?php
    $folderPath = "upload/";
    if(isset($_POST['signed'])){
    echo $_POST['signed'];
    $image_parts = explode(";base64,", $_POST['signed']);
    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);
    $file = $folderPath . uniqid() . '.'.$image_type;
    file_put_contents($file, $image_base64);

    }
//include_once('footer.php');

?>


</body>

</html>
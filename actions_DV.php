<?php
include('header2.php');
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
<div class="container-fluid" style="max-width:700px;margin-bottom:30px;height:400px;">



<!--<form action="trt_caisse.php" method="POST">-->
    <center>
        <h1 class="h3 mb-4 text-gray-800">Créer ou lister les bons de commande, bons de livraison ou factures <br/> <?php //echo $req['categorie']." ";
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
                            <div class="h6 mb-0 font-weight-bold text-gray-800 message row" id="message">
                                <div class="col-lg-4" style="margin-bottom:10px;">
                                    <a href="creation_BC_sans_select.php?prix=DV" style="text-decoration:none;"><button  class="btn btn-success btn-lg ">Créer BC</button></a>
                                </div>
                                <div class="col-lg-4" style="margin-bottom:10px;">

                                    <a href="vente_BL2.php" style="text-decoration:none;"><button  class="btn btn-success btn-lg ">Créer BL</button></a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="DV_facture4.php?prix=DV" style="text-decoration:none;margin-bottom:10px;"><button  class="btn btn-success btn-lg ">Créer facture</button></a>
                                </div>

                            </div>
                                <!--au dessus fermeture h6-->
                            <div class="h6 mb-0 font-weight-bold text-gray-800 message row" id="message">
                                <div class="col-lg-4" style="margin-bottom:10px;">
                                    <!--<a href="liste_BC2.php" style="text-decoration:none;"><button  class="btn btn-success btn-lg ">Liste BC,BL ou factures</button></a>-->
                                </div>
                                <!--<div class="col-lg-4" style="margin-bottom:10px;">

                                    <a href="vente_BL.php" style="text-decoration:none;"><button  class="btn btn-success btn-lg ">Lister BL</button></a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="liste_BC.php" style="text-decoration:none;margin-bottom:10px;"><button  class="btn btn-success btn-lg ">Lister factures</button></a>
                                </div>-->

                            </div>
                                <!--au dessus fermeture h6-->
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--</form>-->
    </div>

<!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
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
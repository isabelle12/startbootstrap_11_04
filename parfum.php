<?php
include('bdd.php');
include('header2.php');

$req_volume = $bdd->prepare("SELECT * FROM categorie_volume INNER JOIN volumes ON categorie_volume.id_volume = volumes.id");
$req_volume->execute(array());
$req_volume = $req_volume->fetchAll();
$req_parfum = $bdd->prepare("SELECT * FROM parfums");
$req_parfum->execute(array());
$req_parfum = $req_parfum->fetchAll();
$req = $bdd->prepare("SELECT * FROM categories");
$req->execute(array());
$req = $req->fetchAll();
?>

                <div class="row">
                    <div class="col-md-3 col-lg-1">
                        <img style="height:120px;" src="img/deodorant.png" />
                    </div>
                    <div class="col-md-9 col-lg-9">

                    </div>
                </div>
                <div class="container-fluid" style="max-width:700px;margin-bottom:30px;height:200px;">
                    <center>
                        <h3 class="h3 mb-4 text-gray-800">Création d'un parfum</h3>
                    </center>

                    <form action="" method="POST">
                       
                        <div class="row">
            
                            <!-- Earnings (Monthly) Card Example -->

                            <div class="col">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <br />
                                                    Parfum *
                                                    <br />
                                                    <br />
                                                    <input type="text" name="parfum" class="form-control" required/>   

                                                    
                                                    
                                                    <br />
                                                    


                                                    
            
                                                    <br />
                                                    <br />
                                                    <button type="submit" class="btn btn-success btn-lg btn-block">Valider</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </form>
                </div>

<?php 
/*echo $_POST['volume'];
echo $_POST['parfum'];
echo $_POST['quantite'];*/
if (isset($_POST['parfum'])) {
    
                        

                        $req_insertion = $bdd->prepare('INSERT INTO parfums(nom_parfum) VALUES(:parfum)');
                        $req_insertion->execute(array(
                            ':parfum' =>$_POST['parfum'],
                            
                        ));                                                                                
                    }
                
    ?>
<script type='text/javascript'>
window.location.href = "creation_categorie.php?id=<?php echo $_GET['id']; ?>"
</script>


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
    


</body>

</html>


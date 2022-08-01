<?php
include('header2.php');
?>
<div class="container-fluid" style="max-width:700px;margin-bottom:30px;height:px;">
        <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">


            </h1>
            <!----------------------------------------------------------------------------------------->
            
           
            <!----------------------------------------------------------------------------------------------------->

            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col">
                    <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800 message" id="message">
                                                    <div class="row">

                                                    
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-lg- offset-lg-1">
                                                            <br /><br />
                                                            <div id="sig"></div>
                                                            <form action="mail_BC_liste.php?file=<?php echo $_GET['file']; ?>" method="post">
                                                            Veuillez entrer l'adresse mail de votre client :
                                                            <input type="text" class="form-control" style="margin-top:30px;margin-bottom:30px;" name="adresse" id="adresse"/>
                                                            <button  class="btn btn-primary" type="submit">Valider</button></a>   
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.signature.min.js"></script>
<script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script>
                        
                    </div>
                    </div>
                    </div>
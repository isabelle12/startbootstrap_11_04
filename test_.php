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
                                                            <input type="text" class="form-control" style="margin-top:30px;margin-bottom:30px;"/>
                                                            <button class="btn btn-primary" type="submit">Valider</button>   
                                                            </form> 
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                    </div>
                    </div>
                    </div>
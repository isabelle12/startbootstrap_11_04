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
<div class="container fluid" style="color:black;height:;padding-top:30px;background-color:white;width:650px;">
    <div id="bordure" style="height:800px;border: 1px solid #E5E5E5;padding-top:20px;">
        <div class="row" >
            <div class="col-lg-4">
                <h4 style="font-weight:900;margin-bottom:100px;">Facture</h4>
                <h5 style="margin-left:20px;margin-bottom:-20px;font-weight:900;text-transform:uppercase;font-size:12px;"><?php echo $_GET['nom'];?></h5><br/>
                <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['enseigne'];?></h6><br/>
                <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['adresse'];?></h6><br/>
                <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['telephone'];?></h6><br/>
                <h6 style="margin-left:20px;font-size:12px;"><?php echo $_GET['mail'];?><h5><br/>  
            </div>
            <div class="col-lg-3">
                <div class="row" style="margin-top:130px;">
                <h6 style="font-size:12px;">Livrer à : <br/><?php echo $_GET['details']; ?></h6>
                </div>
            </div>

            <div class="col-lg-5" style="margin-bottom:20px;">

                <h9 style="margin-left:20px;margin-bottom:-10px;font-size:12px;font-weight:900;">SENSODIFFUSION</h9><br/>
                <h6 style="margin-left:20px;margin-bottom:-10px;font-size:12px;">424,avenue de saint Antoine</h6><br/>
                <h6 style="margin-left:20px;margin-bottom:60px;font-size:12px;">13015 Marseille</</h6><br/>
                        
                <?php $tableau_commande = $_GET['commande'];
                $chaine_commande = explode(",",$tableau_commande);
                $req_commande2 = $bdd->prepare("SELECT produit,qte,date_commande,date_alerte,prix_DV FROM commandes WHERE numero_commande='".$tableau_commande."'");
                $req_commande2->execute(array());
                $req_commande2 = $req_commande2->fetchAll();
                $stamp = strtotime($req_commande2[0]['date_commande']);
                $date_convertie = date('d-m-Y', $stamp);
                $stamp2 = strtotime($req_commande2[0]['date_alerte']);
                $date_convertie2 = date('d-m-Y', $stamp2);
                $date = date('d-m-Y');
                ?>
                    </h2>
                    <p style="font-size:12px;">Date de la facture <?php echo $date; ?></p>
                    <p style="font-size:12px;">Date de la commande <?php echo $date_convertie; ?></p>
                    <p style="font-size:12px;">Commande N°<?php echo $tableau_commande; ?></p>
                    <p style="font-size:12px;">Date alerte <?php echo $date_convertie2; ?></p>
            </div>
        </div>
    
        <table width="580px" style="margin-left:10px;margin-right:10px;" >
            <tr style="background-color:#E5E5E5;">
            <th style="font-size:12px;padding-left:10px;">Produit</th>
            <th style="font-size:12px;padding-left:10px;">Quantité</th>
            <th style="font-size:12px;padding-left:10px;">Prix</th>
            <th style="font-size:12px;padding-left:10px;">Sous-total</th>


            </tr>
            <?php
            for($i=0;$i<count($req_commande2);$i++){
                ?>
                <tr>
                    <td style="padding-top:10px;padding-left:10px;font-size:11px;border: 1px solid #E5E5E5;height:17px;width:27px;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php echo $req_commande2[$i]['produit'];?></h6></td>
                    <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:21px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php echo $req_commande2[$i]['qte'];?></h6></td>
                    <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:21px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php echo $req_commande2[$i]['prix_DV'];?></h6></td>
                    <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:18px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php echo (int)$req_commande2[$i]['prix_DV']*(int)$req_commande2[$i]['qte']; ?></h6></td>

                    <?php 
                    $multiplication[] = (int)$req_commande2[$i]['prix_DV']*(int)$req_commande2[$i]['qte'];
                    //var_dump(is_int((int)$multiplication));

                    //echo $multiplication;
                    ?>
            </tr>
                <?php
            }
            $somme=0;
            for($i=0;$i<count($multiplication);$i++){
                $somme += (int)$multiplication[$i];
            }        
            ?> 
        </table>
        <div class="row" style="background-color:#E5E5E5;width:120px;height:60px;margin-top:250px;margin-left:450px;" >
            <div class="col-lg-12">
                <div class="row">
                    <span style="margin-right:20px;font-size:12px;">Total HT</span>
                    <span><?php echo $somme; ?></span>
                </div>
                <div class="row">
                    <span style="margin-right:20px;font-size:12px;">TVA</span>
                    <!--<span style="margin-right:20px;font-size:12px;">Total TTC</span>-->
                </div>
                <div class="row">
                    <span style="margin-right:20px;font-size:12px;font-weight:800;">Total TTC</span>
                    <span><?php echo $somme; ?></span>

                </div>
            </div>
            <!--<span><?php //echo $somme; ?></span>-->
        </div>
    </div>
</div>
        

    <?php
    $chaine_vers = "export_facture4.php?details=".$_GET['details']."&nom=".$_GET['nom']."&adresse=".$_GET['adresse']."&mail=".$_GET['mail']."&telephone=".$_GET['telephone']."&enseigne=".$_GET['enseigne']."&num_facture=&num_commande=".$tableau_commande."&paiement=&alerte=".$date_convertie2."&taille=";
    ?>
    <a href="<?php echo $chaine_vers; ?>"><button style="margin-top:30px;" type="button" class="btn btn-success btn-lg ">Créer PDF facture</button></a><br/><br/><br/> 
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






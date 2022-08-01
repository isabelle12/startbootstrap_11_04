<?php
include('header2.php');
?>
<div class="row">
    <div class="col-lg-6">

        <div class="row" id="bordure" style="margin-left:20px;color:black;height:800px;border: 1px solid #E5E5E5;padding-top:20px;">
            <div class="col-lg-12">
               
                <div class="row" style="padding-left:10px;">
                    <div class="col-lg-4">
                        <h4 style="font-weight:900;margin-bottom:100px;">Bon de commande</h4>
                    </div>
                    <div class="col-lg-4 offset-lg-4">

                        <h9 style="margin-left:20px;margin-bottom:-10px;font-size:12px;font-weight:900;">SENSODIFFUSION</h9><br/>
                        <h6 style="margin-left:20px;margin-bottom:-10px;font-size:12px;">424,avenue de saint Antoine</h6><br/>
                        <h6 style="margin-left:20px;margin-bottom:60px;font-size:12px;">13015 Marseille</</h6><br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5" style="margin-bottom:20px;">
                        </h2>
                        <p style="font-size:12px;">Date de la commande <?php $date = date('d-m-Y');echo $date; ?></p>
                        <p style="font-size:12px;">Commande N°<?php echo $_GET['num_commande']; ?></p>
                        <p id="para" style="font-size:12px;">Date échéance <?php 

                        echo $_GET['alerte']; ?></p>
                    </div>
                    <div class="col-lg-3">
                        <div class="row" >
                            <h6 style="font-size:12px;"></h6>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5 style="margin-left:20px;margin-bottom:-20px;font-weight:900;text-transform:uppercase;font-size:12px;"><?php echo $_GET['nom'];?></h5><br/>
                        <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['enseigne'];?></h6><br/>
                        <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['adresse'];?></h6><br/>
                        <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['telephone'];?></h6><br/>
                        <h6 style="margin-left:20px;font-size:12px;"><?php echo $_GET['mail'];?><h5><br/>  
                    </div>
                    

                   
                </div>
                <table width="90%" style="margin-left:10px;margin-right:10px;" id="tableau">
                    <tr style="background-color:#E5E5E5;">
                    <th style="font-size:12px;padding-left:10px;">Produit</th>
                    <th style="font-size:12px;padding-left:10px;">Quantité</th>
                    <th style="font-size:12px;padding-left:10px;">Prix</th>



                    </tr>
                  
                </table>
              

            </div>
   
        </div>
    </div>
    <div class="col-lg-4">
        <div id="produit"></div>
        <div id="choix"></div>
 

        <select class="form-control produit" name="produit" required style="margin-bottom:30px;">
            <option value="">Choisis un produit...</option>

            <?php
            $articles = $bdd->prepare("SELECT id_categorie,id AS id_article FROM articles_id");
            $articles->execute(array());
            while($articles_result = $articles->fetch()){
                $id_article = $articles_result['id_article'];
                //echo $articles_result['id_categorie'];
                $categorie_champs = $articles_result['id_categorie'];
                $champs = $bdd->prepare("SELECT parfum_absent,contenance_absent FROM manque_champs WHERE id_categorie = '".$categorie_champs."'");
                $champs->execute(array());
                while($result_parfum_absent = $champs->fetch()){
                
                    if($result_parfum_absent['parfum_absent']==1 AND $result_parfum_absent['contenance_absent']==1){                                          
                
                        $categorie = $_GET['id_categorie'];
                        $req_produit = $bdd->prepare("SELECT categories.nom,volumes.quantite,parfums.nom_parfum,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id INNER JOIN parfums ON articles_id.id_parfum = parfums.id WHERE articles_id.id ='".$id_article."'");
                        $req_produit->execute(array());
                        //$req_volume = $req_volume->fetchAll();    
                        while($result = $req_produit->fetch()){  
                        ?>
                            <option value="<?php echo $result['id_article2'];?>" ><?php echo $result['nom']." ".$result['quantite']." ".$result['nom_parfum'];  ?></option>
                        <?php
                        }
                    }
                    if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==1){
                        $req_volume = $bdd->prepare("SELECT categories.nom,volumes.quantite,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id INNER JOIN volumes ON articles_id.id_volume = volumes.id WHERE articles_id.id ='".$id_article."'");
                        $req_volume->execute(array());
                        //$req_volume = $req_volume->fetchAll();    
                        while($result = $req_volume->fetch()){  
                        ?>
                        <option value="<?php echo $result['id_article2'];?>" ><?php echo $result['nom']." ".$result['quantite'];  ?></option>
                        <?php
                        }
                    }  
                    if($result_parfum_absent['parfum_absent']==0 AND $result_parfum_absent['contenance_absent']==0){
                        $req_volume = $bdd->prepare("SELECT categories.nom,articles_id.id AS id_article2 FROM articles_id INNER JOIN categories ON articles_id.id_categorie = categories.id WHERE articles_id.id ='".$id_article."'");
                        $req_volume->execute(array());
                        //$req_volume = $req_volume->fetchAll();    
                        while($result = $req_volume->fetch()){  
                        ?>
                        <option value="<?php echo $result['id_article2'];?>" ><?php echo $result['nom'];  ?></option>
                        <?php
                        }
                    }                                        

                }
            }  
            
            ?>

        </select>
            <input style="margin-bottom:30px;" id="qte_insertion" class="form-control" type="text" placeholder="Choisis une quantité..."/>
            <button style="margin-bottom:30px;" id="inserer2" type="button" class="btn btn-success btn-lg ">Ajouter ce produit</button>
            <!--<button style="margin-bottom:30px;" id="supprimer" type="button" class="btn btn-success btn-lg ">Supprimer dernière ligne</button>-->
            <br/><p style="font-size:18px;">Pour supprimer une ligne, cliquer sur cette ligne</p>
            <div id="bouton"></div>
            <?php


            $chaine_vers = "trt7.php?details=".$_GET['details']."&nom=".$_GET['nom']."&adresse=".$_GET['adresse']."&mail=".$_GET['mail']."&telephone=".$_GET['telephone']."&enseigne=".$_GET['enseigne']."&num_facture=&num_commande=".$_GET['num_commande']."&paiement=&alerte=".$_GET['alerte'];
            //echo $chaine_vers;

        /*for($i=0;$i<$_GET['taille'];$i++){
            //echo "chaine";
            $index = "produit".$i;
            $index2 = "qte".$i;
            $index3 = "prix_vente".$i;

            $chaine_vers = $chaine_vers."&produit".$i."=".$_GET[$index]."&qte".$i."=".$_GET[$index2]."&prix_vente".$i."=".$_GET[$index3]."&enseigne=".$_GET['enseigne'];

            echo $chaine_vers;
        }*/
            ?>
            <button id="valider_tableau2" style="margin-bottom:30px;" type="button" class="btn btn-success btn-lg ">Valider</button>
            <br/><a id = "signer" href="<?php echo $chaine_vers; ?>"><button  type="button" class="btn btn-success btn-lg ">Signer</button></a><br/><br/><br/>

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
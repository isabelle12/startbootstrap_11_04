<?php

include('header2.php');
$req_alerte = $bdd->prepare("SELECT * FROM commandes WHERE numero_commande = '".$_GET['commande']."'");
                            $req_alerte->execute(array());
                            $tableau_alerte = $req_alerte->fetchAll();
                            $stamp = strtotime($tableau_alerte[0]['date_alerte']) ;
                            $date_alerte = date('d-m-Y',$stamp);
                            $stamp2 = strtotime($tableau_alerte[0]['date_commande']) ;
                            $date_commande = date('d-m-Y',$stamp2);
                            //var_dump($tableau_alerte);

?>

<div class="row">
    <div class="col-lg-6">

        <div class="row" id="bordure" style="margin-left:20px;color:black;height:800px;border: 1px solid #E5E5E5;padding-top:20px;">
            <div class="col-lg-12">
               
                <div class="row" style="padding-left:10px;">
                    <div class="col-lg-4">
                        <h4 style="font-weight:900;margin-bottom:100px;">Facture</h4>
                    </div>
                    <div class="col-lg-4 offset-lg-4">

                        <h9 style="margin-left:20px;margin-bottom:-10px;font-size:12px;font-weight:900;">SENSODIFFUSION</h9><br/>
                        <h6 style="margin-left:20px;margin-bottom:-10px;font-size:12px;">424,avenue de saint Antoine</h6><br/>
                        <h6 style="margin-left:20px;margin-bottom:60px;font-size:12px;">13015 Marseille</</h6><br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5" style="margin-bottom:20px;">
                        <p style="font-size:12px;">Date de la commande <?php echo $date_commande; ?></p>
                        <p style="font-size:12px;">Commande N°<?php echo $_GET['commande']; ?></p>
                        <p id="para" style="font-size:12px;">Date alerte 
                        <?php echo $date_alerte; ?>
                        </p>
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
                <table width="90%" style="margin-left:10px;margin-right:20px;" id="tableau">
                    <tr style="background-color:#E5E5E5;">
                        <th style="font-size:12px;padding-left:10px;">Produit</th>
                        <th style="font-size:12px;padding-left:10px;">Quantité</th>
                        <th style="font-size:12px;padding-left:10px;">Prix</th>
                        <th style="font-size:12px;padding-left:10px;">Sous-total</th>
                    </tr>
                    <?php
                    //for($i=0;$i<count($req_commande2);$i++){
                        ?>
                        <!--<tr>
                            <td style="padding-top:10px;padding-left:10px;font-size:11px;border: 1px solid #E5E5E5;height:17px;width:27px;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php //echo $req_commande2[$i]['produit'];?></h6></td>
                            <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:21px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php //echo $req_commande2[$i]['qte'];?></h6></td>
                            <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:21px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php ///echo $req_commande2[$i]['prix_DV'];?></h6></td>
                            <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:18px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php //echo (int)$req_commande2[$i]['prix_DV']*(int)$req_commande2[$i]['qte']; ?></h6></td>

                        <?php 
                        //$multiplication[] = (int)$req_commande2[$i]['prix_DV']*(int)$req_commande2[$i]['qte'];
                        //var_dump(is_int((int)$multiplication));

                        //echo $multiplication;
                        ?>
                    </tr>-->
                    <?php
                    //}
                    /*$somme=0;
                    for($i=0;$i<count($multiplication);$i++){
                        $somme += (int)$multiplication[$i];
                    } */      
                    ?> 
                </table>
                <div class="row" style="padding-right:20px;"  >
                    <div class="col-lg-3 offset-lg-9" style="background-color:#E5E5E5;width:120px;height:60px;margin-top:300px;margin-right:10px;">
                        <div class="row">
                            <span  style="margin-right:20px;font-size:12px;">Total HT</span>
                            <span id="un"><?php //echo $somme; ?></span>
                        </div>
                        <div class="row">
                            <span style="margin-right:10px;font-size:12px;">TVA(20%)</span>
                            <span id="trois" style="margin-right:px;font-size:12px;"></span>
                        </div>
                        <div class="row">
                            <span  style="margin-right:5px;font-size:12px;font-weight:800;">Total TTC</span>
                            <span id="deux"><?php //echo $somme; ?></span>

                        </div>
                    </div>
                    <!--<span><?php //echo $somme; ?></span>-->
                </div>

            </div>
   
        </div>
    </div>
    <div class="col-lg-5">
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
        <?php 
        /*echo $_GET['taille'];
        for($i=1;$i<=$_GET['taille'];$i++){
            $index_qte="qte".$i;
            $index_prix="prix_DV".$i;
            echo "kikou";

            echo $_GET[$index_qte]*$_GET[$index_qte];
        }*/
        ?>
        <input style="margin-bottom:30px;" id="qte_insertion" class="form-control" type="text" placeholder="Choisis une quantité..."/>
        <button id="inserer4" style="margin-bottom:30px;" type="button" class="btn btn-success btn-lg ">Ajouter un produit</button>
        <br/><p style="font-size:18px;">Pour supprimer une ligne, cliquer sur cette ligne</p>

        <button id="valider_tableau2" type="button" class="btn btn-success btn-lg ">Valider</button>

        <div id="bouton"></div>
        <?php

        //$chaine_vers = "trt9.php?details=".$_GET['details']."&nom=".$_GET['nom']."&adresse=".$_GET['adresse']."&mail=".$_GET['mail']."&telephone=".$_GET['telephone']."&enseigne=".$_GET['enseigne']."&num_facture=&num_commande=".$_GET['commande']."&paiement=&alerte=".$_GET['alerte'];
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
        <!--<a id = "signer" href="<?php //echo $chaine_vers; ?>"><button style="margin-top:30px;" type="button" class="btn btn-success btn-lg ">Imprimer</button></a><br/><br/><br/>-->
        <div class="row" style="padding-top:30px;">
        <!--<form style="height:20px;margin-left:20px" action="" method="post">
            <input type="checkbox" name="frites" id="frites" /> <label for="frites">Payé</label>
            <input type="checkbox" name="frites1" id="frites1" /> <label for="frites1">Non payé</label><br />

            
        </form>-->
    </div>
    <div class="row" style="margin-top:20px;">
            <a id="signer" style="margin-bottom:30px;text-decoration:none;margin-top:px;margin-left:30px;width:;margin-right:20px;" href="imprim_liste_BC.php?details=<?php echo $_GET['details'] ?>&nom=<?php echo $_GET['nom'] ?>&adresse=<?php echo $_GET['adresse'] ?>&mail=<?php echo $_GET['mail'] ?>&telephone=<?php echo $_GET['telephone'] ?>&num_facture=<?php echo $_GET['num_facture'] ?>&enseigne=<?php echo $_GET['enseigne'] ?>&num_commande=<?php echo $_GET['commande']//.$chaine; ?> &file=<?php //echo $file; ?>&alerte=<?php echo $date_alerte; ?>&date_commande=<?php echo $date_commande;?>&paye=paye"><button class="btn btn-success btn-lg " type="button">Créer PDF facture payée</button></a><br/>
            <a id="signer_NP" style="margin-bottom:30px;text-decoration:none;margin-top:px;margin-left:30px;width:;margin-right:20px;" href="imprim_liste_BC.php?details=<?php echo $_GET['details'] ?>&nom=<?php echo $_GET['nom'] ?>&adresse=<?php echo $_GET['adresse'] ?>&mail=<?php echo $_GET['mail'] ?>&telephone=<?php echo $_GET['telephone'] ?>&num_facture=<?php echo $_GET['num_facture'] ?>&enseigne=<?php echo $_GET['enseigne'] ?>&num_commande=<?php echo $_GET['commande']//.$chaine; ?> &file=<?php //echo $file; ?>&alerte=<?php echo $date_alerte; ?>&date_commande=<?php echo $date_commande;?>&paye=nonpaye"><button class="btn btn-success btn-lg " type="button">Créer PDF facture non payée</button></a><br/>

        
    </div>


    <div class="row">

        <div class="" style="padding-top:40px;">

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


    
<?php
include('header2.php');
?>

<!-------------------------------------------------------------------------------------------->

<div class="row" style="padding-left:40px;margin-bottom:100px;">   
    <?php 
    /*$req = $bdd->prepare("SELECT montant FROM caisse");
    $req->execute(array());
    $req=$req->fetch();
    if(empty($req)){
        echo "empty";
    }
    else{
        echo $req['montant'];
    }*/
    ?>
</div>
<div class="row" style="padding-left:30px;">    
    <div class="col-lg-7">   
        <div class="row">
            <div id="produit"></div>
            <div id="choix"></div>
        </div>
        <div class="row" style="margin-left:px;">
            <select class="form-control produit" name="produit" required style="margin-bottom:30px;width:400px;margin-right:30px;">
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
        
            <input style="margin-bottom:30px;width:400px;" id="qte_insertion" class="form-control" type="text" placeholder="Choisis une quantité..."/>
        </div>

    <div class="row">
        <div class="col-lg-3">
            <button id="inserer3" type="button" class="btn btn-success btn-lg " style="margin-bottom:10px;">Ajouter un produit</button>
        </div>
        <div class="col-lg-9">
            <p style="font-size:21px;">Au clic sur ce bouton, affichera le produit dans le tableau ci-dessous pour déduire dans la caisse et supprimera les articles dans la base de données.</p>
        <!--<button id="valider" type="button" class="btn btn-success btn-lg ">Valider</button>-->
            <div style="margin-top:50px;font-size:21px;" id="dedans"></div>
            </div>
        </div>
        <div class="row">
            <table width="90%" style="margin-left:10px;margin-right:10px;margin-bottom:50px;" id="tableau_caisse">
                <tr style="background-color:#E5E5E5;">
                    <th style="border-style:solid;border-width:1px;border-color:black;font-size:12px;padding-left:10px;width:50%;text-align:center;">Produit</th>
                    <th style="border-style:solid;border-width:1px;border-color:black;font-size:12px;padding-left:10px;width:25%;text-align:center;">Quantité</th>
                    <th style="border-style:solid;border-width:1px;border-color:black;font-size:12px;padding-left:10px;width:25%;text-align:center;">Prix</th>
                </tr>
            </table>
            <button style="margin-right:30px;margin-bottom:10px;" id="total" type="button" class="btn btn-success btn-lg ">Calculer total</button>
            <button style="margin-bottom:10px;margin-right:30px;" id="caisse" type="button" class="btn btn-success btn-lg ">Ajouter à la caisse</button>
            <a href="imprim_caisse.php"><button style="margin-bottom:10px;" id="caisse" type="button" class="btn btn-success btn-lg ">Editer facture</button></a>

        </div>
        <div class="row">

            <div id="resultat"><div>

            <div id="bouton"></div>
        </div>
    </div>
</div>
</div>

        <?php

        //$chaine_vers = "export_facture5.php?details=".$_GET['details']."&nom=".$_GET['nom']."&adresse=".$_GET['adresse']."&mail=".$_GET['mail']."&telephone=".$_GET['telephone']."&enseigne=".$_GET['enseigne']."&num_facture=&num_commande=".$_GET['commande']."&paiement=&alerte=".$_GET['alerte'];
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
        <!--<a id = "signer" href="<?php //echo $chaine_vers; ?>"><button style="margin-top:30px;" type="button" class="btn btn-success btn-lg ">Editer la facture</button></a><br/><br/><br/>-->

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
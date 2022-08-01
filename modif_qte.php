<?php
include('header2.php');
?>
<div class="container-fluid" style="max-width:700px;margin-bottom:30px;height:600px;">



<!--<form action="trt_caisse.php" method="POST">-->
    <center>
        <h1 class="h3 mb-4 text-gray-800">Modifier la quantité d'un article <br/> <?php //echo $req['categorie']." ";
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
                                <select class="form-control produit2" name="produit" required style="margin-bottom:30px;">
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
                                Nouvelle quantité :
                                <input style="margin-bottom:30px;margin-top:30px;" id="qte_insertion" class="form-control" type="text" placeholder="Choisis une quantité..."/>
                                <button id="modif_qte" class="btn btn-success btn-lg " type="button" style="margin-bottom:30px;margin-top:30px;">Modifier la quantité d'un article</button>

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
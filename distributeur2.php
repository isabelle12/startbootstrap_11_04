<?php
include('header2.php');

//$article = $_GET['id'];

/*$req = $bdd->prepare("SELECT * FROM articles WHERE id ='".$article."'");
$req->execute(array());
$req = $req->fetch();*/
$req_facture = $bdd->prepare("SELECT numero_commande,date_alerte FROM commandes");

$req_facture->execute(array());
$tableau_deux=array();
$result_facture = $req_facture->fetchAll();

$req_facture = $bdd->prepare("SELECT numero_commande,date_alerte FROM commandes");

$req_facture->execute(array());
$tableau_deux=array();
$result_facture = $req_facture->fetchAll();
//var_dump($result_facture);

//$nom_distributeur=$_POST['nom_distributeur'];
//echo $nom_distributeur;


if(empty($result_facture)){
    $chaine3 = "BC".date("d-m-Y")."0001";

}
else{
    foreach($result_facture as $facture){
        //echo $result_facture['numero_facture'];
        $tableau = explode("-",$facture['numero_commande']);
        $tableau_commande[] = intval($facture['numero_commande']);
        
        $tableau_trois[] = intval($tableau[3]);
        
    }
    $plus_commande = max($tableau_trois)+1;
    /*echo "max";
    echo $plus_commande;
    echo "max";*/

    //$plus = max($tableau_deux)+1;
    //$chaine = strval($plus);
    $chaine_commande = strval($plus_commande);
    //$longueur = strlen($chaine);
    $longueur_commande = strlen($chaine_commande);
    $zeros_commande = 4-$longueur_commande;
    if($zeros_commande==1){
        $chaine3 = "BC".date("d-m-Y")."-0".$chaine_commande;
    }
    if($zeros_commande==2){
        $chaine3 = "BC".date("d-m-Y")."-00".$chaine_commande;

    }
    if($zeros_commande==3){
        $chaine3 = "BC".date("d-m-Y")."-000".$chaine_commande;


    }
    if($zeros_commande==0){
        $chaine3 = "BC".date("d-m-Y").$chaine_commande;

    }



    /*$chaine3="";
    for($i=0;$i<$zeros_commande;$i++){
        $chaine3 .= "0";
    }
    //$zeros=4-$longueur;
    $chaine2="";
    /*for($i=0;$i<$zeros;$i++){
        $chaine2 .= "0";
    }*/
    //$chaine3.=$chaine_commande;
    //$chaine2.=$chaine;
    //$chaine2="FR-100-".$chaine2;
}

//echo $chaine3;
$date25 = date('Y-m-d');

$date = date('d-m-Y');

$stamp = strtotime($date);
$vingt_huit_jours = 24*60*60*28;
$somme = $stamp+$vingt_huit_jours;
$date_convertie = date('d-m-Y', $somme);
$date_convertie2 = date('Y-m-d', $somme);
$jour_semaine = date('l', $somme);

if($jour_semaine=="Sunday"){
    $deux_jours = 24*60*60*2;
    $nouvelle_date = $somme - $deux_jours;
    $date_convertie = date('d-m-Y', $nouvelle_date);
    $date_convertie2 = date('Y-m-d', $nouvelle_date);
}

if($jour_semaine=="Saturday"){
    $deux_jours = 24*60*60;
    $nouvelle_date = $somme - $deux_jours;
    $date_convertie = date('d-m-Y', $nouvelle_date);
    $date_convertie2 = date('Y-m-d', $nouvelle_date);

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
<div class="container-fluid" style="max-width:1000px;margin-bottom:30px;height:200px;">



<!--<form action="trt_caisse.php" method="POST">-->
    <center>
        <h1 class="h3 mb-4 text-gray-800"> <br/> <?php //echo $req['categorie']." ";
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
                            <div class="h6 row mb-0 font-weight-bold text-gray-800 message" id="message">
                            <div class="col-lg-3 col-xs-12 col-md-6 col-sm-12" style="margin-bottom:10px;">
                                    <a href="distributeur2.php" style="text-decoration:none;"><button style="margin-right:30px;width:160px;" class="btn btn-secondary btn-lg ">Distributeurs</button></a>
                                    </div>
                                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-12" style="margin-bottom:10px;">

                                    <a href="actions_DV.php" style="text-decoration:none;margin-bottom:10px;"><button style="margin-right:30px;width:160px;" class="btn btn-secondary btn-lg ">Dépôt vente</button></a>
                                    </div>

                                    <div class="col-lg-2 col-xs-12 col-md-6 col-sm-12" style="margin-bottom:10px;">

                                    <a href="vente2.php" style="text-decoration:none;margin-bottom:10px;"><button style="margin-right:30px;width:;" class="btn btn-secondary btn-lg ">Vente</button></a>
                                    </div>
                                    <div class="col-lg-2 col-xs-12 col-md-6 col-sm-12" style="margin-bottom:10px;">

                                    <a href="affichage_articles3.php" style="text-decoration:none;margin-bottom:10px;"><button style="margin-right:30px;" class="btn btn-secondary btn-lg ">Articles</button></a>
                                    </div>

                                    <div class="col-lg-2 col-xs-12 col-md-6 col-sm-12">

                                    <a href="caisse2.php?prix=vente" style="text-decoration:none;margin-bottom:10px;"><button style="margin-right:30px;" class="btn btn-secondary btn-lg ">Caisse</button></a>
                                    </div>
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
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-5 offset-lg-1">
            <h1 class="h3 mb-4 text-gray-800">Création d'un nouveau distributeur <br/> </h1>

                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                
                                <div class="h6 mb-0 font-weight-bold text-gray-800 message" id="message">
                                    <div class="col-lg-12">
                                        <form method="POST">
                                        <div class="row">
                                            Nom
                                            <br/>
                                            <br/>

                                            <input type="text" class="form-control" name="nom" required />
                                        </div>
                                        <br/>
                                            <br/>
                                        <div class="row">
                                            Enseigne
                                            <br/>
                                            <br/>
                                            <input type="text" class="form-control" name="enseigne" required/>
                                        </div>
                                        <br/>
                                            <br/>
                                        <div class="row">
                                            Numéro SIRET
                                            <br/>
                                            <br/>
                                            <input type="text" class="form-control" name="siret" required/>
                                        </div>
                                        <br/>
                                            <br/>
                                        <div class="row">
                                            Adresse
                                            <br/>
                                            <br/>
                                            <input type="text" class="form-control" name="adresse" required/>
                                        </div>
                                        <br/>
                                            <br/>
                                        <div class="row">
                                            Téléphone
                                            <br/>
                                            <br/>
                                            <input type="text" class="form-control" name="telephone" required />
                                            
                                        </div>
                                        <br/>
                                            <br/>
                                        <div class="row">
                                            Mail
                                            <br/>
                                            <br/>
                                            <input type="text" class="form-control" name="mail" required />
                                            
                                        </div>
                                        <br/>
                                            <br/>
                                        <div class="row">
                                            Détails adresse
                                            <br/>
                                            <br/>
                                            <input type="text" class="form-control" name="details_adresse" required />
                                            
                                        </div>
                                        <br/>
                                            <br/>
                                        <button type="submit"  class="btn btn-success btn-lg btn-block">Valider</button>
                                    </form>
                                    </div>
                                    <?php 
                                    if(isset($_POST['nom']) AND isset($_POST['enseigne']) AND isset($_POST['adresse']) AND isset($_POST['siret']) AND isset($_POST['telephone']))
                                    {
                                    $insert = $bdd->prepare("INSERT INTO distributeurs(nom,enseigne,siret,adresse,telephone,mail,details_adresse) VALUES(:nom,:enseigne,:siret,:adresse,:telephone,:mail,:details_adresse) ");
                                    $insert->execute(array(
                                        ':nom' =>$_POST['nom'],
                                        ':enseigne' =>$_POST['enseigne'],
                                        ':siret' =>$_POST['siret'],
                                        ':adresse' =>$_POST['adresse'],
                                        ':telephone' =>$_POST['telephone'],
                                        ':mail' =>$_POST['mail'],
                                        ':details_adresse' =>$_POST['details_adresse']                                
                                    ));
                                    /*$insert = $bdd->prepare("INSERT INTO distributeurs(nom,enseigne,siret) VALUES(:nom,:enseigne,:siret) ");
                                    $insert->execute(array(
                                        ':nom' =>$_POST['nom'],
                                        ':enseigne' =>$_POST['enseigne'],
                                        ':siret' =>$_POST['siret'],


                                                                        
                                    ));*/
                                    
                                    ?>
                                    <script type='text/javascript'>
                                    window.location.href = "distributeur2.php"
                                    </script>
                                    <?php
                                    }
                                    ?>
                                    
                                    <?php
                                    
                                    ?> 
                                    <br />                                    
                                    <br />                                    
                                    <br />                                    
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
            <div class="col-lg-5">
            <h1 class="h3 mb-4 text-gray-800" >Recherche d'un distributeur <br/></h1>

                <div class="card border-left-primary shadow h-100 py-2" style="margin-top:55px;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <form class="navbar-search" action="trt_BC.php">
                            <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher" autocomplete="off" aria-label="Search" aria-describedby="basic-addon2" value="" id="search-stock12" name="nom_distributeur">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--au dessus nouveau-->
<div class="row">

                                    <div class="col-lg-6">
                                       

                                        <br />
                                        <br />

                                        <!--<select class="form-control distributeur" name="distributeur">
                                        <option value="">Choisis un distributeur...</option>-->
                                        

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
                                    
                                    </div> 
                                    <?php
                                   
                                        ?>
 
                                </div>
                                <br />
                                <br />
                               
                                <br />
                               
                                <br />
                               
                                <br />
                                

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


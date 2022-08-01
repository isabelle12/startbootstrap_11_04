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
                        <h3 class="h3 mb-4 text-gray-800">Création d'un article</h3>
                    </center>

                    <form action="" method="POST" enctype="multipart/form-data">

                       
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
                                                    Gamme *
                                                    <br />
                                                    <br />
                                                    <select class="form-control" name="gamme" required>
                                                        <option value="">Choisis une gamme...</option>

                                                    <?php

        
                                                    foreach ($req as $result) {
                            //echo $result['quantite'];
                                                    ?>
                                                        <option value="<?php echo $result['id']; ?>"><?php echo $result['nom'];  ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                    </select>
                                                    
                                                    
                                                    <br />
                                                    Volume *
                                                    <br />
                                                    <br />
                                                    <select class="form-control" name="volume" required>
                                                        <option value="">Choisis un volume...</option>

                                                    <?php

        
                                                    foreach ($req_volume as $result) {
                            //echo $result['quantite'];
                                                    ?>
                                                        <option value="<?php echo $result['id']; ?>"><?php echo $result['quantite'];  ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                    </select>
                                                    <br />
                                                    Parfum *
                                                    <br />
                                                    <br />
                                                    <select class="form-control" name="parfum" required>
                                                    <option value="">Choisis un parfum...</option>

                                                    <?php
                                                        /*$req_parfum = $bdd->prepare("SELECT * FROM parfum_categorie WHERE id_categorie_parfum = 1 ");
                                                        $req_parfum->execute(array());
                                                        $req_parfum = $req_parfum->fetchAll();
                                                        var_dump($req_parfum);*/
                                                        foreach ($req_parfum as $result) {
                                                        ?>
                                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['nom_parfum'];  ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                    <br />
                                                    Quantité *
                                                    <br />
                                                    <br />  
                                                    <input type="text" name="quantite" class="form-control" required/>   
                                                    <br />
                                                    Image

                                                    <br />
                                                    <br />

                                                    <input type="file" name="file" class="form-control" required/>   

                                                    <br />

                                                    Prix de vente
                                                    <br />
                                                    <br />


                                                    <input type="text" name="vente" class="form-control" required/>   
                                                    <br />
                                                    Prix au DV
                                                    <br />
                                                    <br />


                                                    <input type="text" name="DV" class="form-control" required/>   
                                                    <br />
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
if(isset($_FILES["file"]["type"])){
if ((($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/pjpeg"))
  //&& ($_FILES["file"]["size"] < 20000)
  )
    {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br
            />";
        }
        else
        {
            //echo "Fichier à télécharger : " . $_FILES["file"]["name"] .            "<br />";
            //echo "Type: " . $_FILES["file"]["type"] . "<br />";
            //echo "Taille: " . ($_FILES["file"]["size"] / 1024) . "            Kb<br />";
            //echo "Fichier temporaire : " . $_FILES["file"]["tmp_name"] .            "<br />";
   
                if (file_exists("img/" . $_FILES["file"]["name"]))
                    {
                        echo " Le fichier".$_FILES["file"]["name"] . "  existe déjà
                        à cette emplacement. ";
                    }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    "img/" . $_FILES["file"]["name"]);
                    //echo "Enregistré dans : " . "img/" .                    $_FILES["file"]["name"];
                }
        }
    }
  else
    {
    echo "Chemin invalide !!";
    }
  

if (isset($_POST['volume'])) {
    if (!empty($_POST['volume']) and $_POST['volume'] != "") {
        if (isset($_POST['parfum'])) {
            if (!empty($_POST['parfum']) and $_POST['parfum'] != "") {
                if (isset($_POST['quantite'])) {
                    if (!empty($_POST['quantite']) and $_POST['quantite'] != "") {
                       
                        $file =  './img/'.$_FILES["file"]["name"];
                        $req_insertion = $bdd->prepare('INSERT INTO articles_id(id_categorie,id_volume,id_parfum,quantite,img, prix_vente,prix_au_DV) VALUES(:id_categorie,:id_volume,:id_parfum,:quantite,:img, :prix_vente,:prix_au_DV)');
                        $req_insertion->execute(array(
                            ':id_categorie' =>$_POST['gamme'],
                            ':id_volume' =>$_POST['volume'],
                            ':id_parfum' =>$_POST['parfum'],
                            ':quantite' =>$_POST['quantite'],
                            ':img' =>$file,
                            ':prix_vente' =>$_POST['vente'],
                            ':prix_au_DV' =>$_POST['DV'],
                        ));                                                                                
                    }
                }
            }
        }
    }

    ?>
<script type='text/javascript'>
window.location.href = "creation_categorie.php?id=<?php echo $_GET['id']; ?>"
</script>
<?php
    }
}
?>

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


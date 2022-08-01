<?php 
session_start();
include('bdd.php');

include('header2.php');

?> 
                <div class="container">
                <a href="modif_qte.php"><button class="btn btn-success btn-lg " type="button" style="margin-bottom:30px;margin-top:30px;">Modifier la quantité d'un article</button></a>
                <a href="creation_article.php"><button class="btn btn-info btn-lg " type="button" style="margin-bottom:30px;margin-top:30px;">Créer un nouvel article</button></a>
                <a href="categorie.php"><button class="btn btn-primary btn-lg " type="button" style="margin-bottom:30px;margin-top:30px;">Créer une nouvelle catégorie</button></a>
                <a href="contenance.php"><button class="btn btn-secondary btn-lg " type="button" style="margin-bottom:30px;margin-top:30px;">Créer une nouvelle contenance</button></a>
                <a href="parfum.php"><button class="btn btn-dark btn-lg " type="button" style="margin-bottom:30px;margin-top:30px;">Créer un nouveau parfum</button></a>

                <form action="" method="POST">
                    <table style="margin-bottom:20px;">
                        <tr><th>Catégorie</th><th>Contenance</th><th>Parfum</th></tr>
                        <tr >
                            
                            <td style="width:400px;">
                                <select class="form-control categorie" name="categorie2">
                                <option value="">Choisis une catégorie...</option>

                                <?php 
                                $req_categorie = $bdd->prepare("SELECT * FROM categories");
                                $req_categorie->execute(array());
                                $req_categorie = $req_categorie->fetchAll();                
                                foreach ($req_categorie as $result) {
                                ?>
                                    <option  value="<?php echo $result['id']; ?>"><?php echo $result['nom'];  ?></option>-->
                                <?php
                                }
                                ?>
                                </select>
                            </td>
                            <td style="width:400px;">
                                <select class="form-control volume" id="select_volume" name="contenance">
                                <option value="vide">Choisis une contenance...</option>
                                </select>
                            </td>
                            <td style="width:400px;">
                                <select class="form-control parfum" name="parfum" id="select_parfum">
                                <option value="vide">Choisis un parfum...</option>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                        </tr>
                    </table>
                    <!--<center><button id="bouton" style="width:200px;margin-bottom:30px;" type="button" class="btn btn-success btn-lg ">Valider</button></center>-->

                </form>
                <div id="la_div"></div>
                </div>
<?php
    //echo $_POST['contenance'];

if(empty($_POST['categorie2'])){
    //echo "empty<br/>";
}
if(!empty($_POST['categorie2'])){
    echo $_POST['categorie2'];
}
if(empty($_POST['contenance'])){
    //echo "empty<br/>";
}
if(!empty($_POST['contenance'])){
    echo "not empty<br/>";
}
if(empty($_POST['parfum'])){
    //echo "empty<br/>";
}
if(!empty($_POST['parfum'])){
    echo "not empty<br/>";
}
?>
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

</body>
</html>
    


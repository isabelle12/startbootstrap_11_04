<?php
include('bdd.php');
//echo $_SESSION['id_agence'];
    $req_aema = $bdd->query("SELECT id, min_quantite FROM `stock_aema`");
    $req_aema->execute(array());
    while ($listresult = $req_aema->fetch()) {
        $req_mat = $bdd->query("SELECT * FROM `stock_hardware` WHERE id_aema = '" . $listresult['id'] . "'");
        $countalerte = $req_mat->rowCount();
        
    }


    $req = $bdd->query("SELECT * FROM `stock_hardware` LEFT JOIN stock_aema ON stock_aema.id = stock_hardware.id_aema LEFT JOIN stock_agence ON stock_agence.id = stock_hardware.stock_id LEFT JOIN intervention ON intervention.id = stock_hardware.id_inter_pas_inari ORDER BY date_entree DESC");
    $req->execute(array());
    $req_fav = $bdd->query("SELECT * FROM `stock_parametres` INNER JOIN stock_agence ON stock_parametres.id_dash1 = stock_agence.id ");
    $req_fav->execute(array());
    $listresult = $req_fav->fetch();
    var_dump($listresult);


    $req_fav2 = $bdd->query("SELECT * FROM `stock_parametres` INNER JOIN stock_agence ON stock_parametres.id_dash2 = stock_agence.id ");
    $req_fav2->execute(array());
    $listresult2 = $req_fav2->fetch();

    $req_fav3 = $bdd->query("SELECT * FROM `stock_parametres` INNER JOIN stock_agence ON stock_parametres.id_dash3 = stock_agence.id ");
    $req_fav3->execute(array());
    $listresult3 = $req_fav3->fetch();

    $req_fav4 = $bdd->query("SELECT * FROM `stock_parametres` INNER JOIN stock_agence ON stock_parametres.id_dash4 = stock_agence.id ");
    $req_fav4->execute(array());
    $listresult4 = $req_fav4->fetch();

    $req_fav5 = $bdd->query("SELECT * FROM `stock_parametres` INNER JOIN stock_agence ON stock_parametres.id_dash5 = stock_agence.id ");
    $req_fav5->execute(array());
    $listresult5 = $req_fav5->fetch();

?>
    <center>
        <div class="container-fluid">

            <!-- Page Heading -->
                <a href="create_stock.php" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Créer un stock</span>
                </a>

                <a href="create_materiel.php" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Créer un matériel</span>
                </a>

            ?>
                <a href="create_aema.php" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Créer un AEMA</span>
                </a>
            <a href="liste_stocks.php" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-list-ul"></i>
                </span>
                <span class="text">Liste des stocks</span>
            </a>
            <a href="quantite_materiels_aema.php" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-list-ul"></i>
                </span>
                <span class="text">Liste du matériel disponible</span>
            </a>
            <a href="list_materiels_manquants.php" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-list-ul"></i>
                </span>
                <span class="text">Liste des materiels manquants</span>
            </a>

            <a href="export_materiels.php" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fab fa-avianex"></i>
                </span>
                <span class="text">Export</span>
            </a>

            <br /><br />
        </div>
    </center>

    <!-- Page Heading -->


    <!-- DataTales Example -->
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->


    </div>
    <br />
        
            <center>
                <h1 class="h3 mb-2 text-gray-800">Liste des derniers routeurs enregistrés</h1>
            </center>
            <br />

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <table id="lastMateriel" class="table table-bordered " style="background-color:white;">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">AEMA</th>
                                <th scope="col">Date Entrée</th>
                                <th scope="col">Dernière action</th>
                                <th scope="col">Intervention (inari)</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($listresult = $req->fetch()) {
                                if ($listresult['SN'] != NULL) {
                            ?>
                                    <tr>
                                        <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"><?php echo $listresult['SN']; ?></a></td>
                                        <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"><?php echo $listresult['aema']; ?></a></td>
                                        <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"><?php echo $listresult['date_entree']; ?></a></td>
                                        <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"><?php echo $listresult['date_derniere_modif']; ?></a></td>
                                        <?php if ($listresult['id_inter'] != 1) { ?>
                                            <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"><?php echo $listresult['id_inter']; ?></a></td>
                                        <?php } elseif ($listresult['id_inter'] == 1 && $listresult['masterId'] != NULL) { ?>
                                            <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"><?php echo $listresult['masterId']; ?></a></td>
                                        <?php } else { ?>
                                            <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"></a></td>
                                        <?php } ?>
                                        <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"><?php echo $listresult['nom']; ?></a></td>
                                        <td><a href="details_routeur.php?id=<?php echo $listresult['id_hardware']; ?>"><?php ?></a></td>
                                    </tr>

                            <?php }
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            </div>

        <?php
        


?>
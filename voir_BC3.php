<?php
include("bdd.php");
//$article = $_GET['id'];

/*$req = $bdd->prepare("SELECT * FROM articles WHERE id ='".$article."'");
$req->execute(array());
$req = $req->fetch();*/


?>
<!DOCTYPE html>
<html lang="en">
<!--<div style="box-shadow: 15px 15px 15px #EBECEF; border-radius: 10px; margin-left: 9%;margin-top: 5%;position: absolute; top:0px;background-color: white;z-index: 15 ;">
    <div id="result-search"></div>
</div>-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="jquery.signature.css">



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-grey sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Sensodiffusion</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-money-bill-alt"></i>                    <span>Caisse</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index3.php">Inventaire</a>
                        <a class="collapse-item" href="buttons.html">Déduction</a>
                        <a class="collapse-item" href="cards.html">Ajout</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-store"></i>                    <span>Distributeur</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="actions_DV.php">Dépôt vente</a>
                        <a class="collapse-item" href="vente2.php">Vente</a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            

            <!-- Nav Item - Charts -->
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn mauve" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                    </div>
                    <div class="col-sm-9 col-xs-9">

                    </div>
                </div>
<div  class="row" style="color:black;height:;padding-top:30px;background-color:white;width:650px;">
    <div class="col-lg-8 offset-lg-1">

        <div class="row" id="bordure" style="height:800px;border: 1px solid #E5E5E5;padding-top:20px;">
            <div class="col-lg-12">
                <div class="row">
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
                    <div class="col-lg-4">
                        <h5 style="margin-left:20px;margin-bottom:-20px;font-weight:900;text-transform:uppercase;font-size:12px;"><?php echo $_GET['nom'];?></h5><br/>
                        <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['enseigne'];?></h6><br/>
                        <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['adresse'];?></h6><br/>
                        <h6 style="margin-left:20px;margin-bottom:-20px;font-size:12px;"><?php echo $_GET['telephone'];?></h6><br/>
                        <h6 style="margin-left:20px;font-size:12px;"><?php echo $_GET['mail'];?><h5><br/>  
                    </div>
                    <div class="col-lg-3">
                        <div class="row" >
                            <h6 style="font-size:12px;">Livrer à : <br/><?php echo $_GET['details']; ?></h6>
                        </div>
                    </div>

                    <div class="col-lg-5" style="margin-bottom:20px;">
                    
                        <?php 
                        //$tableau_commande = $_GET['commande'];
                        //$chaine_commande = explode(",",$tableau_commande);
                        /*$req_commande2 = $bdd->prepare("SELECT produit,qte,date_commande,date_alerte,prix_DV FROM commandes WHERE numero_commande='".$tableau_commande."'");
                        $req_commande2->execute(array());
                        $req_commande2 = $req_commande2->fetchAll();
                        $stamp = strtotime($req_commande2[0]['date_commande']);
                        $date_convertie = date('d-m-Y', $stamp);
                        $stamp2 = strtotime($req_commande2[0]['date_alerte']);
                        $date_convertie2 = date('d-m-Y', $stamp2);
                        $date = date('d-m-Y');*/
                        ?>
                            </h2>
                            <p style="font-size:12px;">Date de la commande <?php $date = date('d-m-Y');echo $date; ?></p>
                            <p style="font-size:12px;">Commande N°<?php echo $_GET['num_commande']; ?></p>
                            <p style="font-size:12px;">Date alerte <?php echo $_GET['alerte']; ?></p>
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
                    //for($i=0;$i<count($req_commande2);$i++){
                        ?>
                        <tr>
                            <td style="padding-top:10px;padding-left:10px;font-size:11px;border: 1px solid #E5E5E5;height:17px;width:27px;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php //echo $req_commande2[$i]['produit'];?></h6></td>
                            <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:21px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php //echo $req_commande2[$i]['qte'];?></h6></td>
                            <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:21px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php ///echo $req_commande2[$i]['prix_DV'];?></h6></td>
                            <td style="padding-top:10px;padding-left:10px;border: 1px solid #E5E5E5;width:18px;text-align:right;padding-right:10px;height:50px;"><h6 style="font-size:13px;"><?php //echo (int)$req_commande2[$i]['prix_DV']*(int)$req_commande2[$i]['qte']; ?></h6></td>

                        <?php 
                        //$multiplication[] = (int)$req_commande2[$i]['prix_DV']*(int)$req_commande2[$i]['qte'];
                        //var_dump(is_int((int)$multiplication));

                        //echo $multiplication;
                        ?>
                    </tr>
                    <?php
                    //}
                    /*$somme=0;
                    for($i=0;$i<count($multiplication);$i++){
                        $somme += (int)$multiplication[$i];
                    } */       
                    ?> 
                </table>
                <div class="row" style="background-color:#E5E5E5;width:120px;height:60px;margin-top:250px;margin-left:450px;" >
                    <div class="col-lg-12">
                        <div class="row">
                            <span style="margin-right:20px;font-size:12px;">Total HT</span>
                            <span><?php //echo $somme; ?></span>
                        </div>
                        <div class="row">
                            <span style="margin-right:20px;font-size:12px;">TVA</span>
                            <!--<span style="margin-right:20px;font-size:12px;">Total TTC</span>-->
                        </div>
                        <div class="row">
                            <span style="margin-right:20px;font-size:12px;font-weight:800;">Total TTC</span>
                            <span><?php //echo $somme; ?></span>

                        </div>
                    </div>
                    <!--<span><?php //echo $somme; ?></span>-->
                </div>
            </div>
        </div>

    </div>


        <div class="col-lg-4">
            <form id="formulaire" method="post">
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
            </form>
        </div>
    </div>
</div>


        

    <?php
    //$chaine_vers = "export_facture4.php?details=".$_GET['details']."&nom=".$_GET['nom']."&adresse=".$_GET['adresse']."&mail=".$_GET['mail']."&telephone=".$_GET['telephone']."&enseigne=".$_GET['enseigne']."&details=".$_GET['details']."&num_facture=&num_commande=".$tableau_commande."&paiement=&alerte=".$date_convertie2."&taille=";
    ?>
    <a href="<?php //echo $chaine_vers; ?>"><button style="margin-top:30px;" type="button" class="btn btn-success btn-lg ">Créer PDF facture</button></a><br/><br/><br/> 
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






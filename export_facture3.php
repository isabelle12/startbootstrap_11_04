<?php
/*require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'Facture');
//$pdf->Output();
$content="<table><tr><td>un</td></table>";
$pdf->Cell(40,10,$content);
$pdf->Cell(60,10,'',0,1,'C');


$pdf->output('PV_.pdf', 'D');*/


include('bdd.php');
include('vendor2/autoload.php');
//echo $_POST['distributeur'];
echo "";
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{
    //création numéro facture 
    $req_facture = $bdd->prepare("SELECT numero_facture,numero_commande,date_alerte FROM facture");
    $req_facture->execute(array());
    $tableau_deux=array();
    $result_facture = $req_facture->fetchAll();

    if(empty($result_facture)){
        $chaine2 = "FR-100-0001";
        $chaine3="0001";
    }
    else{
        foreach($result_facture as $facture){
            //echo $result_facture['numero_facture'];
            $tableau = explode("-",$facture['numero_facture']);            
            $tableau_deux[]=intval($tableau[2]);
        }
        $plus = max($tableau_deux)+1;
        $chaine = strval($plus);
        $longueur = strlen($chaine);
        $chaine3="";
        $zeros=4-$longueur;
        $chaine2="";
        for($i=0;$i<$zeros;$i++){
            $chaine2 .= "0";
        }
        $chaine2.=$chaine;
        $chaine2="FR-100-".$chaine2;
    }
    $date=date('Y-m-d');

    $insertion = $bdd->prepare("INSERT INTO facture(numero_facture,date_facture) VALUES(:numero_facture,:date_facture)");
    $insertion->execute(array(
    ':numero_facture' => $chaine2,
    ':date_facture' => $date,
    
));
/*$lastid = $bdd->lastInsertId();
$req_facture_26 = $bdd->prepare("SELECT numero_facture FROM facture WHERE id='".)*/

    //fin création numéro facture
    
    $taille=$_GET['taille'];
    $somme=0;
    var_dump($_GET['commande']);
    $tableau_commandes2 = explode(",",$_GET['commande']);
    //$alerte = $bdd->prepare("SELECT date_alerte FROM commandes WHERE numero_commande = ")


    for($i=0;$i<$taille;$i++){
        $adresse_produit = 'produit'.$i;
        $adresse_qte = 'qte'.$i;
        $adresse_prix_vente = 'prix_vente'.$i;
        $multiplication = $_GET[$adresse_prix_vente]*$_GET[$adresse_qte];

        $somme += $multiplication;
    }
    

    $content = '<page>
        <div style="width:600px;max-width:600px;">
            <table style="width:100%">
                <tr >
                    <td>
                        <table style="width:100%">
                            <tr>
                                <td style="width:500px; "><h1>Facture</h1></td>
                                <td style="text-align:right;> <h5>SENSO DIFFUSION</h5>
                                <p style="margin-top:0px;padding-top:0px;">424 Avenue de Saint Antoine<br/>
                                13015 - Marseille</p>
                                
                                </td>

                            </tr>
                        </table>
                    </td>
                </tr>
                <tr >
                    <td>
                        <table style="width:100%;  cellspacing:0; cellpadding:0;margin-top:100px;">
                            <tr>
                                <td  style="width:30%">'.$_GET['nom'].'<br/>'.$_GET['adresse'].'<br/>'.$_GET['mail'].'<br/>'.$_GET['telephone'].'</td>
                                <td style=" width:30%">Livrer à : <br/>'.$_GET['details'].'</td>
                                <td style=" width:40%">
                                Numéro de facture : '.$chaine2.'<br/>
                                Date de la facture : '.$date.'<br/>
                                Numéro de commande : '.$tableau_commandes2[0].'<br/>
                                Date de commande : '.$tableau_commandes2[1].'<br/>
                                Date alerte : '.$tableau_commandes2[2].'<br/>
                                Méthode de paiement : '.$_GET['paiement'].'<br/></td>

                    
                            </tr>';
                   

    $content.='

        <tr>

            <td></td>
        </tr>
    </table>
    </td>
    </tr>
    <tr>
    <td>
    <table style="width:100%;  cellspacing:0; cellpadding:0;margin-top:50px;">
        <tr style="margin-bottom:50px;">
            <th  style="width:30%;margin-bottom:50px;">Produits</th>
            <th style=" width:30%">Quantité</th>
            <th style=" width:30%">Prix unitaire</th>
            <th style=" width:10%">Sous-total</th>


        </tr>';

    $taille=$_GET['taille'];
    for($i=0;$i<$taille;$i++){
        $adresse_produit = 'produit'.$i;
        $adresse_qte = 'qte'.$i;
        $adresse_prix_vente = 'prix_vente'.$i;

        /*echo "adresse";
        echo $_GET[$adresse_produit];
        echo "adresse";*/

        $content.='<tr style="margin-bottom:100px;height:200px;">
                       <td style="white-space:pre-line;width:30%;height:50px;">'.$_GET[$adresse_produit].'</td>
                       <td  style="width:30%">'.$_GET[$adresse_qte].'</td>
                       <td  style="width:30%">'.$_GET[$adresse_prix_vente].'</td>
                       <td  style="width:10%">'.$_GET[$adresse_prix_vente]*$_GET[$adresse_qte].'</td>


        </tr><br/><br/>';

    } 
    
    $content.='


    <tr style="margin-top:100px;">
    <td  style="width:30%"></td>
    <td  style="width:30%"></td>
    <td  style="width:30%"></td>
    <td  style="width:10%">'.$somme.'</td>
    </tr>

</table>
</td>
</tr>
</table>
</div>
</page>';

$num_facture = $_GET['num_facture'];

$num_commande = $_GET['num_commande'];


/*$req_insert = $bdd->prepare("INSERT INTO facture(numero_facture,numero_commande) VALUES(:num_facture,:num_commande)");
$req_insert->execute(array(':num_facture' =>$num_facture,
':num_commande' =>$num_commande,));  */  



    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(5, 5, 60, 5));
    $html2pdf->setTestTdInOnePage(false);
    $html2pdf->writeHTML($content);
    
    //$html2pdf->output('startbootstrap/upload/PV_.pdf', 'F');
    $html2pdf->Output(__DIR__ .' /upload/'.$num_facture.'_facture.pdf', 'F');
    //$pdf->Output(__DIR__ . '/invoices/Delivery Note.pdf', 'F');


} catch (Html2PdfException $e){
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();

}
?>
<!--<script type='text/javascript'>
window.location.href = "creation_categorie.php?id=<?php echo $_GET['id']; ?>"
</script>-->
<?php

//include_once('header.php');
        //echo $idcommande;
        //echo $token;
        
?>
<!DOCTYPE html>
<html lang="en">

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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/planning.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="jquery.signature.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet" />
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }

        #sig2 canvas {
            width: 100% !important;
            height: auto;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-mauve sidebar sidebar-dark accordion" id="accordionSidebar">

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
                        <a class="collapse-item" href="DV.php">Dépôt vente</a>
                        <a class="collapse-item" href="utilities-border.html">Vente</a>
                        
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
                        <img style="margin-top:10px;" src="img/deodorant.png" />
                    </div>
                    <div class="col-sm-9 col-xs-9">

                    </div>
                </div>
    <!-- Begin Page Content -->
    <div class="container-fluid" style="max-width:700px;margin-bottom:30px;height:px;">
        <!-- Page Heading -->
        <form action="" method="post">
            <h1 class="h3 mb-4 text-gray-800">


            </h1>
            <!----------------------------------------------------------------------------------------->
            
           
            <!----------------------------------------------------------------------------------------------------->

            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 message" id="message">
                                <div class="row">

                                   
                                </div>
                                <div class="row">

                                    <div class="col-lg-6 offset-lg-3">
                                        <br /><br />
                                        <div id="sig"></div>
                                        <?php
                                        $chaine="";
                                        $chaine2="";
                        
                                        for($i=0;$i<$taille;$i++){
                                            $variable="produit".$i;
                                            $variable2="qte".$i;
                                            $variable3="prix_vente".$i;
                        
                                            $chaine.="&produit".$i."=".$_GET[$variable];
                                            $chaine.="&qte".$i."=".$_GET[$variable2];
                                            $chaine.="&prix_vente".$i."=".$_GET[$variable3];
                                        }

                                        $alerte = $_GET['alerte'];


                                        ?>
                                        Votre facture au format PDF vient d'être créée, voulez vous l'envoyer par mail au client?    
                                        <a style="text-decoration:none;" href="mail2.php?num_commande=<?php echo $num_commande; ?>&num_facture=<?php echo $num_facture; ?>"><button style="margin-top:30px;" class="btn btn-success btn-lg btn-block" type="button" >oui</button></a>
                                        <!--Votre bon de commande au format PDF vient d'être créé, voulez vous l'envoyer par mail au client?-->    
                                        <!--<a style="text-decoration:none;" href="mail.php?num_commande=<?php //echo $num_commande; ?>"><button style="margin-top:30px;" class="btn btn-success btn-lg btn-block" type="button" >oui</button></a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                </div>
                </div>
    <!-- /.container-fluid -->

    </div>



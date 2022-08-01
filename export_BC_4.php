<?php
//ob_start();

//ob_end_clean();

include('header2.php');
include('bdd.php');
include('vendor2/autoload.php');
//include('about.php');
//echo $_POST['distributeur'];
//echo "";
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
?>
<style type="text/css">

table.page_header {width: 100%; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
div.note {border: solid 1mm #DDDDDD;background-color: #EEEEEE; padding: 2mm; border-radius: 2mm; width: 100%; }
ul.main { width: 95%; list-style-type: square; }
ul.main li { padding-bottom: 2mm; }
h1 { text-align: center; font-size: 20mm}
h3 { text-align: center; font-size: 14mm}

</style>
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

$date=date('d-m-Y');
   
$tableau_commande = $_GET['num_commande'];
$chaine_commande = explode(",",$tableau_commande);
   

    //var_dump($req_commande2);
    
$alerte = $_GET['alerte'];
$stamp25 = strtotime($alerte);
$alerte2 = date('Y-m-d',$stamp25);
$date25= date('Y-m-d');
$num_facture = $_GET['num_facture'];

$num_commande = $_GET['num_commande'];
$commande_num = trim($num_commande);
$chemin = 'upload/'.$num_commande.'.pdf';


try{
    


    $content = '<page>
        <div style="width:600px;max-width:600px;">
            <table style="width:100%">
                <tr >
                    <td>
                        <table style="width:100%">
                            <tr>
                                <td style="width:500px; "><h1>Bon de commande</h1></td>
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
                        <table style="width:100%;  cellspacing:0; cellpadding:0;margin-top:100px;margin-bottom:30px;">
                            <tr>
                                <td  style="width:30%">'.$_GET['nom'].'<br/>'.$_GET['enseigne'].'<br/>'.$_GET['adresse'].'<br/>'.$_GET['mail'].'<br/>'.$_GET['telephone'].'</td>
                                <td style=" width:30%">Livrer à : <br/>'.$_GET['details'].'</td>
                                <td style=" width:40%">
                                Date de la commande : '.$date.'<br/>
                                Numéro de commande : '.$tableau_commande.'<br/>
                                Date alerte : '.$_GET['alerte'].'<br/></td>
                            </tr>';
                                $content.='

       
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;margin-left:15px;cellspacing:0; cellpadding:0;border-spacing: 0; border-width: 0; padding: 0; border-width: 0;  border-collapse: collapse;">
                            <tr padding-top:20px;style="border-style:solid;border-width:1px;border-color:#DCDAD9;background-color:#E5E5E5;height:40px;">
                                <th style="width:50%;margin-right:0px;height:20px;padding-top:10px;text-align:center">Produits</th>
                                <th style="width:50%;height:20px;padding-top:10px;text-align:center">Quantité</th>

                            </tr>';


                                for($i=1;$i<=$_GET['taille'];$i++){
                                  $index = "produit".$i;
                                  $index2 = "qte".$i;

                                  $index3 = "prix_DV".$i; 
                                  $index4 = "prix_vente".$i; 

                                if(isset($_GET[$index3])){
                                  $req_insertion = $bdd->prepare('INSERT INTO commandes(numero_commande,date_commande,nom_distributeur,date_alerte,produit,qte,prix_DV,chemin_pdf) VALUES(:num_commande,:date_commande,:nom,:date_alerte,:produit,:qte,:prix,:chemin_pdf)');
                                  $req_insertion->execute(array(
                                      ':num_commande' =>$_GET['num_commande'],
                                      ':date_commande' =>$date25,
                                      ':nom' =>$_GET['nom'],
                                      ':date_alerte' =>$alerte2,
                                      ':produit' =>$_GET[$index],
                                      ':qte' =>$_GET[$index2],
                                      ':prix' =>$_GET[$index3],
                                      ':chemin_pdf' =>$chemin

                                  ));
                                }
                                if(isset($_GET[$index4])){
                                    $req_insertion = $bdd->prepare('INSERT INTO commandes(numero_commande,date_commande,nom_distributeur,date_alerte,produit,qte,prix_vente,chemin_pdf) VALUES(:num_commande,:date_commande,:nom,:date_alerte,:produit,:qte,:prix,:chemin_pdf)');
                                    $req_insertion->execute(array(
                                        ':num_commande' =>$_GET['num_commande'],
                                        ':date_commande' =>$date25,
                                        ':nom' =>$_GET['nom'],
                                        ':date_alerte' =>$alerte2,
                                        ':produit' =>$_GET[$index],
                                        ':qte' =>$_GET[$index2],
                                        ':prix' =>$_GET[$index4],
                                        ':chemin_pdf' =>$chemin

  
                                    ));
                                  }
                                                                       
   
                                     $content.='
                                <tr>
                                    <td  style="height:30px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;margin-right:-10px;padding-right:0px;text-align:center;padding-right:20px;">'.$_GET[$index].'</td>
                                    <td  style="height:30px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$_GET[$index2].'</td>   
   
                                </tr>';
                                }
                                $content.='

                        </table>
                        <table style="width:100%;margin-top:400px;">
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tr>

                            <tr >
                                <td style="width:30%;"></td>
                                <td style="width:30%;"></td>

                                <td style="height:100px;width:30%;border-style:solid;border-width:1px;border-color:black;" >

                                </td>
                            </tr>


                        </table>


                    </td>
                </tr>
            </table>
        </div>
    </page>';





/*$req_insert = $bdd->prepare("INSERT INTO facture(numero_facture,numero_commande) VALUES(:num_facture,:num_commande)");
$req_insert->execute(array(':num_facture' =>$num_facture,
':num_commande' =>$num_commande,));    */



    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(5, 5, 60, 5));
    $html2pdf->setTestTdInOnePage(false);
    $html2pdf->writeHTML($content);
    //$html2pdf->output('startbootstrap/upload/PV_.pdf', 'F');
    $html2pdf->output(__DIR__ .' /upload/'.$commande_num.'.pdf', 'F');
    //$pdf->Output(__DIR__ . '/invoices/Delivery Note.pdf', 'F');
    $fichier = $commande_num.'.pdf';
    //$html2pdf->output($fichier, 'FD');
    //$html2pdf->Output('..../Téléchargements/'.$commande_num.'.pdf', 'F');
    //$facture = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr');
    /*$facture = new Html2Pdf('P', 'A4', 'fr');

 
    
    $facture->writeHTML('du HTML');
    $facture->output();*/


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

                <!-- End of Topbar -->
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
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
                                        Votre bon de commande au format PDF vient d'être créé, voulez vous l'envoyer par mail au client?    
                                        <a style="text-decoration:none;" href="mail_BL_DV.php?num_commande=<?php echo $num_commande; ?>"><button style="margin-top:30px;" class="btn btn-success btn-lg btn-block" type="button" >oui</button></a>
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
<?php
//ob_end_flush();
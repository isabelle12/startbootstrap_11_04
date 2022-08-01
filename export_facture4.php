<?php

include('header2.php');

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


include('bdd.php');
include('vendor2/autoload.php');
//include('about.php');
//echo $_POST['distributeur'];
echo "";
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{
    $date=date('d-m-Y');
   
    $tableau_commande = $_GET['num_commande'];
    $chaine_commande = explode(",",$tableau_commande);
    $req_commande2 = $bdd->prepare("SELECT produit,qte,date_commande,date_alerte,prix_DV FROM commandes WHERE numero_commande='".$tableau_commande."'");
    $req_commande2->execute(array());
    $req_commande2 = $req_commande2->fetchAll();
    $stamp = strtotime($req_commande2[0]['date_commande']);
    $date_convertie = date('d-m-Y', $stamp);
    $stamp2 = strtotime($req_commande2[0]['date_alerte']);
    $date_convertie2 = date('d-m-Y', $stamp2);
    //var_dump($req_commande2);

    $req_facture = $bdd->prepare("SELECT numero_facture FROM facture");
    $req_facture->execute(array());
    $tableau_deux=array();
    $result_facture = $req_facture->fetchAll();
    
    if(empty($result_facture)){
        $chaine_finale = "FR-100-0001";
        $chaine3="0001";
    }
    else{
        foreach($result_facture as $facture){
            $tableau_parse = explode("-",$facture['numero_facture']);
            //echo $tableau_parse[2] ;
            $tableau_factures[] = intval($tableau_parse[2]);
        }
        $plus_facture = max($tableau_factures)+1;
        //echo $plus_facture;
        $chaine_facture = strval($plus_facture);
        $longueur_facture = strlen($chaine_facture);
        //echo $longueur_facture;
        if($longueur_facture==1){
            $chaine_finale="FR-100-000".$plus_facture;
        }
        elseif($longueur_facture==2){
            $chaine_finale="FR-100-00".$plus_facture;

        }
        elseif($longueur_facture==3){
            $chaine_finale="FR-100-0".$plus_facture;

        }
        elseif($longueur_facture==4){
            $chaine_finale="FR-100-".$plus_facture;
        }
    }
    //echo $chaine_finale;
    
    ?>
    
<?php
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
                        <table style="width:100%;  cellspacing:0; cellpadding:0;margin-top:100px;margin-bottom:30px;">
                            <tr>
                                <td  style="width:30%"><span style="text-transform: uppercase;font-weight:bold;">'.$_GET['nom'].'</span><br/><br/>'.$_GET['enseigne'].'<br/><br/>'.$_GET['adresse'].'<br/><br/>'.$_GET['mail'].'<br/><br/>'.$_GET['telephone'].'</td>
                                <td style=" width:30%">Livrer à : <br/><br/>'.$_GET['details'].'</td>
                                <td style=" width:40%">
                                Date de la facture : '.$date.'<br/><br/>
                                Numéro de la facture : '.$chaine_finale.'<br/><br/>

                                Date de la commande : '.$date_convertie.'<br/><br/>
                                Numéro de commande : '.$tableau_commande.'<br/><br/>
                                Date alerte : '.$date_convertie2.'<br/></td><br/>
                            </tr>';
                                $content.='       
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;margin-left:5px;cellspacing:0; cellpadding:0;border-spacing: 0; border-width: 0; padding: 0; border-width: 0;  border-collapse: collapse;">
                            <tr padding-top:20px;style="border-style:solid;border-width:1px;border-color:#DCDAD9;background-color:#E5E5E5;height:40px;">
                                <th style="padding-left:10px;width:29%;margin-right:0px;height:20px;padding-top:10px">Produits</th>
                                <th style="padding-left:10px;width:29%;height:20px;padding-top:10px">Quantité</th>
                                <th style="padding-left:10px;width:29%;height:20px;padding-top:10px">Prix</th>
                                <th style="padding-left:10px;width:12%;height:20px;padding-top:10px">Sous-total</th>

                            </tr>';
                                for($i=0;$i<count($req_commande2);$i++){
                                    $multiplication[] = (int)$req_commande2[$i]['prix_DV']*(int)$req_commande2[$i]['qte'];

                                 $content.='
                            <tr >
                                <td  style="height:20px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;margin-right:-10px;padding-right:0px;text-align:right;padding-right:20px;">'.$req_commande2[$i]['produit'].'</td>
                                <td  style="height:20px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:right;padding-right:20px;">'.$req_commande2[$i]['qte'].'</td>
                                <td  style="height:20px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;text-align:right;padding-right:20px;">'.$req_commande2[$i]['prix_DV'].'</td>
                                <td  style="height:20px;width:10%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;text-align:right;padding-right:20px;">'.$multiplication[$i].'</td>
                            </tr>';
                                }
                            $somme=0;
                            for($i=0;$i<count($multiplication);$i++){
                                $somme += (int)$multiplication[$i];
                            }
                                $content.='
                        </table>
                        <table style="width:100%;margin-top:450px;">
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tr>

                            <tr >
                                <td style="width:30%;"></td>
                                <td style="width:50%;"></td>
                                <td style="padding-top:20px;height:30px;width:20%;background-color:#E5E5E5;padding-left:10px;" >Total HT     <span style="margin-left:40px;">'.$somme.'€</span><br/>TVA<br/><span style="font-weight:bold;">Total TTC </span><span style="margin-left:30px;font-weight:bold;">'.$somme.'€</span> 
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </page>';
/*$content = '<style>
.table-bordered {
    border: 1px solid #dee2e6;
  }
 
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #dee2e6;
  }
 
  .table-bordered thead th,
  .table-bordered thead td {
    border-bottom-width: 2px;
  }
  .table-dark.table-bordered {
    border: 0;
  }
  @media (max-width: 575.98px) {
    .table-responsive-sm {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    .table-responsive-sm > .table-bordered {
      border: 0;
    }
  }
  @media (max-width: 991.98px) {
    .table-responsive-lg {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    .table-responsive-lg > .table-bordered {
      border: 0;
    }
  }
 
  @media (max-width: 1199.98px) {
    .table-responsive-xl {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    .table-responsive-xl > .table-bordered {
      border: 0;
    }
  }
  .table-responsive > .table-bordered {
    border: 0;
  }
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important;
  }


</style>
<table class="table table-bordered">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">First</th>
    <th scope="col">Last</th>
    <th scope="col">Handle</th>
  </tr>
</thead>
<tbody>
  <tr>
    <th scope="row">1</th>
    <td>Mark</td>
    <td>Otto</td>
    <td>@mdo</td>
  </tr>
  <tr>
    <th scope="row">2</th>
    <td>Jacob</td>
    <td>Thornton</td>
    <td>@fat</td>
  </tr>
  <tr>
    <th scope="row">3</th>
    <td colspan="2">Larry the Bird</td>
    <td>@twitter</td>
  </tr>
</tbody>
</table>';*/

//fin premier content-------------------------



$num_facture = $_GET['num_facture'];

$num_commande = $_GET['num_commande'];


/*$req_insert = $bdd->prepare("INSERT INTO facture(numero_facture,numero_commande) VALUES(:num_facture,:num_commande)");
$req_insert->execute(array(':num_facture' =>$num_facture,
':num_commande' =>$num_commande,));    */
$date2 = date('Y-m-d');

$req_insert = $bdd->prepare("INSERT INTO facture(numero_facture,numero_commande,date_facture,nom_distributeur) VALUES(:num_facture,:num_commande,:date_facture,:nom)");
$req_insert->execute(array(':num_facture' =>$chaine_finale,
':num_commande' =>$num_commande,
':date_facture' =>$date2,
':nom' =>$_GET['nom'],
)); 



    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(5, 5, 60, 5));
    $html2pdf->setTestTdInOnePage(false);
    $html2pdf->writeHTML($content);
$commande_num = trim($num_commande);
    //$html2pdf->output('startbootstrap/upload/PV_.pdf', 'F');
    $html2pdf->Output(__DIR__ .' /upload/'.$chaine_finale.'_facture.pdf', 'F');
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
                                        Votre facture au format PDF vient d'être créée, voulez vous l'envoyer par mail au client?    
                                        <a style="text-decoration:none;" href="mail_facture.php?num_commande=<?php echo $num_commande; ?>&num_facture=<?php echo $chaine_finale;?>"><button style="margin-top:30px;" class="btn btn-success btn-lg btn-block" type="button" >oui</button></a>
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
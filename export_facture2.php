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
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{
    $date=date('Y-m-d');

    $content = '<page>
    <div style="width:600px;max-width:600px;">
        <table style="width:100%">
            <tr>
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
            <tr>
                <td>
                    <table style="width:100%;  cellspacing:0; cellpadding:0">
                        <tr>
                            <td  style="width:30%">'.$_GET['nom'].'<br/>'.$_GET['adresse'].'<br/>'.$_GET['mail'].'<br/>'.$_GET['telephone'].'</td>
                            <td style=" width:30%">Livrer à : <br/>'.$_GET['details'].'</td>
                            <td style=" width:40%">Numéro de la facture : '.$_GET['num_facture'].'<br/><br/>
                            Date de la facture : '.$date.'<br/>
                            Numéro de commande : '.$_GET['num_commande'].'<br/>
                            Date de commande :<br/><br/>
                            Méthode de paiement :  '.$_GET['paiement'].'<br/>;</td>
                
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
<table style="width:100%;  cellspacing:0; cellpadding:0">
    <tr>
        <th  style="width:30%">Produits</th>
        <th style=" width:30%">Quantité</th>
        <th style=" width:40%">Prix unitaire</th>

    </tr>';

    $taille=$_GET['taille'];
    for($i=0;$i<$taille;$i++){
        $adresse_produit = 'produit'.$i;
        $adresse_qte = 'qte'.$i;
        $adresse_prix_vente = 'prix_vente'.$i;


        $_GET[$adresse_produit];
        $content.='<tr><td  style="width:30%">'.$_GET[$adresse_produit].'</td>
                       <td  style="width:30%">'.$_GET[$adresse_qte].'</td>
                       <td  style="width:30%">'.$_GET[$adresse_prix_vente].'</td>

        </tr>';

    } 
    
    $content.='

    <tr>

        <td></td>
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
':num_commande' =>$num_commande,));    */



    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(5, 5, 60, 5));
    $html2pdf->setTestTdInOnePage(false);
    $html2pdf->writeHTML($content);
    
    $html2pdf->output('PV_.pdf', 'D');

} catch (Html2PdfException $e){
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();

}
?>


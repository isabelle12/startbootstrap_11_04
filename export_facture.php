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



include('vendor2/autoload.php');
//echo $_POST['distributeur'];
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{

    $content = '<page>
    <div style="width:600px;max-width:600px;">
        <table style="width:100%">
        <tr>
            <td>
                <table style="width:100%">
                    <tr>
                        <td style="width:500px; "><h1>Facture</h1></td>
                        <td style="text-align:right;> <h5>SENSO DIFFUSION</h5>
                        
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%; border:2px solid black;" cellspacing="0" cellpadding="0">
                   
                    <tr>
                        <td style="width:50%; border:1px solid black; text-align:center;">
                            <B>CLIENT</B>
                        </td>
                        <td style="width:50%; border:1px solid black; text-align:center;">
                            <B>INTERVENANT</B>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%; border:1px solid black; overflow-wrap:break-word;white-space:normal;word-break:break-all">
                            
                        </td>
                        <td style="width:50%; border:1px solid black; overflow-wrap:break-word;white-space:normal;word-break:break-all">
                            STIT : AZUR CONNECT <BR>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%; border:1px solid black; overflow-wrap:break-word;white-space:normal;word-break:break-all">
                        </td>
                       
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; overflow-wrap:break-word;white-space:normal;word-break:break-all">
                <BR><h3>MATERIELS - /!\\ Chaque équipement doit être étiqueté /!\\</h3>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; overflow-wrap:break-word;white-space:normal;word-break:break-all">
                <B>Matériels Posés</B>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%; border:2px solid black; cellspacing:0; cellpadding:0">
                    <tr>
                        <th style="border: 1px solid black; width:20%">equipement_1</th>
                        <th style="border: 1px solid black; width:20%">equipement_2</th>
                        <th style="border: 1px solid black; width:20%">equipement_3</th>
                        <th style="border: 1px solid black; width:20%">equipement_4</th>
                       
                    </tr>
                    
                    <tr>
                        
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td style="width:100%; text-align:center;"><BR><h3>STATUT DE L\'INTERVENTION</h3></td>
        </tr>
        <tr>
            <td>
                <table style="width:100%; border:2px solid black; cellspacing:0; cellpadding:0">
                    <tr>
                        <th style="border:1px solid black; text-align:center; width:50%;">INTERVENTION OK</th>
                        <th style="border:1px solid black; text-align:center; width:50%;">INTERVENTION KO</th>
                    </tr>
                
                </table>
            </td>
        </tr>
 
        <tr>
            <td style="text-align:center">
                <BR><h3>TESTS APPELS ABOUTIS</h3>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:100%; border: 2px solid black;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="width:100%" colspan="4"> 
                        </td>
                    </tr>
                    <tr>
                        <td>15/17/18 </td>
                        <td>08 84 28 99 99 </td>
                        <td>32 50 </td>
                        <td>36 99 </td>
                    </tr>
                    <tr>
                        <td>01 40 28 72 72 </td>
                        <td>06 01 08 00 00 </td>
                        <td>0015 142 833 010 </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;"><BR><h3>SIGNATURES</h3></td>
        </tr>
        <tr>
            <td>
                <table style="width:100%; border:2px solid black" cellspacing="0" cellpadding="0">
                    <tr>
                        <th style="border:1px solid black; text-align:center; width:50%;">Technicien</th>
                        <th style="border:1px solid black; text-align:center; width:50%;">Client</th>
                    </tr>
                    <tr>
                        <td style="width:50%; border:1px solid black">
                        </td>
                        <td style="width:50%; border:1px solid black">
                            
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
   
        <tr>
            <td style="text-align:center;"><BR><h3>PHOTOS</h3></td>
        </tr>

        
        
        </table>
    </div>
</page>';



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


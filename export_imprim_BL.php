<?php
include('vendor2/autoload.php');
include('bdd.php');


use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
$date=date('d-m-Y');
   
$tableau_commande = $_GET['commande'];
$chaine_commande = explode(",",$tableau_commande);




$req_alerte = $bdd->prepare("SELECT date_alerte,prix_DV,produit,qte,date_commande FROM commandes WHERE numero_commande = '".$tableau_commande."'");
$req_alerte->execute(array());
$req_alerte = $req_alerte->fetchAll();
//echo $req_alerte['date_alerte'];
//var_dump($req_alerte);
foreach($req_alerte as $cellule){
    $tableau_produits[]=$cellule['produit'];
    $tableau_qte[]=$cellule['qte'];
    $prix[] = $cellule['prix_DV'];

}
$taille = count($tableau_produits);


    //var_dump($req_commande2);
    
$alerte = $req_alerte[0]['date_alerte'];
$stamp25 = strtotime($alerte);
$alerte2 = date('d-m-Y',$stamp25);
$date25= date('Y-m-d');
$date_commande = $req_alerte[0]['date_commande'];
$stamp25 = strtotime($date_commande);
$date_commande = date('d-m-Y',$stamp25);

$req_facture = $bdd->prepare("SELECT nom_BL FROM bons_livraison");

$req_facture->execute(array());
$tableau_deux=array();
$result_facture = $req_facture->fetchAll();

if(empty($result_facture)){
    $chaine3="BL".date("d-m-Y")."-001";
}
else{    

    foreach($result_facture as $facture){
        //echo $result_facture['numero_facture'];
        $tableau = explode("-",$facture['nom_BL']);
        //echo intval($tableau[3])."<br/>";
        $tableau_BL[] = intval($tableau[3]);
    }
    $plus_commande = max($tableau_BL)+1;
    /*echo "max";
    echo $plus_commande;
    echo "max";*/
    $chaine_commande = strval($plus_commande);
    //$longueur = strlen($chaine);
    $longueur_commande = strlen($chaine_commande);
    $zeros_commande = 3-$longueur_commande;
    if($zeros_commande==1){
        $chaine3 = "BC".date("d-m-Y")."-0".$chaine_commande;
    }
    if($zeros_commande==2){
        $chaine3 = "BC".date("d-m-Y")."-00".$chaine_commande;

    }
    if($zeros_commande==0){
        $chaine3 = "BC".date("d-m-Y").$chaine_commande;
    }}


//$num_facture = $_GET['num_facture'];

$num_commande = $_GET['commande'];
$commande_num = trim($num_commande);
$content = '<page>
        <div style="width:600px;max-width:600px;">
            <table style="width:100%">
                <tr >
                    <td>
                        <table style="width:100%">
                            <tr>
                                <td style="width:500px; "><h1>Bon de livraison</h1></td>
                                <td style="text-align:right;> <h5>SENSO DIFFUSION</h5>
                                <p style="margin-top:0px;padding-top:0px;">424 Avenue de Saint Antoine<br/>
                                13015 - Marseille</p>
                               
                                </td>

                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="margin-bottom:px;">
                    <td>
                        <table style="width:100%;  cellspacing:0; cellpadding:0;margin-top:100px;margin-bottom:px;">
                            <tr>
                            <td style=" width:40%">
                                Bon de livraison N°'.$chaine3.'<br/>
                                Date du bon de livraison : '.$date.'<br/>
                                Date de la commande : '.$date_commande.'<br/>
                                Numéro de commande : '.$tableau_commande.'<br/>
                                Date d\'échéance : '.$alerte2.'<br/></td>
                                <td style=" width:30%">Livrer à : '.$_GET['details'].'</td>

                                <td  style="width:30%">'.$_GET['nom'].'<br/>'.$_GET['enseigne'].'<br/>'.$_GET['adresse'].'<br/>'.$_GET['mail'].'<br/>'.$_GET['telephone'].'</td>

                                
                            </tr>';
                                $content.='</table>
                    </td>
                </tr>
                <tr style="margin-top:px;">
                    <td>
                        <table style="margin-top:100px;width:100%;margin-left:15px;cellspacing:0; cellpadding:0;border-spacing: 0; border-width: 0; padding: 0; border-width: 0;  border-collapse: collapse;">
                            <tr padding-top:px;style="border-style:solid;border-width:1px;border-color:#DCDAD9;background-color:#E5E5E5;height:40px;">
                            <th style="width:33%;margin-right:0px;height:20px;padding-top:10px;text-align:center">Produits</th>
                            <th style="width:33%;height:20px;padding-top:10px;text-align:center">Quantité</th>
                            <th style="width:33%;height:20px;padding-top:10px;text-align:center">Prix</th>

                            </tr>';
                            $req_insertion = $bdd->prepare('INSERT INTO bons_livraison(nom_BL,distributeur) VALUES(:nom_BL,:distributeur)');
                            $req_insertion->execute(array(
                                ':nom_BL' =>$chaine3,
                                ':distributeur' =>$_GET['nom'],                                     

                            ));

                                for($i=0;$i<$taille;$i++){
                                    /*
                                  $index = "produit".$i;
                                  $index2 = "qte".$i;

                                  $index3 = "prix_DV".$i; 
                                  $index4 = "prix_vente".$i; */
                                
                                  
                                
                                
                                                                       
   
                                     $content.='
                                <tr>
                                    <td  style="height:30px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;margin-right:-10px;padding-right:0px;text-align:center;padding-right:20px;">'.$tableau_produits[$i].'</td>
                                    <td  style="height:30px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$tableau_qte[$i].'</td> 
                                    <td  style="height:30px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$prix[$i].'</td>   
  
   
                                </tr>';
                                }
                                $content.='

                        </table>
                        


                    </td>
                </tr>
            </table>
        </div>
    </page>';

$facture = new Html2Pdf('P', 'A4', 'fr');

 
    
    $facture->writeHTML($content);
    $facture->output(__DIR__ .' /upload/'.$chaine3.'.pdf', 'F');

    $facture->output();

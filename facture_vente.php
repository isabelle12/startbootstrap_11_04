<?php
include('vendor2/autoload.php');
include('bdd.php');


use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
$date=date('d-m-Y');
   
$tableau_commande = $_GET['num_commande'];
$chaine_commande = explode(",",$tableau_commande);
   
$req_alerte = $bdd->prepare("SELECT date_alerte,produit,qte,date_commande FROM commandes WHERE numero_commande = '".$tableau_commande."'");
$req_alerte->execute(array());
$req_alerte = $req_alerte->fetchAll();
//echo $req_alerte['date_alerte'];
//var_dump($req_alerte);
foreach($req_alerte as $cellule){
    $tableau_produits[]=$cellule['produit'];
    $tableau_qte[]=$cellule['qte'];

}
$taille = count($tableau_produits);


    //var_dump($req_commande2);
    
$alerte = $req_alerte[0]['date_alerte'];
$stamp25 = strtotime($alerte);
$alerte2 = date('d-m-Y',$stamp25);
$date25= date('Y-m-d');
$stamp_date25 = strtotime($date25);
$delai_encaissement = 30*24*60*60;
$encaissement = $stamp_date25+ $delai_encaissement;
$encaissement2 = date('Y-m-d',$encaissement);
$encaissement = date('d-m-Y',$encaissement);

$date_commande = $req_alerte[0]['date_commande'];
$stamp25 = strtotime($date_commande);
$date_commande = date('d-m-Y',$stamp25);
    //var_dump($req_commande2);
    
$alerte = $_GET['alerte'];
$stamp25 = strtotime($alerte);
$alerte2 = date('Y-m-d',$stamp25);
$num_facture = $_GET['num_facture'];

$req_BL = $bdd->prepare("SELECT numero_facture FROM facture");
$req_BL->execute(array());
$req_BL = $req_BL->fetchAll();
//var_dump($req_BL);
if(empty($req_BL)){
    $nom_BL="facture".$date."-001";
}
else{

foreach($req_BL as $cellule){
    $scinder = explode("-",$cellule['numero_facture']);
    $tableau_dernier[] = (int)$scinder[3];
    }
    $max = max($tableau_dernier);
    $BL = $max+1;
    $chaine_BL = strval($BL);
    $longueur = strlen($chaine_BL);
    if($longueur == 1){
        $chaine_finale = "facture".$date."-00".$chaine_BL;
    }
    if($longueur == 2){
        $chaine_finale = "facture".$date."-0".$chaine_BL;
    }
    if($longueur == 3){
        $chaine_finale =  "facture".$date."-".$chaine_BL;
    }
    $nom_BL=$chaine_finale;

}
//echo gettype($chaine_BL);



$num_commande = $_GET['num_commande'];
$commande_num = trim($num_commande);
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
                                <td style=" width:40%">
                                Date de la facture : '.$date.'<br/>
                                Numéro de la facture : '.$_GET["num_facture"].'<br/>
                                Date de la commande : '.$date_commande.'<br/>
                                Numéro de commande : '.$tableau_commande.'<br/>
                                Date d\'échéance : '.$_GET['alerte'].'<br/>
                                Date limite d\'encaissement : ';
if($_GET['paye']=="paye"){
    $content.='facture payée';
}
if($_GET['paye']=="nonpaye"){
    $content.=$encaissement;
} 
$content.='<br/>
                                </td>

                                <td  style="width:30%"></td>
                                <td  style="width:30%">'.$_GET['nom'].'<br/>'.$_GET['enseigne'].'<br/>'.$_GET['adresse'].'<br/>'.$_GET['mail'].'<br/>'.$_GET['telephone'].'</td>

                                
                            </tr>';
                                $content.='

       
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;margin-left:15px;cellspacing:0; cellpadding:0;border-spacing: 0; border-width: 0; padding: 0; border-width: 0;  border-collapse: collapse;margin-top:40px;">
                            <tr padding-top:20px;style="border-style:solid;border-width:1px;border-color:#DCDAD9;background-color:#E5E5E5;height:40px;">
                                <th style="width:25%;margin-right:0px;height:20px;padding-top:10px;text-align:center">Produits</th>
                                <th style="width:25%;height:20px;padding-top:10px;text-align:center">Quantité</th>
                                <th style="width:25%;height:20px;padding-top:10px;text-align:center">Prix</th>
                                <th style="width:25%;height:20px;padding-top:10px;text-align:center">Sous-total</th>


                            </tr>';

                                $somme = 0;
                                if($_GET['paye']=="paye"){
                                    $req_insertion = $bdd->prepare('INSERT INTO facture(numero_facture,numero_commande,date_commande,nom_distributeur,date_alerte,date_facture,paye_nonpaye) VALUES(:numero_facture,:num_commande,:date_commande,:nom,:date_alerte,:date_facture,:paye_nonpaye)');
                                    $req_insertion->execute(array(
                                        ':numero_facture' =>$nom_BL,
                                        ':num_commande' =>$_GET['num_commande'],
                                        ':date_commande' =>$date25,
                                        ':nom' =>$_GET['nom'],
                                        ':date_alerte' =>$alerte2,
                                        ':date_facture' =>date('Y-m-d'),
                                        ':paye_nonpaye' =>"paye",  
                                    ));
                                  }
                                 /* if($_GET['paye']=="paye"){
                                    $req_insertion = $bdd->prepare('INSERT INTO facture(numero_facture,numero_commande) VALUES(:numero_facture,:num_commande)');
                                    $req_insertion->execute(array(
                                        ':numero_facture' =>$nom_BL,
                                        ':num_commande' =>$_GET['num_commande'],

                                    ));

                                    }*/

                                if($_GET['paye']=="nonpaye"){
                                    $req_insertion = $bdd->prepare('INSERT INTO facture(numero_facture,numero_commande,date_commande,nom_distributeur,date_alerte,date_facture,paye_nonpaye,date_limite_encaissement) VALUES(:numero_facture,:num_commande,:date_commande,:nom,:date_alerte,:date_facture,:paye_nonpaye,:encaissement)');
                                    $req_insertion->execute(array(
                                        ':numero_facture' =>$nom_BL,
                                        ':num_commande' =>$_GET['num_commande'],
                                        ':date_commande' =>$date25,
                                        ':nom' =>$_GET['nom'],
                                        ':date_alerte' =>$alerte2,
                                        ':date_facture' =>date('Y-m-d'),
                                        ':paye_nonpaye' =>"non paye",  
                                        ':encaissement' =>$encaissement2,  
                                    ));
                                }

                                for($i=0;$i<$_GET['taille'];$i++){
                                  $index = "produit".$i;
                                  $index2 = "qte".$i;

                                  $index3 = "prix_DV".$i; 
                                  $index4 = "prix_vente".$i; 
                                  $produit_operation = (int)$_GET[$index3]*(int)$_GET[$index2];
                                  $somme += (int)$produit_operation;                          
   
                                     $content.='
                                <tr>
                                    <td  style="height:30px;width:25%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;margin-right:-10px;padding-right:0px;text-align:center;padding-right:20px;">'.$_GET[$index].'</td>
                                    <td  style="height:30px;width:25%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$_GET[$index2].'</td>   
                                    <td  style="height:30px;width:25%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$_GET[$index4].'</td>   
                                    <td  style="height:30px;width:25%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$produit_operation.'</td>   

   
                                </tr>';
                                }
                                $content.='

                        </table>
                        <table style="width:100%;margin-top:350px;">
                        <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        </tr>

                            <tr >
                                <td style="width:30%;"></td>
                                <td style="width:50%;"></td>';
                                $TVA = ($somme*20)/100;
                                
(int)$TVA;
                                
                                $somme2=$somme+(int)$TVA;

                                $content.= 
                                '<td style="padding-top:20px;height:30px;width:20%;background-color:#E5E5E5;padding-left:10px;" >Total HT     <span style="margin-left:40px;">'.$somme.'€</span><br/>TVA(20%)<span style="margin-left:20px;">'.$TVA.' €</span><br/><span style="font-weight:bold;">Total TTC </span><span style="margin-left:30px;font-weight:bold;">'.$somme2.'€</span> 
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </div>
    </page>';

$facture = new Html2Pdf('P', 'A4', 'fr');

 
    
    $facture->writeHTML($content);
    $facture->output(__DIR__ .' /upload/'.$nom_BL.'.pdf', 'F');

    $facture->output();

<?php
include('vendor2/autoload.php');
include('bdd.php');


use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
$date=date('d-m-Y');
   
$tableau_commande = $_GET['num_commande'];
$chaine_commande = explode(",",$tableau_commande);
   
$req_alerte = $bdd->prepare("SELECT date_alerte,produit,qte,date_commande,prix_vente FROM commandes WHERE numero_commande = '".$tableau_commande."'");
$req_alerte->execute(array());
$req_alerte = $req_alerte->fetchAll();
//echo $req_alerte['date_alerte'];
//var_dump($req_alerte);
foreach($req_alerte as $cellule){
    $tableau_produits[]=$cellule['produit'];
    $tableau_qte[]=$cellule['qte'];
    $tableau_prix_vente[]=$cellule['prix_vente'];
    //echo $cellule['prix_vente'];

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
$date_commande2 = date('d-m-Y',$stamp25);
    //var_dump($req_commande2);
    
//$alerte = $_GET['alerte'];
$stamp25 = strtotime($alerte);
$num_facture = $_GET['num_facture'];

$req_BL = $bdd->prepare("SELECT numero_facture FROM facture");
$req_BL->execute(array());
$req_BL = $req_BL->fetchAll();
//var_dump($req_BL);
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
    $chaine_finale = "facture".$date."-".$chaine_BL;
}
//echo gettype($chaine_BL);

if(empty($req_BL)){
    $nom_BL="facture".$date."-001";
}
else{
    $nom_BL=$chaine_finale;
}

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
                        <table style="width:100%;  cellspacing:0; cellpadding:0;margin-top:100px;margin-bottom:120pxpx;">
                            <tr>
                                <td style=" width:40%">
                                Date de la facture : '.$date.'<br/>
                                Numéro de la facture : '.$nom_BL.'<br/>
                                Date de la commande : '.$date_commande2.'<br/>
                                Numéro de commande : '.$tableau_commande.'<br/>
                                Date alerte : '.$alerte2.'<br/>';
                                if($_GET['paye']=="paye"){
                                    $content.= 'Date limite d\'encaissement : facture payée<br/>';

                                }
                                if($_GET['paye']=="nonpaye"){
                                    $content.= 'Date limite d\'encaissement : '.$encaissement.'<br/>';

                                }
                                $content.='
                                
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
                        <table style="margin-top:60px;width:100%;margin-left:15px;cellspacing:0; cellpadding:0;border-spacing: 0; border-width: 0; padding: 0; border-width: 0;  border-collapse: collapse;">
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
                                        ':date_commande' =>$date_commande,
                                        ':nom' =>$_GET['nom'],
                                        ':date_alerte' =>$alerte,
                                        ':date_facture' =>date("Y,m,d"),
                                        ':paye_nonpaye' =>"paye",  

                                        
                                    ));
                                  }
                                
                                  if($_GET['paye']=="nonpaye"){
                                    $req_insertion = $bdd->prepare('INSERT INTO facture(numero_facture,numero_commande,date_commande,nom_distributeur,date_alerte,date_facture,paye_nonpaye,date_limite_encaissement) VALUES(:numero_facture,:num_commande,:date_commande,:nom_distributeur,:date_alerte,:date_facture,:paye_nonpaye,:encaissement)');
                                    $req_insertion->execute(array(
                                        
                                            ':numero_facture' =>$nom_BL,
                                            ':num_commande' =>$_GET['num_commande'],
                                            ':date_commande' =>$date_commande,
                                            ':nom_distributeur' =>$_GET['nom'],
                                            ':date_alerte' =>$alerte,
                                            ':date_facture' =>date("Y,m,d"),
                                            ':paye_nonpaye' =>"nonpaye",  
                                            ':encaissement' =>$encaissement2, 

                                        ));
                                    }
                                  

                                for($i=0;$i<$taille;$i++){
                                  
                                  $produit_operation = (int)$tableau_prix_vente[$i]*(int)$tableau_qte[$i];
                                  $somme += (int)$produit_operation;
                                                                       
                                  $content.='
                                                                 <tr>
                                                                      <td  style="height:30px;width:25%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;margin-right:-10px;padding-right:0px;text-align:center;padding-right:20px;">'.$tableau_produits[$i].'</td>
                                                                      <td  style="height:30px;width:25%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$tableau_qte[$i].'</td>   
                                                                      <td  style="height:30px;width:25%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$tableau_prix_vente[$i].'</td>   
                                                                      <td  style="height:30px;width:25%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">'.$produit_operation.'</td>   
                                  
                                     
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

$facture = new Html2Pdf('P', 'A4', 'fr');

 
    
    $facture->writeHTML($content);
    $facture->output(__DIR__ .' /upload/'.$nom_BL.'.pdf', 'F');

    $facture->output();

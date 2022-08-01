<?php
include('vendor2/autoload.php');
include('bdd.php');


use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
$date=date('d-m-Y');
   
$tableau_commande = $_GET['num_commande'];
$chaine_commande = explode(",",$tableau_commande);
   

    //var_dump($req_commande2);
    
$alerte = $_GET['alerte'];
$stamp25 = strtotime($alerte);
$alerte2 = date('Y-m-d',$stamp25);
$date25= date('Y-m-d');
$num_facture = $_GET['num_facture'];

$req_BL = $bdd->prepare("SELECT numero_commande FROM commandes");
$req_BL->execute(array());
$req_BL = $req_BL->fetchAll();
//var_dump($req_BL);

//echo gettype($chaine_BL);

if(empty($req_BL)){
    $nom_BL="BC".$date."-0001";
}
else{
    foreach($req_BL as $cellule){
        //echo $cellule['numero_commande'];
        $scinder = explode("-",$cellule['numero_commande']);
        //var_dump($scinder);
        
        $tableau_dernier[] = (int)$scinder[3];
    }
    $max = max($tableau_dernier);
    $BL = $max+1;
    $chaine_BL = strval($BL);
    $longueur = strlen($chaine_BL);
    if($longueur == 1){
        $chaine_finale = "BC".$date."-000".$chaine_BL;
    }
    if($longueur == 2){
        $chaine_finale = "BC".$date."-00".$chaine_BL;
    }
    if($longueur == 3){
        $chaine_finale = "BC".$date."-0".$chaine_BL;
    }
    if($longueur == 4){
        $chaine_finale = "BC".$date.$chaine_BL;
    }
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
                                <td style=" width:40%">
                                Date de la commande : '.$date.'<br/>
                                Numéro de commande : '.$nom_BL.'<br/>
                                Date d\'échéance : '.$_GET['alerte'].'<br/></td>
                                <td  style="width:30%"></td>

                                <td  style="width:30%">'.$_GET['nom'].'<br/>'.$_GET['enseigne'].'<br/>'.$_GET['adresse'].'<br/>'.$_GET['mail'].'<br/>'.$_GET['telephone'].'</td>

                            </tr>';
                                $content.='

       
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;margin-left:15px;cellspacing:0; cellpadding:0;border-spacing: 0; border-width: 0; padding: 0; border-width: 0;  border-collapse: collapse;">
                            <tr padding-top:20px;style="border-style:solid;border-width:1px;border-color:#DCDAD9;background-color:#E5E5E5;height:40px;">
                                <th style="width:33%;margin-right:0px;height:20px;padding-top:10px;text-align:center">Produits</th>
                                <th style="width:33%;height:20px;padding-top:10px;text-align:center">Quantité</th>
                                <th style="width:33%;height:20px;padding-top:10px;text-align:center">Prix</th>


                            </tr>';

                                $chemin = "upload/".$nom_BL.".pdf";
                                for($i=0;$i<$_GET['taille'];$i++){
                                  $index = "produit".$i;
                                  $index2 = "qte".$i;

                                  $index3 = "prix_DV".$i; 
                                  $index4 = "prix_vente".$i; 

                                if(isset($_GET[$index3])){
                                  $req_insertion = $bdd->prepare('INSERT INTO commandes(numero_commande,date_commande,nom_distributeur,date_alerte,produit,qte,prix_DV,chemin_pdf) VALUES(:num_commande,:date_commande,:nom,:date_alerte,:produit,:qte,:prix,:chemin_pdf)');
                                  $req_insertion->execute(array(
                                      ':num_commande' =>$nom_BL,
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
                                        ':num_commande' =>$nom_BL,
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
                                    <td  style="height:30px;width:30%;padding-top:10px;border-style:solid;border-width:1px;border-color:#DCDAD9;padding-left:50px;text-align:center;padding-right:20px;">';
                                    if(isset($_GET[$index3])){
                                        $content.=$_GET[$index3];
                                    }
                                    if(isset($_GET[$index4])){
                                        $content.=$_GET[$index4];

                                    }
                                    $content.='</td>   

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
                                <img width="200" src="'.$_GET['file'].'" />

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

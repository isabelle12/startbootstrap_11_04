<?php
session_start();

include('header2.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

//$link = $identifiant;

// Méthode de chiffrement
$ciphering = "AES-128-CTR";

// Utilisation de openssl comme méthode de cryptage
$iv_length = openssl_cipher_iv_length($ciphering);
$options   = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Store the encryption key
$encryption_key = "TestMail";

// Utilisez la fonction openssl_encrypt() pour crypter les données.
//$encryption = openssl_encrypt($link, $ciphering,
                              //$encryption_key, $options, $encryption_iv);

// Afficher le string cryptée
//echo "Encrypted String: " . $encryption . "\n";

// Vecteur d'initialisation non NULL pour le décryptag
$decryption_iv = '1234567891011121';

// Stocker la clé de décryptage
$decryption_key = "TestMail";

// Utilisez la fonction openssl_decrypt() pour décrypter les données.
//$decryption = openssl_decrypt($encryption, $ciphering,
                              //$decryption_key, $options, $decryption_iv);

//$string_to_encrypt = $link;
$frompost = "Planification Azur Connect";
$objet = 'RDV SFR BUSINESS :';
$password          = "test";
//$encrypted_string  = openssl_encrypt($string_to_encrypt, "AES-128-ECB", $password);
//$decrypted_string  = openssl_decrypt($encrypted_string, "AES-128-ECB", $password);

// Afficher le string décryptée
//echo "Decrypted String: " . $decryption;

$url = "https://suivi.complus13.fr/calendar.php?id=";

$mail_rappel = 'sensodiffusion';


try {
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Host     = 'ssl0.ovh.net';                    //Adresse IP ou DNS du serveur SMTP
    $mail->Port     = 465;                               //Port TCP du serveur SMTP
    $mail->SMTPAuth = true;                             //Utiliser l'identification
    //$mail = urldecode($_GET['email']);

    $mail->SMTPSecure = 'ssl';                          //Protocole de sécurisation des échanges avec le SMTP
    $mail->Username   = 's.marciano@complus13.fr';      //Adresse email à utiliser
    $mail->Password   = 'Deathart02';
    $pseudo           = $frompost;
    //$mailplanif = 'storm@complus13.fr';               //Mot de passe de l'adresse email à utiliser

    $mail->CharSet = 'UTF-8';                           //Format d'encodage à utiliser pour les caractères
    $mail->SetFrom('activite@complus13.fr', $pseudo);    //L'alias à afficher pour l'envoi
    $mail->addAddress('rozeisabelle8@gmail.com');
    //$mail->addCC('activite@complus13.fr');
    $mail->DKIM_domain = 'complus13.fr';
    $mail->DKIM_private = '/var/dkim/dkim.private.pem';
    $mail->DKIM_selector = '1639145461.complus13';
    $mail->DKIM_passphrase = '';
    $mail->DKIM_identity = $mail->SetFrom('activite@complus13.fr', 'complus13');

    //$num_commande = $_GET['num_facture'];
    //echo $num_commande;
    //$mail->addAttachment('upload/'.$num_commande.'.pdf');         // Pièces jointes en gardant le nom du serveur
    $mail->addAttachment('upload/'.$_GET['file'].'.pdf');         // Pièces jointes en gardant le nom du serveur


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Bon de livraison numéro '.$_GET['file'];
    $mail->Body    = $mail_rappel;
    $mail->AltBody = $mail_rappel;

    $mail->send();
    //echo "Success";
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

                                    <div class="col-lg- offset-lg-1">
                                        <br /><br />
                                        <div id="sig"></div>
                                        Votre bon de livraison au format PDF a bien été envoyé par mail au client    
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
    

    <?php
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //encrypt_url();
}
?>

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


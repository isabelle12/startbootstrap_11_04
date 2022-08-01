<?php

include_once('header.php');
        //echo $idcommande;
        //echo $token;
        
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <form action="" method="post">
            <h1 class="h3 mb-4 text-gray-800">


            </h1>
            <!----------------------------------------------------------------------------------------->
            
           
            <!----------------------------------------------------------------------------------------------------->

            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Commentaire Technicien : </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        <textarea class="form-control" id="commentairetechnicien" name="commentairetechnicien" rows="3" required></textarea>
                                        <br /><br />
                                        <div id="sig"></div>
                                        <button id="clear" class="btn btn-secondary">Effacer</button>
                                        <textarea id="signature64" name="signed" style="display: none" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Commentaire Client :</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        <textarea class="form-control" id="commentaireclient" name="commentaireclient" rows="3" required></textarea>
                                        <br /><br />
                                        <div id="sig2"></div>
                                        <button id="clear2" class="btn btn-secondary">Effacer</button>
                                        <textarea id="signature642" name="signed2" style="display:none" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="resultatInari"></div>
                <?php
                ?>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="clotureInariButtonIMES">Cloturer l'intervention sur INARI</button>
                <?php
                
                ?>
                <button type="submit" id="cloturecri" class="btn btn-success btn-lg btn-block">Cloturer l'intervention</button>
            </div>
        </form>

        <?php
        for ($i = 0; $i < 5; $i++) {
        ?>
            <div class="modal fade" id="inforouteur-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="inforouteur-<?php echo $i; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inforouteur-<?php echo $i; ?>">Validation Routeur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <div id="resultat8"></div>
                                    Routeur posé ? : <span class="routeur-pose-<?php echo $i; ?>"></span><br />
                                    Numéro de série choisi : <span class="sn-choisi-<?php echo $i; ?>"></span><br />
                                    <select class="form-control validation-routeur-<?php echo $i; ?>">
                                        <option value=""></option>

                                    </select>
                                    <br />
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary valide-routeur-<?php echo $i; ?>" id="valide-routeur-<?php echo $i; ?>">Valider le resultat</button>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- /.container-fluid -->

    </div>



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.signature.min.js"></script>
<script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script>

<script>
    var sig = $('#sig').signature({
        syncField: '#signature64',
        syncFormat: 'JPEG'
    });
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });

    var sig2 = $('#sig2').signature({
        syncField: '#signature642',
        syncFormat: 'JPEG'
    });
    $('#clear2').click(function(e) {
        e.preventDefault();
        sig2.signature('clear');
        $("#signature642").val('');
    });
</script>
<?php
    $folderPath = "upload/";
    echo $_POST['signed'];
    $image_parts = explode(";base64,", $_POST['signed']);
    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);
    $file = $folderPath . uniqid() . '.'.$image_type;
    file_put_contents($file, $image_base64);


include_once('footer.php');

?>
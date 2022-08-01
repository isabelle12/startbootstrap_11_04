<?php
    include('../bdd.php');

    $distributeur = (string)trim($_POST['stocks_SN']);
    //ds l'input
    $req2 = $bdd->prepare("SELECT * FROM distributeurs WHERE nom LIKE :distributeur LIMIT 8");

    $req2->execute(array(
        'distributeur' => "$distributeur%",

    ));
    $res2 = $req2->fetchAll();

    
    $i=0;

    foreach($res2 as $y) {
        //echo $y['adresse'];
    ?><ul>
            <li style=" color: black; font-size: small; font-weight: bold;list-style-type: none; margin-left: -13% ">
            <a id="btn<?php echo $i; ?>" adresse="<?php echo $y['adresse']; ?>" telephone="<?php echo $y['telephone']; ?>" nom="<?php echo $y['nom']; ?>" mail="<?php echo $y['mail']; ?>" enseigne="<?php echo $y['enseigne']; ?>" siret="<?php echo $y['siret']; ?>" details="<?php echo $y['details_adresse']; ?>" class="lien" href="DV_facture4.php?prix=DV&nom=<?php echo $y['nom'];?>&adresse=<?php echo $y['adresse'];?>&telephone=<?php echo $y['telephone'];?>&mail=<?php echo $y['mail'];?>"><?= $y['nom'] ?><br> <?= $y['adresse'] ?> - <?= $y['telephone'] ?></a>
            </li>
        </ul>
        <?php
        $i+=1;
    }

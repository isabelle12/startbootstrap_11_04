<?php
    include('../bdd.php');

    $distributeur = (string)trim($_POST['stocks_SN']);
    //ds l'input
    $req2 = $bdd->prepare("SELECT * FROM distributeurs WHERE nom LIKE :distributeur LIMIT 8");

    $req2->execute(array(
        'distributeur' => "%$distributeur%",

    ));
    $res2 = $req2->fetchAll();

    foreach($res2 as $y) {
    }
    $i=0;

    foreach($res2 as $y) {
    ?><ul>
            <li style=" color: black; font-size: small; font-weight: bold;list-style-type: none; margin-left: -13% ">
                <a id="btn<?php echo $i; ?>" adresse="<?php echo $y['adresse']; ?>" telephone="<?php echo $y['telephone']; ?>" nom="<?php echo $y['nom']; ?>" mail="<?php echo $y['mail']; ?>" enseigne="<?php echo $y['enseigne']; ?>" class="lien" href="vente_BL.php"><?= $y['nom'] ?><br> <?= $y['adresse'] ?> - <?= $y['telephone'] ?></a>
            </li>
        </ul>
        <?php
        $i+=1;
    }


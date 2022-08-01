<?php
    include('../bdd.php');

    $distributeur = (string)trim($_POST['stocks_SN']);
    //ds l'input
    /*$un= $distributeur[0];
    echo count($distributeur);*/

    $req2 = $bdd->prepare("SELECT * FROM distributeurs WHERE nom LIKE :distributeur LIMIT 8");

    $req2->execute(array(
        'distributeur' => "$distributeur%",

    ));
    $res2 = $req2->fetchAll();

    foreach($res2 as $y) {
    }
    $i=0;

    //var_dump($res2);

    foreach($res2 as $y) {
    ?><ul>
        <li style=" color: black; font-size: small; font-weight: bold;list-style-type: none; margin-left: -13% ">
            <a href="un_distributeur2.php?id=<?php echo $y['id']; ?>&nom=<?= $y['nom'] ?>"><?= $y['nom'] ?><br> <?= $y['adresse'] ?> - <?= $y['telephone'] ?></a>
        </li>
    </ul>
    <?php
        $i+=1;
    }


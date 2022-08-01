<?php
session_start();
include('../bdd.php');
$categorie = $_POST['categorie'];
$_SESSION['categorie'] = $categorie;
//echo $categorie;
/*echo "parfum";
echo $_POST['volume'];

echo $_POST['parfum'];
echo "parfum";
echo "kikou";*/


$volume = $_POST['volume'];
$parfum = $_POST['parfum'];

$req_manque = $bdd->prepare("SELECT * FROM manque_champs WHERE id_categorie='".$categorie."'");
$req_manque->execute(array());
/*$listresult = $req_manque->fetchAll();
var_dump($listresult);*/
while($listresult_manque = $req_manque->fetch()){
    $tableau[] = $listresult_manque['contenance_absent'];
    $tableau[] = $listresult_manque['parfum_absent'];
}
    if($tableau[0]==1 AND $tableau[1]==1){
        if($_POST['volume']=="vide" AND $_POST['parfum']=="vide"){
            //echo "deux";

            $req = $bdd->prepare("SELECT categories.nom,articles_id.prix_vente,articles_id.prix_au_DV,articles_id.quantite AS nbre_quantite,articles_id.img,volumes.quantite AS volume_quantite,articles_id.id AS id_article,parfums.nom_parfum FROM articles_id INNER JOIN categories  ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id = articles_id.id_volume INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE id_categorie = '".$categorie."'");

            $req->execute(array());
            /*$listresult = $req->fetchAll();
            var_dump($listresult);*/
            
            $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>prix de vente</th><th>prix au DV</th></tr>";

            while($listresult = $req->fetch()){
                
                $image = $listresult['img']; 
                //echo $listresult['volume_quantite'];
                
                $html3 .="<tr><td class='modif'><a href='modif2.php?id=".$listresult['id_article']."&volume=".$listresult['volume_quantite']."&parfum=".$listresult['nom_parfum']."&qte=".$listresult['nbre_quantite']."&image=".$listresult['img']."&id_categorie=".$categorie."'>".$listresult['nom']."</a></td><td>".$listresult['volume_quantite']."</td><td>".$listresult['nom_parfum']."</td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";

                //$html3 .= "<tr><td>".$listresult["id_article"]."</td><td>".$listresult["nom"]."</td><td><img style='width:200px;' src='".$image."' /></td></tr>";
                //$html3 .="<tr><td>kikou</td><td>kikou</td></tr>";
            } 
            //$html3.= "</table>";
            $html3.="</table>";
            //echo $html3;
            //$html3="kikou";
            $data = array(
                'categorie_html' => $html3
            );
            echo json_encode($data);
        }
        //cas où volume et pas parfum : 
        if($_POST['volume']!="vide" AND $_POST['parfum']=="vide"){
            $req = $bdd->prepare("SELECT categories.nom,articles_id.prix_vente,articles_id.prix_au_DV,articles_id.quantite AS nbre_quantite,articles_id.img,volumes.quantite AS volume_quantite,articles_id.id AS id_article,parfums.nom_parfum FROM articles_id INNER JOIN categories  ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id = articles_id.id_volume INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE id_categorie = '".$categorie."' AND articles_id.id_volume = '".$volume."'");
            $req->execute(array());
            /*$listresult = $req->fetchAll();
            var_dump($listresult);*/
            $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>prix de vente</th><th>prix au DV</th></tr>";
            while($listresult = $req->fetch()){
                //echo $listresult["nom"];
                $image = $listresult['img'];
                
                $html3 .="<tr><td><a href='./modif2.php?id=".$listresult['id_article']."&id_categorie=".$categorie."'>".$listresult["nom"]."</a></td><td>".$listresult['volume_quantite']."</td><td>".$listresult['nom_parfum']."</td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";

                //$html3 .= "<tr><td>".$listresult["id_article"]."</td><td>".$listresult["nom"]."</td><td><img style='width:200px;' src='".$image."' /></td></tr>";
                //$html3 .="<tr><td>kikou</td><td>kikou</td></tr>";
            } 
            $html3.="</table>";
            $data = array(
                'categorie_html' => $html3
            );
            echo json_encode($data);

        }
        //cas où volume vide et parfum :
        if($_POST['volume']=="vide" AND $_POST['parfum']!="vide"){
            
            //$req = $bdd->prepare("SELECT categories.nom,articles_id.quantite AS nbre_quantite,articles_id.img,volumes.quantite AS volume_quantite,articles_id.id AS id_article,parfums.nom_parfum FROM articles_id INNER JOIN categories  ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id = articles_id.id_volume INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE id_categorie = '".$categorie."' AND articles_id.id_parfum='".$parfum);
            $req = $bdd->prepare("SELECT articles_id.prix_vente,articles_id.prix_au_DV,articles_id.quantite AS nbre_quantite,articles_id.img,categories.nom,parfums.nom_parfum, volumes.quantite AS volume_quantite FROM articles_id INNER JOIN categories ON categories.id = articles_id.id_categorie INNER JOIN volumes ON volumes.id = articles_id.id_volume INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE articles_id.id_categorie = '".$categorie."' AND articles_id.id_parfum = '".$parfum."'" );

            $req->execute(array());
            /*$listresult = $req->fetchAll();
            var_dump($listresult);*/
            $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>prix de vente</th><th>prix au DV</th></tr>";
            while($listresult = $req->fetch()){
                echo $listresult['volume_quantite'];
                $image = $listresult['img'];
                
                
                $html3 .="<tr><td>".$listresult["nom"]."</td><td>".$listresult['volume_quantite']."</td><td>".$listresult['nom_parfum']."</td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";

                //$html3 .= "<tr><td>".$listresult["id_article"]."</td><td>".$listresult["nom"]."</td><td><img style='width:200px;' src='".$image."' /></td></tr>";
                //$html3 .="<tr><td>kikou</td><td>kikou</td></tr>";
            }
            $html3.="</table>";
            $data = array(
                'categorie_html' => $html3
            );
            echo json_encode($data);
        }
        if($_POST['volume']!="vide" AND $_POST['parfum']!="vide"){
            /*echo $parfum;
            echo "entre";
            echo $volume;*/
            $req = $bdd->prepare("SELECT articles_id.id AS id_article,categories.nom,articles_id.prix_vente,articles_id.prix_au_DV,articles_id.img,volumes.quantite AS volume_quantite,parfums.nom_parfum,articles_id.quantite AS nbre_quantite FROM categories INNER JOIN articles_id ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id = articles_id.id_volume INNER JOIN parfums ON parfums.id = articles_id.id_parfum WHERE articles_id.id_categorie = '".$categorie."' AND articles_id.id_parfum = '".$parfum."' AND articles_id.id_volume = '".$volume."'" );
            
            $req->execute(array());
            //var_dump($req);
            /*$listresult = $req->fetchAll();
            var_dump($listresult);*/
            //echo $volume;
            $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>prix de vente</th><th>prix au DV</th></tr>";
            while($listresult = $req->fetch()){
                //echo $listresult['volume_quantite'];
                $image = $listresult['img']; 
                //echo $listresult['nom_parfum'];
                //echo $listresult['volume_quantite'];
                
                $html3 .="<tr><td><a href='./modif2.php?id=".$listresult['id_article']."&id_categorie=".$categorie."'>".$listresult['nom']."</td><td>".$listresult['volume_quantite']."</td><td>".$listresult['nom_parfum']."</td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";

                //$html3 .= "<tr><td>".$listresult["id_article"]."</td><td>".$listresult["nom"]."</td><td><img style='width:200px;' src='".$image."' /></td></tr>";
            }
            $html3.="</table>";
            $data = array(
                'categorie_html' => $html3
            );
            echo json_encode($data);
        }
    }
    


    if($tableau[0]==1 AND $tableau[1]==0){
        if($_POST['volume']=="vide" AND $_POST['parfum']=="vide"){

            $req = $bdd->prepare("SELECT categories.nom,articles_id.prix_vente,articles_id.prix_au_DV,articles_id.quantite AS nbre_quantite,articles_id.img,volumes.quantite AS volume_quantite,articles_id.id AS id_article FROM articles_id INNER JOIN categories  ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id = articles_id.id_volume WHERE id_categorie = '".$categorie."'");

            $req->execute(array());
            /*$listresult = $req->fetchAll();
            var_dump($listresult);*/
            $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>prix de vente</th><th>prix au DV</th></tr>";

            while($listresult = $req->fetch()){
                
                $image = $listresult['img']; 
                //echo $listresult['nbre_quantite'];
                
                $html3 .="<tr><td>".$listresult["nom"]."</td><td>".$listresult['volume_quantite']."</td><td></td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";

                //$html3 .= "<tr><td>".$listresult["id_article"]."</td><td>".$listresult["nom"]."</td><td><img style='width:200px;' src='".$image."' /></td></tr>";
                //$html3 .="<tr><td>kikou</td><td>kikou</td></tr>";
            } 
            //$html3.= "</table>";
            $html3.="</table>";

            $data = array(
                'categorie_html' => $html3
            );
            echo json_encode($data);
        }
        if($_POST['volume']!="vide" AND $_POST['parfum']=="vide"){
            $req = $bdd->prepare("SELECT articles_id.prix_vente,articles_id.prix_au_DV,categories.nom,articles_id.quantite AS nbre_quantite,articles_id.img,volumes.quantite AS volume_quantite,articles_id.id AS id_article FROM articles_id INNER JOIN categories  ON articles_id.id_categorie = categories.id INNER JOIN volumes ON volumes.id = articles_id.id_volume WHERE id_categorie = '".$categorie."' AND articles_id.id_volume = '".$volume."'");

            $req->execute(array());
            /*$listresult = $req->fetchAll();
            var_dump($listresult);*/
            $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>prix de vente</th><th>prix au DV</th></tr>";

            while($listresult = $req->fetch()){
                
                $image = $listresult['img']; 
                //echo $listresult['nbre_quantite'];
                
                $html3 .="<tr><td>".$listresult["nom"]."</td><td>".$listresult['volume_quantite']."</td><td></td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";

                //$html3 .= "<tr><td>".$listresult["id_article"]."</td><td>".$listresult["nom"]."</td><td><img style='width:200px;' src='".$image."' /></td></tr>";
                //$html3 .="<tr><td>kikou</td><td>kikou</td></tr>";
            } 
            //$html3.= "</table>";
            $html3.="</table>";

            $data = array(
                'categorie_html' => $html3
            );
            echo json_encode($data);
        }

    }
    if($tableau[0]==0 AND $tableau[1]==0){

        $req = $bdd->prepare("SELECT articles_id.prix_vente,articles_id.prix_au_DV,categories.nom,articles_id.quantite AS nbre_quantite,articles_id.img,articles_id.id AS id_article FROM articles_id INNER JOIN categories  ON articles_id.id_categorie = categories.id WHERE id_categorie = '".$categorie."'");

        $req->execute(array());
        /*$listresult = $req->fetchAll();
        var_dump($listresult);*/
        $html3 = "<table class='table table-bordered' style='background-color:white'><tr><th>Gamme</th><th>Contenance</th><th>Parfum</th><th>Quantité</th><th>Image</th><th>prix de vente</th><th>prix au DV</th></tr>";

        while($listresult = $req->fetch()){
            
            $image = $listresult['img']; 
            //echo $listresult['nbre_quantite'];
            
            $html3 .="<tr><td>".$listresult["nom"]."</td><td></td><td></td><td>".$listresult['nbre_quantite']."</td><td><img style='width:200px;' src='".$image."' /></td><td>".$listresult['prix_vente']."</td><td>".$listresult['prix_au_DV']."</td></tr>";

            //$html3 .= "<tr><td>".$listresult["id_article"]."</td><td>".$listresult["nom"]."</td><td><img style='width:200px;' src='".$image."' /></td></tr>";
            //$html3 .="<tr><td>kikou</td><td>kikou</td></tr>";
        } 
        //$html3.= "</table>";
        $html3.="</table>";

        $data = array(
            'categorie_html' => $html3
        );
        echo json_encode($data);

    }




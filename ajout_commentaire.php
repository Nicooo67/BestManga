<?php

// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;

// Convertit l'identifiant en entier
$id = intval($id);

include('include/connexion.php');
include('include/insert.php');
 
$pdo = connexion();

$date= date("m.d.y");
//var_dump($_POST);
$commentaire = [
  'id' => verif($_POST['id']),
  // 'id_com' => null,
  'pseudo' => verif($_POST['pseudo']),
  'date' => verif($date),
  'commentaire' => verif($_POST['commentaire']),
  'etoiles' => verif($_POST['etoiles']),
];



function verif($data){
    $data = strip_tags($data);
    return $data;
}
insert_commentaire($pdo, $commentaire);

header("Location: manga.php?id=$id");

exit;
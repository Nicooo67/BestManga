<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;

// Convertit l'identifiant en entier
$id = intval($id);

// Connexion à la base de données
include('include/connexion.php');
$pdo = connexion();

// Récupération des données : exemples
include('include/select.php');
$mangas = desc_manga($pdo, $id);
$avis = select_avis_id($pdo, $id);

$similaire = select_similaire($pdo, $id);


echo $twig->render('manga.twig', [
    'mangas' => $mangas,
    'avis' => $avis,
    'similaires' => $similaire
]);
?>
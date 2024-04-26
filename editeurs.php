<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;

// Convertit l'identifiant en entier


// Connexion à la base de données
include('include/connexion.php');
$pdo = connexion();

// Récupération des données : exemples
include('include/select.php');
$genres = select_genres_count($pdo);
$auteurs = select_auteurs_count($pdo);
$editeurs = select_editeurs($pdo);
$editeurs_select = select_mangas_by_editeurs($pdo, $id);

echo $twig->render('filtres.twig', [
    'genres' => $genres,
    'auteurs' => $auteurs,
    'editeurs' => $editeurs,
    'filtre' => $editeurs_select,
]);
?>
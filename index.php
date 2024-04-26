<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;
if (isset($_GET['aff'])) $aff = $_GET['aff']; else $aff = 'grille';

// Convertit l'identifiant en entier
$id = intval($id);

// Connexion à la base de données
include('include/connexion.php');
$pdo = connexion();

// Récupération des données : exemples
include('include/select.php');
$mangas = select_mangas($pdo);
$genres = select_genres_count($pdo);
$auteurs = select_auteurs_count($pdo);
$editeurs = select_editeurs($pdo);
$filtres = select_filtre($pdo, $_POST);


//$filtres = array();

// foreach($filtres as $mangas){
//     if(empty($filtres)){
//         array_push($filtres, $mangas);
//     }
//     else{
//         $bool = 0;
//         foreach($filtres as $editeur){
//             if ($casque['manga_editeur'] == $produit['manga_editeur'])
//             $bool = 1;
//         }
//         if($bool == 0){
//             array_push($filtres, $mangas);
//         }
//     }
    
// }

// Lancement du moteur Twig avec les données

echo $twig->render('accueil.twig', [
    'mangas' => $mangas,
    'genres' => $genres,
    'auteurs' => $auteurs,
    'editeurs' => $editeurs,
    'filtre' => $filtres,
    'affichage' => $aff,

]);

?>
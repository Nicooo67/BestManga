<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd%22%3E
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
    <title>Réception de données de formulaires</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body> 
    <div class="niv0" style="width:400px;height:500px;">
        <div class="niv1">Variables reçues par la méthode POST</div>
        <?php
        foreach ($_POST as $key => $value) {
            print("<div class='niv2'>$key</div>");
            print("<div class='niv3'>$value</div>");
        }
        ?>
    </div>
<?php


var_dump($_POST);
    if (isset($_POST['titre'])) $variable_php = $_POST['titre'];
    else $variable_php = '';

    $message = 'rien à déclarer';

    if (empty($variable_php)) $message = 'aucune valeur reçue';

    if (is_numeric($variable_php)) $message = 'nombre reçu';

    strip_tags($variable_php) . '</p>';



var_dump($_POST);
    if (isset($_POST['date_manga'])) $variable_php = $_POST['date_manga'];
    else $variable_php = '';

    $message = 'rien à déclarer';

    if (empty($variable_php)) $message = 'aucune valeur reçue';

    if (is_numeric($variable_php)) $message = 'nombre reçu';

    strip_tags($variable_php) . '</p>';

var_dump($_POST);
if (isset($_POST['editeur'])) $variable_php = $_POST['editeur'];
else $variable_php = '';

$message = 'rien à déclarer';

if (empty($variable_php)) $message = 'aucune valeur reçue';

if (is_numeric($variable_php)) $message = 'nombre reçu';

strip_tags($variable_php) . '</p>';
 
var_dump($_POST);
    if (isset($_POST['resume_manga'])) $variable_php = $_POST['resume_manga'];
    else $variable_php = '';

    $message = 'rien à déclarer';

    if (empty($variable_php)) $message = 'aucune valeur reçue';

    if (is_numeric($variable_php)) $message = 'nombre reçu';

    strip_tags($variable_php) . '</p>';

var_dump($_POST);
if (isset($_POST['origine'])) $variable_php = $_POST['origine'];
else $variable_php = '';

$message = 'rien à déclarer';

if (empty($variable_php)) $message = 'aucune valeur reçue';

if (is_numeric($variable_php)) $message = 'nombre reçu';

strip_tags($variable_php) . '</p>';

var_dump($_POST);
if (isset($_POST['statut'])) $variable_php = $_POST['statut'];
else $variable_php = '';

$message = 'rien à déclarer';

if (empty($variable_php)) $message = 'aucune valeur reçue';

if (is_numeric($variable_php)) $message = 'nombre reçu';

strip_tags($variable_php) . '</p>';

var_dump($_POST);
if (isset($_POST['tome'])) $variable_php = $_POST['tome'];
else $variable_php = '';

$message = 'rien à déclarer';

if (empty($variable_php)) $message = 'aucune valeur reçue';

if (is_numeric($variable_php)) $message = 'nombre reçu';

strip_tags($variable_php) . '</p>';

var_dump($_POST);
if (isset($_POST['prix'])) $variable_php = $_POST['prix'];
else $variable_php = '';

$message = 'rien à déclarer';

if (empty($variable_php)) $message = 'aucune valeur reçue';

if (is_numeric($variable_php)) $message = 'nombre reçu';

strip_tags($variable_php) . '</p>';


include('include/connexion.php');
$pdo = connexion();

$titre =  $_POST['titre'];
$date_manga = $_POST['date_manga'];
$editeur = $_POST['editeur'];
$resume_manga = $_POST['resume_manga'];
$origine = $_POST['origine'];
$statut = $_POST['statut'];
$tome = $_POST['tome'];
$prix = $_POST['prix'];

$sql = 'INSERT INTO mangas (manga_titre, manga_date, manga_editeur, manga_resume,
manga_origine, manga_statut, manga_nbr, manga_prix )
VALUES (:titre, :date_manga, :editeur, :resume_manga, :origine, :statut, :tome, :prix)';
 
// préparation de la requête
$query = $pdo->prepare($sql);

// assignation des valeurs aux paramètres
$query->bindValue(':titre',$titre, PDO::PARAM_STR);
$query->bindValue(':date_manga',$date_manga, PDO::PARAM_STR);
$query->bindValue(':editeur',$editeur, PDO::PARAM_STR);
$query->bindValue(':resume_manga',$resume_manga, PDO::PARAM_STR);
$query->bindValue(':origine',$origine, PDO::PARAM_STR);
$query->bindValue(':statut',$statut, PDO::PARAM_STR);
$query->bindValue(':tome',$tome, PDO::PARAM_STR);
$query->bindValue(':prix',$prix, PDO::PARAM_STR);
 
// exécution de la requête
$query->execute();
?>
</div>
</body>
</html>
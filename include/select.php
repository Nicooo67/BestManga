<?php

// Sélectionne toutes les lignes d'une table
function select_mangas($pdo)
{
  // construction de la requête
  $sql = 'SELECT * FROM mangas';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie le tableau
  return $tableau;
}

function select_genres_count($pdo)

{
  // construction de la requête
  $sql = 'SELECT *, COUNT(mangas.manga_id) as nombre
  FROM mangas
    JOIN apparaitre ON mangas.manga_id = apparaitre.manga_id
    JOIN genres ON apparaitre.genre_id = genres.genre_id
  Group BY genres.genre_id;';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie le tableau
  return $tableau;
}

function select_auteurs_count($pdo)
  {
    // construction de la requête
    $sql = 'SELECT auteurs.auteur_id, auteur_nom, COUNT(mangas.manga_id) as nombre
    FROM mangas
    INNER JOIN auteurs
        ON auteurs.auteur_id=mangas.auteur_id
    Group BY mangas.auteur_id;';
  
    // préparation et exécution de la requête
    $query = $pdo->prepare($sql);
    $query->execute();
  
    // vérification des erreurs
    if ($query->errorCode() == '00000') {
      // récupération des données dans un tableau
      $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
      $tableau = null;
    }
  // renvoie le tableau
  return $tableau;
}

function select_editeurs($pdo)
  {
    // construction de la requête
    $sql = 'SELECT *, COUNT(manga_editeur) as nombre FROM mangas
    GROUP BY manga_editeur';
  
    // préparation et exécution de la requête
    $query = $pdo->prepare($sql);
    $query->execute();
  
    // vérification des erreurs
    if ($query->errorCode() == '00000') {
      // récupération des données dans un tableau
      $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
      $tableau = null;
    }
  // renvoie le tableau
  return $tableau;
}

function select_avis($pdo)
  {
    // construction de la requête
    $sql = 'SELECT * FROM avis
    JOIN mangas ON mangas.manga_id = avis.manga_id';
  
    // préparation et exécution de la requête
    $query = $pdo->prepare($sql);
    $query->execute();
  
    // vérification des erreurs
    if ($query->errorCode() == '00000') {
      // récupération des données dans un tableau
      $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
      $tableau = null;
    }
  // renvoie le tableau
  return $tableau;
}

function select_avis_id($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT * FROM avis
  Join mangas ON mangas.manga_id = avis.manga_id WHERE avis.manga_id = :id';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_STR);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }
// renvoie le tableau
return $tableau;
}



function desc_manga($pdo, $id)
{
  // construction de la requête 
  $sql = 'SELECT * FROM mangas
  Join auteurs ON mangas.auteur_id = auteurs.auteur_id 
  WHERE manga_id = :id;';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_STR);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $ligne = $query->fetchall(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $ligne = null;
  }
  // renvoie le tableau
  return $ligne;
}

function select_similaire($pdo, $id)
{
  // construction de la requête 
  $sql = 'SELECT * FROM mangas
  JOIN similaire 
  ON mangas.manga_id = similaire.manga_id
  JOIN mangas AS mangas2 on similaire.manga_id_similaire = mangas2.manga_id
  WHERE mangas.manga_id = :id';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_STR);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $ligne = $query->fetchall(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $ligne = null;
  }
  // renvoie le tableau
  return $ligne;
}



function select_filtre($pdo, $post)
{
  // construction de la requête 
  $sql = 'SELECT * FROM mangas 
  JOIN auteurs ON mangas.auteur_id = auteurs.auteur_id
  JOIN apparaitre ON mangas.manga_id = apparaitre.manga_id
  JOIN genres ON apparaitre.genre_id = genres.genre_id
  WHERE mangas.manga_id > 0';

foreach($post as $key => $value) {
  if($key == 'genres'){
    $sql = $sql.' AND genres.genre_id='.$value;
  }
  if($key == 'auteurs'){
    $sql = $sql.' AND auteurs.auteur_id='.$value;
  }
  if($key == 'editeurs'){
    $sql = $sql.' AND manga_editeur="'.$value.'"';
  }
};

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $ligne = $query->fetchall(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $ligne = null;
  }
  // renvoie le tableau
  return $ligne;
}
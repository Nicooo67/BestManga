<?php

// fichier insert.php
 
function insert_commentaire($pdo, $commentaire)
{
  // construction et préparation de la requête
  $sql = 'INSERT INTO
  avis (pseudo_avis, commentaire_avis, etoiles_avis, date_avis, manga_id)
  VALUES (:pseudo, :commentaire, :etoiles, :date_com, :id);';
  echo '<p>Requête : ' . $sql . '</p>';
 
  $query = $pdo->prepare($sql);
 
  // assignation des valeurs à partir du tableau $auteur
  $query->bindValue(':pseudo', $commentaire['pseudo'], PDO::PARAM_STR);
  $query->bindValue(':commentaire', $commentaire['commentaire'], PDO::PARAM_STR);
  $query->bindValue(':date_com', $commentaire['date'], PDO::PARAM_STR);
  $query->bindValue(':id', $commentaire['id'], PDO::PARAM_STR);
  $query->bindValue(':etoiles', $commentaire['etoiles'], PDO::PARAM_STR);
    
  // exécution de la requête
  $query->execute();
}
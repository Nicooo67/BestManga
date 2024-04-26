<?php

// fichier delete.php
 
function delete_commentaire($pdo, $id) {
  // construction et préparation de la requête
  $sql = 'DELETE FROM avis WHERE avis_id = :id;';
  $query = $pdo->prepare($sql);
 
  // on utilise $isbn pour fixer la valeur de la clé
  $query->bindValue(':id', $id, PDO::PARAM_STR);
 
  // exécution de la requête
  $query->execute();
}
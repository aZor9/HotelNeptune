
<?php
  include('database.php');

  $query = getDB()->query("SELECT * FROM room ORDER BY prix ASC");
  $rooms = $query->fetchAll(PDO::FETCH_ASSOC);
  
  foreach ($rooms as $room) {
      echo "Numéro de chambre: " . $room['num_chambre'] . "<br>";
      echo "Surface: " . $room['surface'] . "<br>";
      echo "Prix: " . $room['prix'] . "<br>";
      echo "Nombre de personnes: " . $room['nb_personne'] . "<br>";
      echo "Disponible: " . ($room['disponible'] ? 'Oui' : 'Non') . "<br><br>";
  } 
  

?>
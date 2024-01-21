<!DOCTYPE html>
<html>
<title>Nos Chambres</title>

<head>
    <link rel="stylesheet" href="Nos chambres.css">

</head>
<header>
    <?php
    include ('navbar.php');
    include('database.php');
?>
</header>

<body>
    <br>
    <div style="display:flex; flex-direction:row;">
        <?php

$query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY prix ASC");
$rooms = $query->fetchAll(PDO::FETCH_ASSOC);


foreach ($rooms as $room) {
    echo ('
    <br><br>
    <div class="box">
        Numéro de chambre : ' . $room['num_chambre'] .'
        <br>
        Surface : '. $room['surface'] .' m²
        <br>
        Prix : '. $room['prix'] .' € par nuit
        <br>
        Nombre de personnes : ' . $room['nb_personne'] . '
    </div>  <br><br>');
} 


?>
    </div>
</body>

</html>
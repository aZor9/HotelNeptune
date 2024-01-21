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
    <div style="display:flex; justify-content: center; margin:30px 0;">
        <div class="nav-menu">
            <ul>
                <li><a>FILTRE</a>
                    <ul>
                        <li></li>
                        <li><a href="">je</a></li>
                        <li><!--<script>setInterval(function(<?php /*$query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY prix DESC");
$rooms = $query->fetchAll(PDO::FETCH_ASSOC); */ ?> ){window.location.reload();}, 5000); 
                        </script>--><a >sais</a></li>
                        <li><a>pas</a></li>
                        <li><a>quoi</a></li>
                        <li><a>mettre</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <br>
    <div style="display:flex; flex-direction:row; flex-wrap: wrap;">
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
        Nombre de lit simple : ' . $room['nb_lit_simple'] . '
        <br>
        Nombre de lit double : ' . $room['nb_lit_double'] . '
    </div>  <br><br>');
} 


?>
    </div>
</body>

</html>
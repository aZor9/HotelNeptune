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
    <div class="menu">
    <ul>
        <form method="post">
            <li><a>TRIER</a></li>
            <li><input type="submit" value="PRIX" name="prix" ></li>
            <li><input type="submit" value="CAPACITE" name = "capacite" ></li>
            <li><input type="submit" value="SURFACE" name= "surface" ></li>

        </form>
    </ul>
</div>
    </div>
    <br>
    <div style="display:flex; flex-direction:row;">
        <?php


    $action = $_POST["action"];

if (isset($_POST["prix"])) {
    $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY prix ASC");
} 
elseif (isset($_POST["capacite"])) {
    $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY nb_personne ASC");
} 
elseif (isset($_POST["surface"])) {
    $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ORDER BY surface ASC");
} 
else {
    $query = getDB()->query("SELECT * FROM room WHERE disponible=1 ");
}

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
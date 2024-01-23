<!DOCTYPE html>
<title>Reservation</title>
<link rel="stylesheet" href="/data/css/Utilisateurs.css">
<header>
<?php
    include('navbar.php');
    include('database.php');

?>

<body>

<br>
<div class="boxinscription">






<?php 


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reserve'])) {
    $numch=$_POST['reserve'];
    $query = getDB()->query("UPDATE room SET disponible = '0' WHERE num_chambre = $numch ");
    // header('Location:chambres.php?reussi');
}
// else {header('Location:chambres.php?aaaa');}
    $numch=$_POST['reserve'];
    $query = getDB()->query("SELECT * FROM room WHERE num_chambre =$numch ");
        echo ('
            <br><br>
            <div style="display:flex; flex-direction:column; ">
                <div class="box">
                    <br>    
                    Numéro de chambre : ' . $room['num_chambre'] . '
                    <br>
                    Surface : ' . $room['surface'] . ' m²
                    <br>
                    Prix : ' . $room['prix'] . ' € par nuit
                    <br>
                    Nombre de personnes : ' . $room['nb_personne'] . '
                    <br>
                    Nombre de lit double : ' . $room['nb_lit_double'] . '
                    <br>
                    Nombre de lit simple : ' . $room['nb_lit_simple'].'
                    <br>
                    <form action="rooom.php" method="post">
                        <br>
                        <input type="hidden" name="reserve" value="' . $room['num_chambre'] . '">
                        <input type="submit" value="Réservez" name=reservee id="reservation">   
                    </form>
                </div>
            </div> 
                <br><br>
       ');

?>



</div>


</body>

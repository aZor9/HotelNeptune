<!DOCTYPE html>
<html>
<title>Ajout de chambre</title>

<head>
    <link rel="stylesheet" href="/data/css/admin.css">
</head>

<header>
    <?php
    include('navbar.php');
    include('database.php');
    session_start();
    if($_GET['error'] == "probleme")
    {
        echo '<div class="error">Erreur</div>';
    }
    if($_GET['good'] == "reussi")
    {
        echo '<div class="good">Ajout de chambre réussi (normalement)</div>';
    }
    if($_GET['error'] == "chambre_existe"){
        echo '<div class="error">Erreur : Chambre déja existante </div> <br>';
    }
    
?>
</header>

<body>
<br>
    <h1>AJOUTER UNE CHAMBRE</h1>
    <br>
    <form action="/data/php/ajout_room.php" method="post">
        <div class="boxinscription">
            <input type="smallint "  placeholder="Numéro de chambre" name=num_chambre required>
            <input type="smallint "  placeholder="Surface en m²" name=surface required>
            <input type="decimal "  placeholder="Prix" name=prix required>
            <input type="smallint "  placeholder="Nombre de lit simple" name=nb_lit_simple required>
            <input type="smallint "  placeholder="Nombre de lit double" name=nb_lit_double required>
            <div class="btn_radio" style="padding-left:10px; border: solid 0.5px;">
                <input type="radio" id="dispo" name="dispo" value="dispo" checked />
                <label for="huey">Disponnible</label>
                <br>
                <input type="radio" id="dispo" name="dispo" value="indispo" />
                <label for="dewey">Indisponnible</label>
            </div>
            <div class="text-center">
                <input type="submit" id="reservation" value="Ajouter">
            </div>            
        </div>
        </div>
    </form>



</body>

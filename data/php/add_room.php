<!DOCTYPE html>
<html>
<title>Ajout de chambre</title>

<head>
    <link rel="stylesheet" href="/data/css/utilisateurs.css">
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
?>
</header>

<body>
<br>
    <h1>Ajouter une chambre</h1>
    <br>
    <form action="/data/php/ajout_room.php" method="post">
        <div class="boxinscription" action="POST">
            <input type="smallint " id="num_chambre" placeholder="Numéro de chambre" name=nom_chambre required>
            <input type="smallint " id="surface" placeholder="Surface en m²" name=surface required>
            <input type="decimal " id="prix" placeholder="Prix" name=prix required>
            <input type="smallint " id="nb_lit_simple" placeholder="Nombre de lit simple" name=nb_lit_simple required>
            <input type="smallint " id="nb_lit_double" placeholder="Nombre de lit double" name=nb_lit_double required>
            <div class="btn_radio" style="padding-left:10px; border: solid 0.5px;">
                <input type="radio" id="dispo" name="dispo" value="dispo" checked />
                <label for="huey">Disponnible</label>
                <br>
                <input type="radio" id="dispo" name="dispo" value="indispo" />
                <label for="dewey">Indisponnible</label>
            </div>
            <div class="text-center">
                <input type="submit" id="inscrire" value="Ajouter">
            </div>            
        </div>
        </div>
    </form>



</body>

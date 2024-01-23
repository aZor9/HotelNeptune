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
        echo '<div class="error">Erreur : Chambre non existante</div>';
    }
    if($_GET['good'] == "reussi")
    {
        echo '<div class="good">Supression de chambre réussi (normalement)</div>';
    }
    
?>
</header>

<body>
<br>
    <h1>RETIRER UNE CHAMBRE</h1>
    <br>
    <form action="/data/php/supprime_room.php" method="post">
        <div class="boxinscription">
            <input type="smallint "  placeholder="Numéro de chambre" name=num_chambre required>
            <div class="text-center">
                <input type="submit" id="reservation" value="Supprimer">
            </div>            
        </div>
        </div>
    </form>



</body>

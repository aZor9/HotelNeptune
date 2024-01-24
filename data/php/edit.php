<!DOCTYPE html>
<html>
<title>Modification de chambre</title> <!-- Premiere page de modification : pour savoir le num de chambre-->

<head>
    <link rel="stylesheet" href="/data/css/admin.css">
</head>

<?php  
include('navbar.php');
include('database.php');
session_start();

if($_GET['num_chambre'])
{
    echo ('<div class="good">Modification de chambre réussi (normalement)</div>');
    $num_chambre = $_GET['num_chambre'];
    $query = getDB()->query("SELECT num_chambre FROM 'room'");
    $rooms = $query->fetchAll(PDO::FETCH_COLUMN);
    // echo 'Les mails : ' . implode(', ', $emails);
    foreach ($rooms as $room){
        if ($num_chambre==$room){
            // $query = getDB()->query("DELETE FROM room WHERE num_chambre = $num_chambre "); 
            header('Location:/data/php/modif.php?good='.$num_chambre.'');
            exit();
        }
    } 
    header('Location:/data/php/edit.php?error=probleme'); // la chambre n'existe pas
}

if($_GET['error'] == "probleme")
{
    echo '<div class="error">Erreur : Chambre non existante</div>';
}

?>

<h1>MODIFIER UNE CHAMBRE</h1>
    <br>
    <form method="get">
        <div class="boxinscription">
            <input type="smallint "  placeholder="Numéro de chambre" name=num_chambre required>
            <div style="display:flex; flex-direction:row; justify-content:center;">
                <input type="submit" id="reservation" value="Modifier">
            </div>            
        </div>
        </div>
    </form>




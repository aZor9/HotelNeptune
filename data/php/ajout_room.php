

<?php  
session_start();


$num_chambre = $_POST['num_chambre'];
$surface = $_POST['surface'];
$prix = $_POST['prix'];
$nb_lit_simple = $_POST['nb_lit_simple'];
$nb_lit_double = $_POST['nb_lit_double'];
$nb_personne = ($nb_lit_double*2 + $nb_lit_simple); //calcul en fonction du nombre de lit par chambre car donnée calculable
if ($_POST['dispo'] == 'dispo') { //passage d'une bouton radio en donnée booléenne
    $dispo = 1;}
else {
    $dispo = 0;}

include('database.php');

$query = getDB()->query("SELECT num_chambre FROM 'room'");
$rooms = $query->fetchAll(PDO::FETCH_COLUMN);
// echo 'Les mails : ' . implode(', ', $emails);
foreach ($rooms as $room){
    if ($num_chambre==$room){
        header('Location:/data/php/add_room.php?error=chambre_existe'); //chambre deja existante donc probleme
        exit; 
    }
} 

$query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('$num_chambre', '$surface', '$prix', '$nb_personne', '$nb_lit_simple','$nb_lit_double', '$dispo')");

$query = getDB()->query("SELECT * FROM room WHERE num_chambre = $num_chambre");
$userData = $query->fetch(PDO::FETCH_ASSOC);

if ($userData) {


   header('Location:/data/php/chambres.php');
} else {
    header('Location:/data/php/add_room.php?error=probleme');
    exit; 
}



// header('Location:/data/php/connexion.php?good=reussi');
// exit; 

?>
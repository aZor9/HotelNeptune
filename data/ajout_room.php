<?php  

$num_chambre = $_POST['num_chambre'];
$surface = $_POST['surface'];
$prix = $_POST['prix'];
$nb_lit_simple = $_POST['nb_lit_simple'];
$nb_lit_double = $_POST['nb_lit_double'];
$nb_personne = $nb_lit_double*2 + $nb_lit_simple;
if ($_POST['dispo'] == 'dispo') {
    $dispo = 1;}
else {
    $dispo = 0;}

include ('database.php');



$query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) 
VALUES('$num_chambre', '$surface', '$prix', '$nb_personne', '$nb_lit_simple','$nb_lit_double', '$dispo')");



header('Location:/data/add_room.php?Ajout-Reussi');
exit;

?>
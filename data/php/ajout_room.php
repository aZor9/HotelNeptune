<?php  
session_start();
$num_chambre = $_POST['num_chambre'];
$surface = $_POST['surface'];
$prix = $_POST['prix'];
$nb_lit_simple = $_POST['nb_lit_simple'];
$nb_lit_double = $_POST['nb_lit_double'];
$nb_personne = ($nb_lit_double*2 + $nb_lit_simple); //calcul en fonction du nombre de lit par chambre car donnée calculable
if ($_POST['dispo'] == 'dispo') { //passage d'une bouton radion en donnée booléenne
    $dispo = 1;}
else {
    $dispo = 0;}

include('database.php');



$query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('$num_chambre', '$surface', '$prix', '$nb_personne', '$nb_lit_simple','$nb_lit_double', '$dispo')");
$userData = $query->fetch(PDO::FETCH_ASSOC);

if ($userData) {
//     $_SESSION['num_chambre']=$num_chambre;
//     $_SESSION['surface']=$surface;
//     $_SESSION['prix']=$prix;
//     $_SESSION['nb_personne']=$nb_personne;
//     $_SESSION['nb_lit_simple']=$nb_lit_simple;
//     $_SESSION['nb_lit_souble']=$nb_lit_double;
//     $_SESSION['dispo']=$dispo;


   header('Location:/data/php/add_room.php?good=reussi');

} else {
    header('Location:/data/php/add_room.php?error=probleme');
    exit; 
}



// header('Location:/data/php/connexion.php?good=reussi');
// exit; 

?>
<?php
include('database.php');
session_start();


$id_user = $_POST['id_user']; 
 
$prenom = $_POST['prenom']; //mise a jour de l'ancienne donnée :
$name = $_POST['name'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$solde = $_POST['solde'];
$admin = $_POST['admin'];
$query = getDB()->query("UPDATE user set nom = '$name', prenom = '$prenom', mail = '$mail', password = '$password', solde = '$solde', admin = '$admin' WHERE id = $id_user ");


header('Location:/data/php/user_admin.php?good=modification');

?>
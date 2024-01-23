<?php

include('database.php');
session_start();
$num_ch=$_POST['confirmation'];

if ($num_ch) {
    $query = getDB()->query("UPDATE room SET disponible = '0' WHERE num_chambre = $num_ch ");
    echo('la chambre réservée : '.$num_ch);
    // récupère la solde actuelle du client
    $mail=$_SESSION['mail'];
    $query = getDB()->prepare("SELECT solde FROM user WHERE mail = :mail");
    $query->bindParam(':mail', $mail, PDO::PARAM_STR);
    $query->execute();
    $solde = $query->fetch(PDO::FETCH_ASSOC);
    $solde=$solde['solde'];

    // récup le prix de la chambre 
    $query = getDB()->prepare("SELECT prix FROM room WHERE num_chambre = :num_chambre");
    $query->bindParam(':num_chambre', $num_ch, PDO::PARAM_STR);
    $query->execute();
    $prixch = $query->fetch(PDO::FETCH_ASSOC);
    $prixch=$prixch['prix'];

    // lui soustrait le tarif de la chambre
    $transaction=$solde-$prixch;
    echo('<br>');
    echo('solde après opération : '.$transaction);
    echo('<br>');
    echo(' le mail : '.$_SESSION['mail']);
    //$query = getDB()->query("UPDATE user SET solde=$transaction WHERE mail = '$mail' ");

    //header('Location:/index.php?reservation=ok');


}
<?php

include('database.php');

// re-initialisation table user
$query=getDB()->query("DROP TABLE user");
$query=getDB()->query("CREATE TABLE IF NOT EXISTS user(
    `id` integer PRIMARY KEY AUTOINCREMENT NOT NULL,
    `nom` varchar(100) NOT NULL,
    `prenom` varchar(100) NOT NULL,
    `mail` varchar(100) NOT NULL UNIQUE,
    `password` varchar(100) NOT NULL,
    'solde' integer,
    'admin' BOOLEAN
    )
"); 
$query = getDB()->query("INSERT INTO user (nom, prenom, mail, password, solde, admin) VALUES('Gougis', 'Aurélien', 'aurelien@gmail.com', 'password', '1000', '0')");
$query = getDB()->query("INSERT INTO user (nom, prenom, mail, password, solde, admin) VALUES('admin', 'admin', 'admin@gmail.com', 'admin', '0', '1')");

// re-initialisation table room
$query=getDB()->query("DROP TABLE room");
$query=getDB()->query("CREATE TABLE IF NOT EXISTS room(
    `id` integer PRIMARY KEY AUTOINCREMENT NOT NULL,
    `num_chambre` integer(100) NOT NULL, 
    `surface` integer(100) NOT NULL,
    `prix`  integer(100) NOT NULL ,
    'nb_personne' varchar(100) NOT NULL,
    `nb_lit_simple` varchar(100) NOT NULL,
    `nb_lit_double` varchar(100) NOT NULL,
    'disponible' BOOLEAN
    )
");
$query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('101', '13', '150', '2', '2','0', '1')");
$query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('102', '20', '200', '3', '1','1', '1')");
$query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('201', '30', '300', '6', '2','2', '1')");
$query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('103', '15', '120', '1', '1','0', '1')");

header('Location:../../index.php?initalisé');
exit();
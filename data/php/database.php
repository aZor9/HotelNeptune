<?php

// function getDB () { // se connecte à la base de donnée
// return new PDO('sqlite:./data/database_', '', '',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
// }

function getDB () { // se connecte à la base de donnée
    return new PDO('sqlite:C:\Users\aurel\OneDrive\Documents\PROJET\HotelNeptune\data\database\database_', '', '',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
}

//créer une table USER avec des données prédéfinit.

$query=getDB()->query("DROP TABLE user");

$query=getDB()->query("CREATE TABLE IF NOT EXISTS user(
    `id` integer PRIMARY KEY AUTOINCREMENT NOT NULL,
    `nom` varchar(100) NOT NULL,
    `prenom` varchar(100) NOT NULL,
    `mail` varchar(100) NOT NULL UNIQUE,
    `password` varchar(100) NOT NULL,
    'admin' BOOLEAN
    )
");

$query = getDB()->query("INSERT INTO user (nom, prenom, mail, password, admin) VALUES('Gougis', 'Aurélien', 'aurelien@gmail.com', 'password', '0')");
$query = getDB()->query("INSERT INTO user (nom, prenom, mail, password, admin) VALUES('admin', 'admin', 'admin@gmail.com', 'admin', '1')");

// créer une table chambre avec des données prédéfinit. 


// $query=getDB()->query("DROP TABLE room");

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

// $query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('101', '13', '150', '2', '2','0', '1')");
// $query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('102', '20', '200', '3', '1','1', '1')");
// $query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('201', '30', '300', '6', '2','2', '1')");
// $query = getDB()->query("INSERT INTO room (num_chambre, surface, prix, nb_personne, nb_lit_simple, nb_lit_double, disponible) VALUES('103', '15', '120', '1', '1','0', '1')");

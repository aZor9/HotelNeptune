<?php

function getDB () { // se connecte à la base de donnée
    return new PDO('sqlite:C:\Users\aurel\OneDrive\Documents\PROJET\HotelNeptune\data\database\database_', '', '',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
}

//créer une table USER avec des données prédéfinit.

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


// créer une table chambre avec des données prédéfinit. 

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


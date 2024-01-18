<?php

// function getDB () { // se connecte à la base de donnée
// return new PDO('sqlite:./data/database_', '', '',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
// }

function getDB () { // se connecte à la base de donnée
    return new PDO('sqlite:C:\Users\aurel\OneDrive\Documents\PROJET\HotelNeptune\data\database_', '', '',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
}

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

// $query = getDB()->query("INSERT INTO user (nom, prenom, mail, password) VALUES('Gougis', 'Aurélien', 'aurelien@gmail.com', 'password')");
// $mail="aurelien@gmail.com";
// $query = getDB()->query("SELECT mail FROM 'user'");
// $emails = $query->fetchAll(PDO::FETCH_COLUMN);
// foreach ($emails as $email){
//     if ($mail==$email){
//         echo("error : ce mail est déja prit ".$mail);
//         break; 
//     }
//} 

$query = getDB()->query("INSERT INTO user (nom, prenom, mail, password) VALUES('Gougis', 'Aurélien', 'aurelien@gmail.com', 'password', '1')");

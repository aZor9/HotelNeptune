<?php

include('database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reserve'])) {
                $numch=$_POST['reserve'];
                $query = getDB()->query("UPDATE room SET disponible = '0' WHERE num_chambre = $numch ");
                header('Location:chambres.php?reussi');
            }
else {header('Location:chambres.php?aaaa');}


// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reserve']) && $_POST['reserve'] == $room['num_chambre']) {
//     $numch=$room['num_chambre'];
//     $query = getDB()->query("UPDATE room SET disponible = '0' WHERE num_chambre = $numch ");
//     header('Location:chambres.php?reussi');
// }
// else {header('Location:chambres.php?aaaa');}

// $numch=$_POST['reserve'];
// // $numch=$room['num_chambre'];
// $query = getDB()->query("UPDATE room SET disponible = '0' WHERE num_chambre = $numch ");
// header('Location:/data/php/chambres.php?reussi');
    


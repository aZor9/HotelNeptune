<?php

include('database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reserve'])) {
                $numch=$_POST['reserve'];
                $query = getDB()->query("UPDATE room SET disponible = '0' WHERE num_chambre = $numch ");
                header('Location:chambres.php?reussi');
            }
else {header('Location:chambres.php?aaaa');}

    

?>


<?php  
session_start();

$num_chambre = $_POST['num_chambre'];

include('database.php');

$query = getDB()->query("SELECT num_chambre FROM 'room'");
$rooms = $query->fetchAll(PDO::FETCH_COLUMN);
// echo 'Les mails : ' . implode(', ', $emails);
foreach ($rooms as $room){
    if ($num_chambre==$room){
        $query = getDB()->query("DELETE FROM room WHERE num_chambre = $num_chambre "); 
        header('Location:/data/php/remove_room.php?good=reussi');
        exit();
    }
} 

header('Location:/data/php/remove_room.php?error=probleme'); //aucune chambre n'a ce numero de chambre donc probleme
exit; 

?>
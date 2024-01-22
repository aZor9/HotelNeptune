<?php    

session_start();

$_SESSION = array(); // détruit toute les valeurs de session

session_destroy();

header("Location: /index.php");
exit();

?>
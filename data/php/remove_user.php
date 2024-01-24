<?php
session_start();
include('database.php');

if ($_SESSION['admin']==true){
    echo('aa');
    if ($_POST['user'])
    {
        $id_user = $_POST['user'];
        $query = getDB()->query("SELECT id FROM 'user'");
        $users = $query->fetchAll(PDO::FETCH_COLUMN);
        foreach ($users as $user){
            if ($id_user==$user){
                $query = getDB()->query("DELETE FROM user WHERE id = $id_user "); 
                header('Location:/data/php/user_admin.php?good=suppresion');
                exit();
            }
        } 
        header('Location:/data/php/user_admin.php?error=suppresion'); // l'id user n'existe pas
    }
}


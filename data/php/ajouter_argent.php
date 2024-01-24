<?php

        include('database.php');
        session_start();
        

        $id=$_SESSION['id'] ;
        $soldeAncien=$_SESSION['solde'] ;
        $solde = $_POST['solde'];
        // echo($id);
        echo($solde);
        echo($soldeAncien);

        // $query = getDB()->query("SELECT solde FROM user WHERE id = $id");
        // $soldeAncien = $query->fetch(PDO::FETCH_ASSOC);
        $soldeTotal = $soldeAncien + $solde;  
        echo($soldeTotal);


        $query = getDB()->query("UPDATE user set solde = '$soldeTotal' WHERE id = $id ");
        
        
        header('Location:/data/php/account.php?good=ajout');
        
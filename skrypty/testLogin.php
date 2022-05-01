<?php
    include_once 'klasy/Baza.php';
    include_once 'klasy/User.php';
    include_once 'klasy/UserManager.php';
    include_once('connectionData.php');
    
    $db = new Baza($hostname, $hostlogin, $hostpass, $database);
    
    $um = new UserManager();
    session_start();
    $userid = $um->getLoggedInUser($db, session_id());
    if ($userid > 0) 
    {
        echo "<a href='processLogin.php?akcja=wyloguj' >Wyloguj</a> </p>";
        echo "<h3>Dane zalogowanego użytkownika:</h3>";
        $sql = "SELECT * FROM users where id=$userid";
        
        $result = $db->selectA($sql);
        $row = $result->fetch_object();
        echo "$row->id $row->fullName $row->email";
        
    } 
    else 
    {
        header("location:processLogin.php");
    }
    
    
    
?>

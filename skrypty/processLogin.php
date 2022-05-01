<?php
    include_once '../klasy/Baza.php';
    include_once '../klasy/User.php';
    include_once '../klasy/UserManager.php';
    include_once('connectionData.php');
        
    $db = new Baza($hostname, $hostlogin, $hostpass, $database);
    
    $um = new UserManager();
    //parametr z GET – akcja = wyloguj
    if (filter_input(INPUT_GET, "akcja")=="wyloguj") 
    {
        $um->logout($db);
    }
    //kliknięto przycisk submit z name = zaloguj
    if (filter_input(INPUT_POST, "zaloguj")) 
    {
        $userId=$um->login($db); //sprawdź parametry logowania
        echo $userId;
        if ($userId > 0) 
        {
            header("location:../");
            /*echo "<p>Poprawne logowanie.<br />";
            echo "Zalogowany użytkownik o id=$userId <br />";
            //pokaż link wyloguj lub przekieruj
            // użytkownika na inną stronę dla zalogowanych
            echo "<a href='processLogin.php?akcja=wyloguj' >
            Wyloguj</a> </p>";*/
        } 
        else 
        {
            header("location:../login.php?czy=n");
        }
    } 
    else 
    {
        //pierwsze uruchomienie skryptu processLogin
        $um->loginForm();
    }
?>
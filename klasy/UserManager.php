<?php

class UserManager {
    function login($db) 
    {
        $args = ['login' => FILTER_VALIDATE_EMAIL, 'passwd' => FILTER_SANITIZE_FULL_SPECIAL_CHARS];
        //przefiltruj dane z GET (lub z POST) zgodnie z ustawionymi w $args filtrami:
        $dane = filter_input_array(INPUT_POST, $args);
        //sprawdź czy użytkownik o loginie istnieje w tabeli users
        //i czy podane hasło jest poprawne
        $login = $dane["login"];
        $passwd = $dane["passwd"];
        $userId = $db->selectUser($login, $passwd, "users");
        if ($userId >= 0) 
        { 
        //Poprawne dane
        //rozpocznij sesję zalogowanego użytkownika
        //usuń wszystkie wpisy historyczne dla użytkownika o $userId
        //ustaw datę - format("Y-m-d H:i:s");
        //pobierz id sesji i dodaj wpis do tabeli logged_in_users
            session_start();
            $sql = "DELETE FROM session WHERE id_user='$userId'";
            $db->delete($sql);
            $data = new DateTime('NOW');
            $data = $data->format('Y-m-d H:i:s');
            $idsesji = session_id();
            $sql = "INSERT INTO `session` (`id`, `id_user`, `last_update`) VALUES ('".$idsesji."',".$userId.",'".$data."');";
            $db->insert($sql);
        }

        return $userId;
    }
    
    function logout($db) 
    {
        echo "wyloguj";
        session_start();
        $idsesji = session_id();
        $sql = "DELETE FROM `session` WHERE id='$idsesji'";
        $db->delete($sql);
        session_destroy();
        setcookie(session_name(),'', time() - 42000, '/');
        header("location:../");
    //pobierz id bieżącej sesji (pamiętaj o session_start()
    //usuń sesję (łącznie z ciasteczkiem sesyjnym)
    //usuń wpis z id bieżącej sesji z tabeli logged_in_users
    }
    
    function getLoggedInUser($db, $sessionId) 
    {
        
        $sql = "Select id_user FROM session WHERE id='$sessionId'";
        if ($result = $db->selectA($sql)) 
        {
            $id = -1;
            $ile = $result->num_rows;
            if ($ile == 1) 
            {
                $row = $result->fetch_object(); //pobierz rekord z użytkownikiem
                $id = $row->id_user; //pobierz zahaszowane hasło użytkownika
                
            }
            return $id; //id zalogowanego użytkownika(>0) lub -1
        }
    }
}

?>

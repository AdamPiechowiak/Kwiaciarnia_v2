<?php
    include_once '../klasy/Baza.php';
    include_once '../klasy/User.php';
    include_once '../klasy/UserManager.php';
    include_once 'connectionData.php';

    $db = new Baza($hostname, $hostlogin, $hostpass, $database);

    $um = new UserManager();
    session_start();
    $userid = $um->getLoggedInUser($db, session_id());
    if ($userid > 0) 
    {
        //header("location:../przyjente.php");
        
        $args = ['m' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                //'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
                'u' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'nr_d' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'nr_m' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'czas' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'zaplata' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'koszt' => FILTER_SANITIZE_NUMBER_FLOAT,
                'koszyk' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                ];     //przefiltruj dane:     
        
        $dane = filter_input_array(INPUT_POST, $args); 
    
        $errors="";
        
        foreach ($dane as $key => $val) 
        {         
            if ($val === false or $val === NULL) 
            {             
                $errors .= $key." ";   
            }
        }
        
        if ($errors === "") 
        {
        //Dane poprawne – utwórz obiekt user 
            //$this->user=new User($dane['first_name'], $dane['last_name'],$dane['email'],$dane['password'],$dane['tel_nr']); 
            $sql = 'INSERT INTO `order`(`id_user`, `data_dostarczenia`, `miejscowosc`, `ulica`, `nr_domu`, '
                    . '`nr_mieszkania`, `koszt_calkowity`, `status_dostawy`) VALUES '
                    . '('.$userid.',"'.$dane["czas"].'","'.$dane["m"].'","'.$dane["u"].'","'.$dane["nr_d"].'","'.$dane["nr_m"].'",'.$dane["koszt"].',"zamowiono")';
            
            $db->insert($sql);
            
            $sql = 'SELECT id FROM `order` where id_user = '.$userid.' and data_dostarczenia = "'.$dane["czas"].'" and miejscowosc = "'.$dane["m"].'" and ulica = "'.$dane["u"].'" and nr_domu = "'.$dane["nr_d"].'" and nr_mieszkania = "'.$dane["nr_m"].'" and koszt_calkowity = '.$dane["koszt"];

            $result = $db->selectA($sql);
            $row = $result->fetch_object();
            
            $tab = explode(':',$dane["koszyk"]);
            foreach ($tab as $ele)
            {
                $w = explode(',',$ele);
                if($w[0] != "")
                {
                    $sql = 'INSERT INTO `orderdetail`(`id_product`, `id_order`, `ilosc`) VALUES ('.$w[0].','.$row->id.','.$w[1].')';
                    $db->insert($sql);
                }
            }
            
            header("location:../przyjente.php");
            
        } 
        else 
        {         
            echo "<p>Błędne dane:$errors</p>"; 
            header("location:../zamow.php");
            //$this->user = NULL; 
        } 
    }
    else
    {
        header("location:../login.php");
    }
    

    /*
    $args = ['first_name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                //'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
                'last_name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'email' => FILTER_VALIDATE_EMAIL,
                'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'tel_nr' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                ];     //przefiltruj dane:     
        
        $dane = filter_input_array(INPUT_POST, $args); 
    
        $errors="";
        
        foreach ($dane as $key => $val) 
        {         
            if ($val === false or $val === NULL) 
            {             
                $errors .= $key." ";   
            }
        }*/  

    //header("location:../przyjente.php")
?>
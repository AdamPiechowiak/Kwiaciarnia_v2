<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationForm
 *
 * @author student
 */
class RegistrationForm 
{
    protected $user;
    
    
    function checkUser()
    {  // podobnie jak metoda validate z lab4 
        $args = ['first_name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                //'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,'options' => ['regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/']],
                'last_name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'email' => FILTER_VALIDATE_EMAIL,
                'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'tel_nr' => FILTER_SANITIZE_NUMBER_INT,
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
        
        
        include_once('Baza.php');
        include('skrypty/connectionData.php');

        $db = new Baza($hostname, $hostlogin, $hostpass, $database);
        
        $sql = "Select id FROM users WHERE email='".$dane['email']."'";
        if ($result = $db->selectA($sql)) 
        {
            $row = $result->fetch_object();
            if($row != Null)
            {
                if ($row->id > 0) 
                {
                     $errors .= "email już istnieje";   
                }
            }
        }
        
        if ($errors === "") 
        {
        //Dane poprawne – utwórz obiekt user 
            $this->user=new User($dane['first_name'], $dane['last_name'],$dane['email'],$dane['password'],$dane['tel_nr']); 
        } 
        else 
        {         
            echo "<p>Błędne dane:$errors</p>"; 
            $this->user = NULL; 
        } 
      
        return $this->user; 
    }
} 

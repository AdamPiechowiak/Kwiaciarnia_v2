<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author student
 */
class User {
    
    
    const STATUS_USER = 1; 
    const STATUS_ADMIN = 2; 
    protected $first_name; 
    protected $last_name; 
    protected $email;
    protected $password;
    protected $user_status;
    protected $tel_nr;
    
    function __construct($first_name, $last_name, $email, $password, $tel_nr)
    { 
    $this->user_status=User::STATUS_USER;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email=$email;
    $this->password=password_hash($password,PASSWORD_BCRYPT);
    $this->tel_nr = $tel_nr;
    //nadać wartości pozostałym polom – zgodnie z parametrami //... 
    } 
    
    function toArray()
    { 
     $arr=[ 
         "first_name" => $this->first_name, 
         "last_name" => $this->last_name, 
         "email" => $this->email, 
         "passsword" => $this->password, 
         "user_status" => $this->user_status, 
         "tel_nr" => $this->tel_nr
         ]; 
     return $arr;    
    } 

    
    function save($db)
    { 
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `user_status`, `tel_nr`) VALUES ('".$this->first_name."','".$this->last_name."','".$this->email."','".$this->password."','".$this->user_status."','".$this->tel_nr."');";
        $db->insert($sql);
    }
    
//zdefiniować pozostałe metody
}
